FROM php:7.4-fpm-alpine

COPY ./src/composer.json /var/www/composer.json

RUN docker-php-ext-install pdo pdo_mysql

RUN composer install --prefer-source --no-interaction

WORKDIR /var/www