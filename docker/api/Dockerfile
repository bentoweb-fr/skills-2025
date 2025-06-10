FROM php:8.4-fpm

# Installer les dépendances de base et les extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libicu-dev \
    zip \
    libzip-dev \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install intl pdo pdo_mysql mysqli gd zip gd exif \
    && docker-php-ext-enable pdo_mysql gd exif

# Donne les droits d'écriture dans le dossier
# RUN chown -R www-data:www-data /var/www/html
# RUN chmod -R 777 /var/www/html

# Copier les fichiers du projet
WORKDIR /var/www/html
