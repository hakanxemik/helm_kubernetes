#!/bin/bash

cd /app
composer install
php artisan migrate:fresh
