#!/bin/bash
set -e

mkdir -p /srv/www/webtemp
mkdir -p /srv/www/temp
mkdir -p /srv/www/log
chown -R www-data:www-data /srv/www

cd /srv
composer install

exec "$@"