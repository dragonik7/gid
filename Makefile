up-local:
	docker compose -p 'local_mappa_pi' up --build -d

down-local:
	docker-compose -p 'local_mappa_pi' down --remove-orphans

up-prod:
	docker-compose -p 'prod_mappa_pi' -f docker-compose-prod.yml up --build -d

down-prod:
	docker-compose -p 'prod_mappa_pi' -f docker-compose-prod.yml down --remove-orphans