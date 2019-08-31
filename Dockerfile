# Base image (buster contains PHP >= 7.3, which is needed for "thesoftwarefanatics/php-html-parser")
FROM node:buster-slim AS stage_node

# Update and install PHP
RUN \
    apt-get update && \
    apt-get install -y git php php-dom php-mbstring unzip

WORKDIR /app/

# Import project files
COPY ./ /app/

# Install Gulp and build project
RUN yarn global add gulp-cli
RUN yarn add gulp@4 -D
RUN gulp build

# Base image
FROM php:7.3-apache-stretch AS stage_apache

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

# Create Apache directory and copy the files, changing the server files' owner
RUN mkdir -p $APACHE_DIR/
COPY --from=stage_node --chown=www-data:www-data /app/dist/$PROJECT_NAME $APACHE_DIR/

# Copy Apache and PHP config files
COPY docker/apache/conf/* $APACHE_CONFDIR/conf-available/
COPY docker/apache/site/* $APACHE_CONFDIR/sites-available/
COPY docker/php/* $PHP_INI_DIR/

# Enable mods, config and site
RUN a2enmod $PROJECT_MODS
RUN a2enconf $PROJECT_NAME
RUN a2dissite *
RUN a2ensite $PROJECT_NAME

# Declare required mount points
VOLUME $APACHE_DIR/credentials/$PROJECT_NAME.env
VOLUME /etc/ssl/certificates/

# Update workdir to server files' location
WORKDIR $APACHE_DIR/server/
