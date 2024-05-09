#!/bin/bash

# Ensure the script exits if any command returns a non-zero status
set -e

# Optionally, log all commands executed
set -x

cd ..

# Pull the latest changes from the main branch
echo "Pulling latest changes from the main branch..."
git pull origin main

# Install Composer dependencies
echo "Installing Composer dependencies..."
composer install --no-interaction --prefer-dist --optimize-autoloader --ignore-platform-req=ext-imagick

# Build and start Docker containers
echo "Building and starting Docker containers..."
docker-compose up --build -d

# Setting Symfony environment variables
echo "Setting Symfony environment variables..."
docker-compose exec -T php-fpm bash -c "export APP_ENV=prod && export APP_DEBUG=0"

# Clear and warm up the Symfony cache
echo "Clearing and warming up cache..."
docker-compose exec -T php-fpm php bin/console cache:clear --env=prod --no-warmup
docker-compose exec -T php-fpm php bin/console cache:warmup --env=prod

# Install assets
echo "Installing assets..."
docker-compose exec -T php-fpm php bin/console assets:install --env=prod --no-interaction

# Additional Symfony commands can be added here, for example, database migrations
# echo "Running database migrations..."
# docker-compose exec -T php-fpm php bin/console doctrine:migrations:migrate --no-interaction

echo "Deployment completed successfully."
