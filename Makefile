up:
	docker-compose up -d
init:
	docker-compose up -d --build
	docker-compose exec --user=www-data app cp .env.example .env
	docker-compose exec --user=www-data app php artisan key:generate
	docker-compose exec --user=www-data app npm install
	docker-compose exec --user=www-data app npm run dev
	docker-compose exec --user=www-data app composer install

start:
	docker-compose start
stop:
	docker-compose stop
restart:
	docker-compose restart

app:
	docker-compose exec --user=www-data app bash
web:
	docker-compose exec web sh
db:
	docker-compose exec db bash
db-root:
	docker-compose exec db psql -U postgres

db-erd-laravel:
	find erd-laravel/ -type f | grep -v -E '.gitkeep' | xargs rm -rf
	docker-compose -f docker-compose.yml -f docker-compose.schemaspy-for-laravel.yml run --rm schemaspy
db-erd-original:
	find erd-original/ -type f | grep -v -E '.gitkeep' | xargs rm -rf
	docker-compose -f docker-compose.yml -f docker-compose.schemaspy-for-original.yml run --rm schemaspy

app-ide-helper:
	docker-compose exec --user=www-data app php artisan ide-helper:models --write
app-cs-check:
	docker-compose exec --user=www-data app composer cs-check
app-cs-fix:
	docker-compose exec --user=www-data app composer cs-fix
app-phpunit:
	docker-compose exec --user=www-data app composer test
app-phpstan:
	docker-compose exec --user=www-data app composer stan
app-check-all:
	@make app-phpunit
	@make app-cs-check
	@make app-phpstan

npm-dev:
	docker-compose exec --user=www-data app npm run dev
npm-build:
	docker-compose exec --user=www-data app npm run build

down:
	docker-compose down
down-all:
	docker-compose down --rmi all --volumes --remove-orphans
