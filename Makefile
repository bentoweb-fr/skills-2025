.PHONY: setup run build stop clean

# Configuration initiale du projet
setup:
	@echo "🏗️ Configuration initiale du projet 36o..."
	@docker volume create 36o_mysql_data 2>/dev/null || echo "✅ Volume 36o_mysql_data existe déjà"
	@docker network create proxy 2>/dev/null || echo "✅ Réseau proxy existe déjà"
	@echo "🎉 Configuration terminée !"

# Lancer le projet en développement
run: setup
	docker compose up -d && cd front && npm run dev

# Construire le front-end
build:
	cd front && npm run build

# Arrêter les services
stop:
	docker compose down

# Nettoyage complet (ATTENTION: supprime les données de la DB)
clean:
	docker compose down -v
	docker volume rm 36o_mysql_data 2>/dev/null || true