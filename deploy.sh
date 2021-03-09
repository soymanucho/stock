#!/bin/sh

# activate maintenance mode
sudo php artisan down

# update source code
sudo git pull

# update database
sudo php artisan migrate --force
# --force		Required to run when in production.

# clear cache
sudo php artisan cache:clear

# clear config cache
sudo php artisan config:clear
sudo php artisan config:cache

sudo php artisan view:clear
sudo php artisan view:cache

sudo php artisan route:clear
sudo php artisan route:cache

sudo php artisan event:clear
sudo php artisan event:cache
# restart queues
sudo php artisan -v queue:restart

# stop maintenance mode
sudo php artisan up
