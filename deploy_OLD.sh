#!/bin/bash

set -e

# Variables
PROJECT_DIR="$(dirname $(realpath $0))"
ENV_FILE="$PROJECT_DIR/.env"
DOCKER_COMPOSE_FILE="$PROJECT_DIR/docker-compose.prod.yaml"

# Génération du fichier .env s'il n'existe pas
if [ ! -f "$ENV_FILE" ]; then
  echo ".env introuvable, création..."

  DB_PASS=$(openssl rand -base64 16)
  ROOT_PASS=$(openssl rand -base64 24)
  APP_SECRET=$(openssl rand -hex 16)

  cat <<EOF > $ENV_FILE
APP_ENV=prod
APP_SECRET=$APP_SECRET
DATABASE_URL="mysql://skills:$DB_PASS@127.0.0.1:3306/skills2025?serverVersion=8.0"
MYSQL_USER=skills
MYSQL_PASSWORD=$DB_PASS
MYSQL_DATABASE=skills2025
MYSQL_ROOT_PASSWORD=$ROOT_PASS
EOF
fi

# Chargement des variables
echo "Chargement des variables d'environnement..."
source <(grep = $ENV_FILE | sed 's/^/export /')

# Démarrage des conteneurs
echo "Démarrage des conteneurs Docker..."
docker compose -f $DOCKER_COMPOSE_FILE up -d --build

# Attente du démarrage de MySQL
echo "⏳ Attente de MySQL..."
sleep 10

# Initialisation de la base de données
echo "Initialisation de la base de données..."
docker compose exec -T mysql sh -c "
  mysql -uroot -p\"$MYSQL_ROOT_PASSWORD\" -e \"
    CREATE DATABASE IF NOT EXISTS $MYSQL_DATABASE;
    CREATE USER IF NOT EXISTS '$MYSQL_USER'@'%' IDENTIFIED BY '$MYSQL_PASSWORD';
    GRANT ALL PRIVILEGES ON $MYSQL_DATABASE.* TO '$MYSQL_USER'@'%';
    FLUSH PRIVILEGES;
  \"
"

# Lancer les migrations Symfony
echo "Exécution des migrations Symfony..."
docker compose exec -T api php bin/console doctrine:migrations:migrate --no-interaction

echo "✅ Déploiement terminé avec succès !"