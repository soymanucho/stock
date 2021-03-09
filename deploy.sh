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

sudo php artisan view:clear

sudo php artisan route:clear
# restart queues
sudo php artisan -v queue:restart

# stop maintenance mode
sudo php artisan up
