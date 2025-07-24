#!/bin/sh
set -e

# S'assurer qu'on est dans le bon répertoire
cd /var/www/api

# Debug: Vérifier l'environnement et les fichiers
# echo "=== DEBUGGING INFORMATION ==="
# echo "APP_ENV: $APP_ENV || true"
# echo "APP_DEBUG: $APP_DEBUG || true"
# echo "DATABASE_URL=$DATABASE_URL || true"
# echo "Working directory: $(pwd) || true"
# echo "Symfony environment: $(php bin/console about --env=prod 2>/dev/null | grep Environment || echo 'Cannot determine') || true"

# echo "=== BUNDLES CONFIGURATION ==="
# echo "Contenu de config/bundles.php:"
# cat config/bundles.php

# echo "=== FILES CHECK ==="
# echo "Fichiers dans config/packages:"
# ls -la config/packages/
# if [ -d "config/packages/dev" ]; then
#     echo "Fichiers dans config/packages/dev:"
#     ls -la config/packages/dev/
# fi

# echo "=== TESTING SYMFONY ==="
# echo "Test basique de Symfony..."
# php bin/console --version

# Attendre que la base de données soit prête
# echo "Attente de la disponibilité de MySQL..."


# Extraire les informations de connexion depuis DATABASE_URL
# Format: mysql://user:password@host:port/database
# DB_USER=$(echo "$DATABASE_URL" | sed -n 's/.*:\/\/\([^:]*\):.*/\1/p')
# DB_PASSWORD=$(echo "$DATABASE_URL" | sed -n 's/.*:\/\/[^:]*:\([^@]*\)@.*/\1/p')
# DB_HOST=$(echo "$DATABASE_URL" | sed -n 's/.*@\([^:]*\):.*/\1/p')
# DB_NAME=$(echo "$DATABASE_URL" | sed -n 's/.*\/[a-zA-Z0-9_]*\?*\(.*\)/\1/p' | cut -d'?' -f1)
# DB_NAME=$(echo "$DATABASE_URL" | sed -E 's|.*/([^/?]+).*|\\1|')

# echo "Variables extraites :"
# echo "  DB_USER=$DB_USER"
# echo "  DB_PASSWORD=$DB_PASSWORD"
# echo "  DB_HOST=$DB_HOST"
# echo "  DB_NAME=$DB_NAME"
# echo "  DATABASE_URL=$DATABASE_URL"

# sleep 10  # Attendre un délai initial pour laisser MySQL démarrer

# Attendre que MySQL soit complètement prêt
# max_attempts=8
# attempt=1

# while [ $attempt -le $max_attempts ]; do
#     echo "Tentative de connexion à la base de données ($attempt/$max_attempts)..."
    
#     # Utiliser mysqladmin pour tester la connexion (plus fiable que doctrine au démarrage)
#     if mysqladmin ping -h "$DB_HOST" -u"$DB_USER" -p"$DB_PASSWORD" --silent 2>/dev/null; then
#         echo "MySQL est prêt ! Vérification avec Doctrine..."
#         # Double vérification avec Doctrine
#         if php bin/console doctrine:query:sql "SELECT 1" >/dev/null 2>&1; then
#             echo "Base de données complètement prête !"
#             break
#         fi
#     fi
    
#     if [ $attempt -eq $max_attempts ]; then
#         echo "Erreur: Impossible de se connecter à la base de données après $max_attempts tentatives"
#         echo "Variables de connexion:"
#         echo "  DB_HOST=$DB_HOST"
#         echo "  DB_USER=$DB_USER"
#         echo "  DB_PASSWORD=$DB_PASSWORD"
#         echo "  DB_NAME=$DB_NAME"
#         echo "  DATABASE_URL=$DATABASE_URL"
#         exit 1
#     fi
    
#     echo "Base de données pas encore prête, nouvelle tentative dans 3 secondes..."
#     sleep 3
#     attempt=$((attempt + 1))
# done

sleep 3

# Exécuter les migrations de base de données
echo "Exécution des migrations de base de données..."
php bin/console doctrine:migrations:migrate --no-interaction

# Vider le cache en production
echo "Nettoyage du cache..."
php bin/console cache:clear --env=prod --no-debug

# Création ou mise à jour de l'utilisateur admin
if [ -n "$ADMIN_EMAIL_PROD" ] && [ -n "$ADMIN_PASSWORD_HASH_PROD" ]; then
  echo "Création/mise à jour de l'utilisateur admin..."
  php bin/console app:ensure-admin-user "$ADMIN_EMAIL_PROD" "$ADMIN_PASSWORD_HASH_PROD"
else
  echo "ADMIN_EMAIL_PROD ou ADMIN_PASSWORD_HASH_PROD non défini, l'utilisateur admin ne sera pas créé/mis à jour."
fi

echo "Démarrage du service..."
exec "$@"