export APP_NAME=easyadmintranslationformdemo
export PHP_CONTAINER_NAME=${APP_NAME}-php-1
export DB_CONTAINER_NAME=${APP_NAME}-mariadb-1

restart:down up

up:
	docker compose -p $$APP_NAME up -d

down:
	docker compose -p $$APP_NAME stop

build:
	docker compose -p $$APP_NAME build

remove:
	docker compose -p $$APP_NAME rm --force

logs:
	docker compose -p $$APP_NAME logs --follow

bash:
	docker exec -it $$PHP_CONTAINER_NAME /bin/sh

db:
	docker exec -it $$DB_CONTAINER_NAME mysql
