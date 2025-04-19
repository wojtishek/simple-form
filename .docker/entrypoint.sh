#!/bin/bash
set -e

mkdir -p /srv/www/webtemp
cd /srv
chown -R www-data:www-data /srv/www
composer install

exec "$@"