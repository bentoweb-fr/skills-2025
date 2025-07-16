#!/bin/sh
set -e

# Lancer les migrations avant de démarrer PHP-FPM
php bin/console doctrine:migrations:migrate --no-interaction

exec "$@"