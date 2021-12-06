UID=$(shell id -u)
GID=$(shell id -g)

install:
	docker-compose run --rm -u ${UID}:${GID} php composer install
dev:
	docker stop $(docker ps -q) || true
	docker-compose -f docker-compose.yaml up -d --build
prod:
	docker stop $(docker ps -q) || true
	docker-compose -f docker-compose.prod.yaml up --build