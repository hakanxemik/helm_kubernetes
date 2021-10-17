#!/bin/bash

cp -R /var/www/tmp/. /var/www/html/
chown -R www-data:www-data /var/www/html

cd /app
composer install
php artisan migrate:fresh

exec "$@"
