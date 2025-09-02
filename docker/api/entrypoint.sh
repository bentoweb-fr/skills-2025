#!/bin/sh
set -e

echo "🚀 Initialisation du conteneur API..."

# S'assurer qu'on est dans le bon répertoire
cd /var/www/api

# Fonction pour vérifier si Symfony est installé
check_symfony_installation() {
    if [ ! -f "composer.json" ]; then
        echo "❌ composer.json non trouvé"
        return 1
    fi
    
    if [ ! -d "vendor" ] || [ ! -f "vendor/autoload.php" ]; then
        echo "❌ Dépendances Composer non installées"
        return 1
    fi
    
    if [ ! -f "bin/console" ]; then
        echo "❌ Console Symfony non trouvée"
        return 1
    fi
    
    echo "✅ Symfony semble installé"
    return 0
}

# Fonction pour installer les dépendances
install_dependencies() {
    echo "📦 Installation des dépendances Composer..."
    composer install --no-interaction --optimize-autoloader
    
    # Générer un APP_SECRET s'il n'existe pas
    if [ -z "${APP_SECRET}" ] || [ "${APP_SECRET}" = "" ]; then
        echo "🔑 Génération d'un APP_SECRET..."
        APP_SECRET=$(php -r "echo bin2hex(random_bytes(32));")
        export APP_SECRET
        # Ajouter à .env.local pour persister
        echo "APP_SECRET=${APP_SECRET}" >> .env.local
    fi
}

# Fonction pour attendre MySQL
wait_for_mysql() {
    echo "⏳ Attente de la disponibilité de MySQL..."
    max_attempts=30
    attempt=1
    
    while [ $attempt -le $max_attempts ]; do
        if mysqladmin ping -h"mysql" -u"${API_DATABASE_USER}" -p"${API_DATABASE_PASSWORD}" --silent 2>/dev/null; then
            echo "✅ MySQL est disponible"
            return 0
        fi
        
        echo "MySQL pas encore prêt, tentative $attempt/$max_attempts..."
        sleep 2
        attempt=$((attempt + 1))
    done
    
    echo "❌ Erreur: MySQL non disponible après $max_attempts tentatives"
    exit 1
}

# Vérifier et installer Symfony si nécessaire
if ! check_symfony_installation; then
    echo "🔧 Installation de Symfony..."
    install_dependencies
else
    echo "🔄 Mise à jour des dépendances..."
    composer install --no-interaction --optimize-autoloader
fi

# Attendre que MySQL soit disponible
wait_for_mysql

# Initialiser la base de données
echo "🗄️ Initialisation de la base de données..."

# Créer la base de données si elle n'existe pas (avec gestion d'erreur)
echo "📋 Création de la base de données si nécessaire..."
if ! php bin/console doctrine:database:create --if-not-exists --no-interaction; then
    echo "⚠️ Impossible de créer la base de données, elle existe peut-être déjà"
fi

# Vérifier s'il y a des migrations et les exécuter
if [ -d "migrations" ] && [ "$(ls -A migrations)" ]; then
    echo "🔄 Exécution des migrations..."
    php bin/console doctrine:migrations:migrate --no-interaction 2>/dev/null || echo "⚠️ Aucune migration à exécuter"
else
    echo "📊 Aucune migration trouvée, création du schema..."
    php bin/console doctrine:schema:create --no-interaction 2>/dev/null || echo "⚠️ Schema déjà existant ou erreur"
fi

echo "🧹 Nettoyage du cache..."
php bin/console cache:clear --no-debug || echo "⚠️ Erreur lors du nettoyage du cache"

# Création ou mise à jour de l'utilisateur admin (si configuré)
if [ -n "$ADMIN_EMAIL_PROD" ] && [ -n "$ADMIN_PASSWORD_PROD" ]; then
    echo "👤 Création/mise à jour de l'utilisateur admin $ADMIN_EMAIL_PROD"
    php bin/console app:ensure-admin-user "$ADMIN_EMAIL_PROD" "$ADMIN_PASSWORD_PROD" || echo "⚠️ Commande admin non disponible"
else
    echo "ℹ️ Variables admin non définies, utilisateur admin non créé"
fi

echo "🎉 Initialisation terminée avec succès !"
echo "🚀 Démarrage du service PHP-FPM..."
exec "$@"