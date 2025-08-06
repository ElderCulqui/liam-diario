.PHONY: help

CMD ?= ''

help: ## This help.
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

.DEFAULT_GOAL := help



start:  ## Start the application default locally
	@echo "Starting the application default locally"
	@docker-compose up -d

restart:  ## Restart the application default
	@echo "Restarting the application"
	@docker-compose restart

stop:  ## Stop the application default
	@echo "Stopping the application default"
	@docker-compose down

status:  ## Status the application
	@echo "Showing the status for the application"
	@docker-compose ps

logs:	## Show the all Logs from the application
	@echo "Showing all logs for every container"
	@docker-compose logs -f --tail="50"

cli:  ## Enter to container console from LIAM DIARIO
	@echo "Entering to container console from LIAM DIARIO"
	@docker exec -ti web_liam_diario bash

cli_node:  ## Enter to container console from NODE
	@echo "Entering to container console from LIAM DIARIO NODE"
	@docker exec -ti node_liam_diariom sh

# Build commands
build-local:  ## Build assets for local development
	@echo "Building assets for local development"
	@cp .env.local .env
	@npm run build
	@cp .env.production .env
	@echo "✅ Local build completed"

build-production:  ## Build assets for production deployment
	@echo "Building assets for production deployment"
	@cp .env.production .env
	@npm run build
	@echo "✅ Production build completed"
	@echo "📂 Upload the 'public/build' folder to your hosting"

deploy-preparation:  ## Prepare deployment files
	@echo "Preparing deployment files"
	@make build-production
	@echo "📁 Files ready for deployment:"
	@echo "   - Upload 'public/build/' folder to hosting"
	@echo "   - Update git repository on hosting"
	@echo "   - Run 'php artisan config:cache' on hosting"%