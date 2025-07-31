#!/bin/bash
set -e

# Ajouter ServerName dans la configuration Apache
echo 'ServerName api.bentoweb.fr' >> /etc/apache2/apache2.conf

# Tester la configuration Apache
apache2ctl configtest

# Démarrer Apache
exec apache2-foreground