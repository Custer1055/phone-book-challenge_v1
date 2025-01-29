FROM php:8.1-fpm-alpine

#Install postgres dependencies and application dependencies
RUN set -ex && apk add --update --no-cache linux-headers postgresql-dev libzip-dev zip git \
    freetype-dev gmp-dev libjpeg-turbo-dev libpng-dev autoconf g++ make bash openrc curl nodejs npm

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-configure exif \
    && docker-php-ext-configure gmp \
    && docker-php-ext-install -j "$(nproc)" gd \
    && docker-php-ext-install mysqli pdo_pgsql exif zip

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

ENV COMPOSER_MEMORY_LIMIT=-1

# Create dev user
USER root
RUN addgroup -S dev &&\
    adduser -u 1000 -G dev -S dev

RUN chown -R dev:dev /home/dev

# Switch to use a non-root user from here on
USER dev

# Setup document root
RUN mkdir -p /var/www/html/phone-book

# Set root dir
WORKDIR /var/www/html/phone-book
