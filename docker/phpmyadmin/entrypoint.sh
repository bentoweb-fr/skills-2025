#!/bin/bash
set -e

# Ajouter ServerName dans la configuration Apache
echo 'ServerName api.bentoweb.fr' >> /etc/apache2/apache2.conf

# Démarrer Apache
exec apache2-foreground