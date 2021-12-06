FROM php:8.1-fpm-alpine as base
ENV PROJECT_DIR=/var/app
WORKDIR $PROJECT_DIR
COPY --chown=www-data:www-data ./composer.json ./composer.lock ./symfony.lock $PROJECT_DIR/
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

FROM base as dev
# install xdebug
RUN apk add --no-cache $PHPIZE_DEPS
RUN pecl install xdebug && docker-php-ext-enable xdebug

RUN composer install --no-scripts
COPY ./docker/php/php_dev.ini /usr/local/etc/php/php.ini
COPY ./docker/php/www.conf /usr/local/etc/php-fpm.d/www.conf
COPY --chown=www-data:www-data . $PROJECT_DIR

FROM base as prod
ENV APP_ENV=prod
RUN composer install --no-dev --no-scripts
COPY ./docker/php/php_prod.ini /usr/local/etc/php/php.ini
COPY ./docker/php/www.conf /usr/local/etc/php-fpm.d/www.conf
COPY --chown=www-data:www-data . $PROJECT_DIR
RUN composer dump-autoload --no-dev --classmap-authoritative --optimize