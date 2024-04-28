setup:
	@make build
	@make up
build:
	docker-compose build --no-cache --force-rm
stop:
	docker-compose stop
up:
	docker-compose up -d
data:
	docker exec laravel-docker bash -c "php artisan migrate --seed"
terminal:
	docker exec -it laravel-docker /bin/bash