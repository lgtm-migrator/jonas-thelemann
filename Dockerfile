# Base image
FROM node:stretch AS stage_node

# PHP7.2 package list (workaround for dependency "thesoftwarefanatics/php-html-parser")
RUN apt-get update && apt-get install -y apt-transport-https lsb-release ca-certificates
RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php.list

# Update and install PHP
RUN \
    apt-get update && \
    apt-get install -y php7.3 php7.3-dom php7.3-mbstring unzip

WORKDIR /app

# Import project files
COPY ./ /app/

# Install Gulp and build project
RUN yarn global add gulp-cli
RUN yarn add gulp@4 -D
RUN gulp build

# Base image
FROM php:7.3-apache AS stage_apache

# Project variables
ENV PROJECT_NAME jonas-thelemann
ENV PROJECT_MODS expires headers macro rewrite ssl

# Apache & PHP variables
ENV APACHE_DIR /var/www/$PROJECT_NAME
ENV APACHE_CONFDIR /etc/apache2
ENV PHP_INI_DIR /usr/local/etc/php

# Enable extensions
RUN apt-get update \
    && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install \
    pdo_pgsql

# Create Apache directory and copy the files
RUN mkdir -p $APACHE_DIR
COPY --from=stage_node /app/dist/$PROJECT_NAME $APACHE_DIR/

# Change server files' owner
RUN chown www-data:www-data -R $APACHE_DIR/server

# Copy Apache and PHP config files
COPY docker/apache/conf/* $APACHE_CONFDIR/conf-available/
COPY docker/apache/site/* $APACHE_CONFDIR/sites-available/
COPY docker/php/* $PHP_INI_DIR/

# Enable mods, config and site
RUN a2enmod $PROJECT_MODS
RUN a2enconf $PROJECT_NAME
RUN a2dissite *
RUN a2ensite $PROJECT_NAME

# Update workdir to server files' location
WORKDIR $APACHE_DIR/server
