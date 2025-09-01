#!/bin/sh

# Substituer les variables d'environnement dans le template
envsubst '${FRONT_DOMAIN} ${API_DOMAIN}' < /etc/nginx/nginx.conf.template > /etc/nginx/nginx.conf

# Démarrer nginx
exec nginx -g 'daemon off;'
