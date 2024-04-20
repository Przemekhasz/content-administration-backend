#!/bin/bash

source .env

echo "APP_ENV=$APP_ENV";
echo "XDEBUG=$XDEBUG";

if [ "$XDEBUG" = "true" ]; then
  cp ./docker/php-fpm/script/xdebug_installer.sh /usr/local/bin/xdebug_installer.sh
  chmod +x /usr/local/bin/xdebug_installer.sh && /usr/local/bin/xdebug_installer.sh
fi

if [ "$APP_ENV" = "dev" ] && [ ! -d "vendor" ]; then
  composer install
fi

php-fpm -F
