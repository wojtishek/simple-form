#!/bin/bash
set -e

mkdir -p /srv/www/webtemp
mkdir -p /srv/log
mkdir -p /srv/temp
chown -R www-data:www-data /srv/www
chmod -R 755 /srv/www
chmod -R 777 /srv/log
chmod -R 777 /srv/temp

cd /srv
composer install

exec "$@"