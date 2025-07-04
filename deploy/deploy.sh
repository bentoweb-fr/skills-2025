#!/bin/bash
set -e

echo "📦 Déploiement en cours sur $(hostname)..."

cd /home/benoit/skills2025

# Pull depuis Git (optionnel si tu rsync depuis GitHub)
# git pull origin main

# Build images (si localement sur le serveur)
docker compose -f docker-compose.prod.yaml down
docker compose -f docker-compose.prod.yaml up -d --build

echo "✅ Déploiement terminé."
