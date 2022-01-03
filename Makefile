.DEFAULT_GOAL := help

include .env
HOST ?= localhost

help:
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
.PHONY: help

##
## Setup
## -----
##

start: .env.local up info ## Start development environment

install: .env.local up
	sleep 5
	docker-compose exec web bash -c "php bin/console doctrine:database:create --no-interaction"
	docker-compose exec web bash -c "php bin/console doctrine:migrations:migrate --no-interaction"

.env.local: .env
	@if [ -f .env.local ]; then \
		echo '\033[1;41mYour .env.local file may be outdated because .env has changed.\033[0m';\
		echo '\033[1;41mCheck your .env.local file, or run this command again to ignore.\033[0m';\
		touch .env.local;\
		exit 1;\
	else\
		echo cp .env .env.local;\
		cp .env .env.local;\
	fi

up: ## Run containers
	docker-compose up -d

fixtures: ## Run fixtures
	docker-compose exec web bash -c "php /var/www/html/bin/console doctrine:fixtures:load --no-interaction"

bdd: ## Reset BDD
	docker-compose exec web bash -c "php bin/console doctrine:database:drop --force --no-interaction"
	docker-compose exec web bash -c "php bin/console doctrine:database:create --no-interaction"
	docker-compose exec web bash -c "php bin/console doctrine:migration:migrate --no-interaction"
	docker-compose exec web bash -c "php bin/console doctrine:fixtures:load --no-interaction"



##
## Tools
## -----
##

cc: ## Clear cache
	docker-compose exec web bash -c "php bin/console cache:clear"

logs: ## Show logs
	docker-compose logs -ft

bash: ## Bash into php container
	docker-compose exec web bash

node: ## Bash into node container
	docker-compose exec node sh

rewatch: ## Restart node watcher
	docker-compose restart -t 1 node
