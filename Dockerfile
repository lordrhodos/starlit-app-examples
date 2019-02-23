FROM php:7.1-apache

MAINTAINER Patrick Rodacker <patrick.rodacker@starweb.se>

RUN a2enmod rewrite && \
    a2enmod headers && \
    apt-get update && apt-get install -y --no-install-recommends\
        mysql-client \
        libicu-dev \
        git zlib1g-dev \
        libzip-dev && \
    docker-php-ext-configure zip --with-libzip && \
    docker-php-ext-install zip && \
    docker-php-ext-install pdo_mysql mbstring && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    ln -sf /proc/1/fd/2 /var/log/php-error.log

RUN usermod -u 1000 www-data

COPY ./docker/apache.conf /etc/apache2/sites-enabled/000-default.conf
ADD . /var/www/app

WORKDIR /var/www/app
RUN composer install

