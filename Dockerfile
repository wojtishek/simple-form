FROM dockette/web:php-83

COPY --from=composer/composer:latest-bin /composer /usr/bin/composer
COPY composer.json /srv/composer.json

WORKDIR /srv
RUN composer install

EXPOSE 80