#!/bin/bash
pecl install xdebug
docker-php-ext-enable xdebug
# shellcheck disable=SC2129
echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
echo "xdebug.client_host='host.docker.internal'" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
echo "xdebug.zend_extension=xdebug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
