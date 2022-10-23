FROM php:8.1.5-fpm

COPY ./php-fpm/php.ini $PHP_INI_DIR/php.ini

RUN apt-get update && apt-get install -y && apt-get install curl -y

RUN apt-get update \
        && apt-get -y --no-install-recommends install \
                mc \
                zip \
                git \
                ssh \
                curl \
                wget \
                bash \
                unzip \
                libpq-dev \
                libgmp-dev \
                libicu-dev \
                zlib1g-dev \
                libxml2-dev \
                libtidy-dev \
                libmemcached-dev \
                libmagickwand-dev \
                ghostscript  \
    && apt-get clean \
        && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN apt-get update -y && apt-get install -y libwebp-dev libjpeg62-turbo-dev libpng-dev libxpm-dev \
    libfreetype6-dev
RUN apt-get update && \
    apt-get install -y \
        zlib1g-dev

RUN apt-get -y update \
&& apt-get install -y libicu-dev \
&& docker-php-ext-configure intl \
&& docker-php-ext-install intl

RUN docker-php-ext-install opcache


RUN apt-get update && apt-get install -y --no-install-recommends apt-utils software-properties-common

RUN apt-get install -y libzip-dev
RUN docker-php-ext-install zip

RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd
RUN docker-php-ext-install exif

RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

RUN apt-get update && apt-get upgrade -y \
    && apt-get install apt-utils -y \
    && apt-get install git zip vim libzip-dev libgmp-dev libffi-dev libssl-dev -y \
    && docker-php-ext-install -j$(nproc) sockets zip gmp pcntl bcmath ffi \
    && docker-php-source delete \
    && apt-get autoremove --purge -y && apt-get autoclean -y && apt-get clean -y

RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis


COPY ./php/conf.d /usr/local/etc/php/conf.d
WORKDIR /app
