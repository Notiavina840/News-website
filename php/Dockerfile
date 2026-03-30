FROM php:8.2-fpm-alpine

RUN apk add --no-cache icu-dev libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

WORKDIR /var/www/html

# Composer is optional but handy for future dependencies
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
