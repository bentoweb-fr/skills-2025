#!/bin/bash
set -e

# Créer le fichier de configuration secret manquant
mkdir -p /etc/phpmyadmin
if [ ! -f /etc/phpmyadmin/config.secret.inc.php ]; then
    echo "<?php" > /etc/phpmyadmin/config.secret.inc.php
    echo "\$cfg['blowfish_secret'] = '$(openssl rand -base64 32)';" >> /etc/phpmyadmin/config.secret.inc.php
fi

# Activer la configuration servername
a2enconf servername

# Tester la configuration Apache
apache2ctl configtest

# Démarrer Apache
exec apache2-foreground