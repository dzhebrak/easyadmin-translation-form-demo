FROM dzhebrak/php:8.2-fpm-alpine

#RUN install-php-extensions xdebug

WORKDIR /app

RUN chown -R www-data:www-data /app && chown -R www-data:www-data /var/www/ && \
    usermod -u 1000 www-data && groupmod -g 1000 www-data

USER www-data
