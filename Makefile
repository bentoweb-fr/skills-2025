run:
	docker compose up -d && cd front && npm run dev
build:
	cd front && npm run build