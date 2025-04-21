#!/bin/bash
set -e

mkdir -p /srv/www/webtemp
mkdir -p /srv/temp
mkdir -p /srv/log
chown -R www-data:www-data /srv/www

cd /srv
composer install

exec "$@"