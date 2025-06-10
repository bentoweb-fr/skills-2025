#!/bin/bash

set -e

# === CONFIGURATION ===

VERSION=$(date +%Y%m%d%H%M)  # ex: 202505131637
REMOTE_SSH="$SERVER_USER@$SERVER_HOST"
REMOTE_PATH="/home/benoit/www/skills2025"
COMPOSE_FILE="docker-compose.prod.yaml"
COMPOSE_PATH="$REMOTE_PATH/$COMPOSE_FILE"

API_IMAGE_NAME="skills2025_api"
FRONT_IMAGE_NAME="skills2025_front"

LOCAL_API_TAR="${API_IMAGE_NAME}_${VERSION}.tar"
LOCAL_FRONT_TAR="${FRONT_IMAGE_NAME}_${VERSION}.tar"

# === BUILD LOCAL IMAGES ===

echo "🔨 Build des images Docker locales..."

docker build -t $API_IMAGE_NAME:$VERSION -f docker/api/Dockerfile .
docker build -t $FRONT_IMAGE_NAME:$VERSION -f docker/front/Dockerfile ./front

# === EXPORT TAR FILES ===

echo "📦 Export des images Docker..."

docker save $API_IMAGE_NAME:$VERSION -o $LOCAL_API_TAR
docker save $FRONT_IMAGE_NAME:$VERSION -o $LOCAL_FRONT_TAR

# === TRANSFER FILES TO SERVER ===

echo "📡 Transfert des images et du fichier compose vers le serveur..."

# Copier le fichier compose depuis doc/ pour garantir la bonne version
scp $LOCAL_API_TAR $LOCAL_FRONT_TAR doc/$COMPOSE_FILE $REMOTE_SSH:$REMOTE_PATH/

# === DEPLOY ON SERVER ===

echo "🚀 Déploiement sur le serveur..."

ssh $REMOTE_SSH <<EOF
  set -e
  cd $REMOTE_PATH

  echo "📥 Import des images..."
  docker load -i ${API_IMAGE_NAME}_${VERSION}.tar
  docker load -i ${FRONT_IMAGE_NAME}_${VERSION}.tar

  echo "🔄 Recréation des containers (mode production)..."
  # Exporter la variable VERSION pour docker compose
  export VERSION=$VERSION
  docker compose -f $COMPOSE_FILE down
  docker compose -f $COMPOSE_FILE up -d --remove-orphans

  echo "🧹 Nettoyage..."
  rm ${API_IMAGE_NAME}_${VERSION}.tar
  rm ${FRONT_IMAGE_NAME}_${VERSION}.tar
EOF

# === CLEANUP LOCAL FILES ===

echo "🧽 Suppression des archives locales..."
rm $LOCAL_API_TAR $LOCAL_FRONT_TAR

echo "✅ Déploiement terminé avec succès !"
