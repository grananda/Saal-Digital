#!/bin/bash

php artisan migrate
php artisan db:seed

vendor/bin/heroku-php-apache2 public/
