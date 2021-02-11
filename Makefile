setup:
	docker-compose up -d
	docker exec -it linx-php-fpm composer install
	docker exec -it linx-php-fpm php bin/console doctrine:schema:create
	docker exec -it linx-php-fpm php bin/console doctrine:schema:update --force
	docker exec -it linx-php-fpm chmod 777 var/linx.db

start-docker:
	docker-compose up -d

stop-docker:
	docker-compose stop