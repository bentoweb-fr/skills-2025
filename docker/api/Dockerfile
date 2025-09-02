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
    default-mysql-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install intl pdo pdo_mysql mysqli gd zip gd exif \
    && docker-php-ext-enable pdo_mysql gd exif

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Donne les droits d'écriture dans le dossier
# RUN chown -R www-data:www-data /var/www/html
# RUN chmod -R 777 /var/www/html

# Définir le répertoire de travail
WORKDIR /var/www/api

# Copier et rendre exécutable le script d'entrypoint
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Définir l'entrypoint
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

# Commande par défaut
CMD ["php-fpm"]
