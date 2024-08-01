#!/usr/bin/env bash

# Run Laravel migrations and seed the database
php artisan migrate:fresh --seed --force

# Run Laravel storage link
php artisan storage:link

# Start the built-in PHP server
php -S 0.0.0.0:10000 -t public
