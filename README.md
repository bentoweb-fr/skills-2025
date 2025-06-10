# Skills 2025

Application de gestion des compétences et des projets, construite avec Symfony 7 pour l'API et Vue.js pour le frontend.

## Prérequis

- Docker
- Docker Compose
- Make (optionnel, pour utiliser les commandes du Makefile)

## Installation

1. Cloner le projet

```bash
git clone <repository_url>
cd skills2025
```

2. Configurer les hôtes locaux (à ajouter dans /etc/hosts) :

```bash
127.0.0.1 skills2025.local
127.0.0.1 api.skills2025.local
```

3. Installer les dépendances et démarrer l'environnement :

```bash
make install
```

ou sans Make :

```bash
docker-compose up -d
docker-compose exec api composer install
docker-compose exec front npm install
```

## Développement

### Démarrer l'environnement

```bash
make run
```

ou

```bash
docker-compose up -d
```

### Arrêter l'environnement

```bash
make down
```

ou

```bash
docker-compose down
```

### Accéder aux services

- **Frontend** : https://skills2025.local
- **API** : https://api.skills2025.local
- **PHPMyAdmin** : http://localhost:8022
  - Serveur : mysql
  - Utilisateur : root
  - Mot de passe : root

### Commandes utiles

#### Base de données

```bash
# Créer/Mettre à jour la base de données
make db-update

# Charger les fixtures (données de test)
make db-fixtures
```

#### Logs

```bash
# Voir les logs de l'API
make logs-api

# Voir les logs du frontend
make logs-front
```

#### Tests

```bash
# Lancer les tests de l'API
make test-api

# Lancer les tests du frontend
make test-front
```

## Production

Pour déployer en production :

```bash
make deploy
```

ou manuellement :

```bash
# Build des images
docker-compose -f docker-compose.prod.yaml build

# Démarrage des conteneurs
docker-compose -f docker-compose.prod.yaml up -d
```

## Structure du projet

- `api/` : API Symfony
- `front/` : Application Vue.js
- `docker/` : Configuration Docker
- `nginx/` : Configuration Nginx
- `doc/` : Documentation supplémentaire

## Contribution

1. Créer une branche pour votre fonctionnalité (`git checkout -b feature/amazing-feature`)
2. Commiter vos changements (`git commit -m 'feat: add amazing feature'`)
3. Pousser la branche (`git push origin feature/amazing-feature`)
4. Ouvrir une Pull Request
