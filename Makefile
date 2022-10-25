up-local:
	docker-compose build
	USER_ID=$(id -u) docker-compose up -d

down-local:
	docker-compose down

#up-prod:
#	docker-compose -p 'prod_mappa_pi' -f docker-compose-prod.yml up --build -d
#down-prod:
#	docker-compose -p 'prod_mappa_pi' -f docker-compose-prod.yml down --remove-orphans