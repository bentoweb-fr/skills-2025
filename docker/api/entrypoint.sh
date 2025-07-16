#!/bin/sh
set -e

# S'assurer qu'on est dans le bon répertoire
cd /var/www/api

# Attendre que la base de données soit prête
until php bin/console doctrine:query:sql "SELECT 1" >/dev/null 2>&1; do
    echo "En attente de la base de données..."
    sleep 2
done

# Exécuter les migrations de base de données
echo "Exécution des migrations de base de données..."
php bin/console doctrine:migrations:migrate --no-interaction

# Vider le cache en production
echo "Nettoyage du cache..."
php bin/console cache:clear --env=prod --no-debug

echo "Démarrage du service..."
exec "$@"