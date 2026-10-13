FROM php:8.4-fpm-alpine

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions intl opcache apcu pdo_mysql zip xdebug

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

RUN apk add --no-cache shadow && \
    chown -R www-data:www-data /app && \
    usermod -u 1000 www-data && \
    groupmod -g 1000 www-data && \
    apk del shadow

USER www-data
