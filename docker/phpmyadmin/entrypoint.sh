#!/bin/bash
set -e

# Activer la configuration servername
a2enconf servername

# Tester la configuration Apache
apache2ctl configtest

# Démarrer Apache
exec apache2-foreground