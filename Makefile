up:
	docker-compose up -d

down:
	docker-compose down

build:
	docker-compose build

rebuild:
	docker-compose up --build -d

csfixer:
	docker-compose exec php-fpm ./vendor/friendsofphp/php-cs-fixer/php-cs-fixer fix

init: db dsu fixtures
db:
	docker-compose exec php ./bin/console doctrine:migrations:migrate -n

fixtures:
	docker-compose exec php ./bin/console d:f:l --append

dsu:
	docker-compose exec php ./bin/console d:s:u -f

ckeditor:
	docker-compose exec php-fpm ./bin/console ckeditor:install --tag=4.18.0
	docker-compose exec php-fpm ./bin/console assets:install
