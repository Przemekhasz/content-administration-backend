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

deploy-dev: db dsu fixtures
db:
	docker-compose exec php ./bin/console doctrine:migrations:migrate -n

fixtures:
	docker-compose exec php ./bin/console d:f:l --append

dsu:
	docker-compose exec php ./bin/console d:s:u -f
