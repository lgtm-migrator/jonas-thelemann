# Base image (buster contains PHP >= 7.3, which is needed for "thesoftwarefanatics/php-html-parser")
FROM node:14.16.0-buster-slim@sha256:908fe3e2e9196721064e1f1bf001f630ae1d7b2b4bdd65effff9f271711b04bb AS build

# Update and install build dependencies
RUN \
    apt-get update \
    && apt-get install --no-install-recommends -y composer git php php-dom php-mbstring unzip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Import project files
COPY ./ /srv/app/
WORKDIR /srv/app/

# Install Gulp and build project
RUN yarn global add gulp-cli
RUN yarn add gulp@4 -D
RUN yarn build


# Base image (buster contains python2, which is needed for node-sass)
FROM php:7.4.15-fpm-buster@sha256:a835cfb03b611962d8d8c78c92b3ed49eb640708ea119ce3f1195483e91ef927 AS development

# Environment variables
ENV PHP_INI_DIR /usr/local/etc/php
ENV PROJECT_NAME jonas-thelemann

# Enable extensions
RUN apk add --no-cache \
    postgresql-dev \
    && docker-php-ext-install \
    pdo_pgsql

# Copy PHP configuration files
COPY --chown=www-data:www-data ./docker/php/* $PHP_INI_DIR/

# Declare required mount points
VOLUME /var/www/$PROJECT_NAME/credentials/$PROJECT_NAME.env

# Update workdir to server files' location
WORKDIR /var/www/$PROJECT_NAME/


# Base image
FROM php:7.4-fpm-alpine@sha256:8b12f52d934e4fb71e3cfc08d5ede8606515655157c614684690a6f0a6a8f7a1 AS production

# Environment variables
ENV PHP_INI_DIR /usr/local/etc/php
ENV PROJECT_NAME jonas-thelemann

# Enable extensions
RUN apk add --no-cache \
    postgresql-dev \
    && docker-php-ext-install \
    pdo_pgsql

# Copy built source files, changing the server files' owner
COPY --chown=www-data:www-data --from=build /srv/app/dist/$PROJECT_NAME/ /usr/src/$PROJECT_NAME/

# Copy PHP configuration files
COPY --chown=www-data:www-data ./docker/php/* $PHP_INI_DIR/

# Copy the entrypoint script to root
COPY ./docker/entrypoint.sh /

# Declare required mount points
VOLUME /var/www/$PROJECT_NAME/credentials/$PROJECT_NAME.env

# Update workdir to server files' location
WORKDIR /var/www/$PROJECT_NAME/

# Specify entrypoint script, that updates the source files in the shared volume (nginx)
ENTRYPOINT ["/entrypoint.sh"]
CMD ["php-fpm"]