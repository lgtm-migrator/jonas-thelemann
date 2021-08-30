#############
# Serve Nuxt in development mode.

FROM node:16.8.0@sha256:987be0a7ca165b6b19bf77ca812e980f603a10c1000bf25095cd89e2b146f9ad AS development

# Update and install dependencies.
# `node-zopfli-es` require at least buster.
# `node-zopfli-es` requires non-slim.
# `git` is required by the `yarn` command
RUN apt-get update \
    && apt-get install --no-install-recommends -y \
        git

WORKDIR /srv/app/

COPY ./package.json ./yarn.lock ./

RUN yarn install

COPY ./ ./

CMD ["yarn", "dev", "--hostname", "0.0.0.0"]
HEALTHCHECK --interval=10s CMD wget -O /dev/null http://localhost:3000/healthcheck || exit 1


########################
# Build Nuxt.

FROM node:16.8.0-alpine3.14@sha256:4ca6db20301c460ffa44b1d398788c903306f55de6ded981ab377d036c172836 AS build

ARG NUXT_ENV_STACK_DOMAIN=jonas-thelemann.de
ENV NUXT_ENV_STACK_DOMAIN=${NUXT_ENV_STACK_DOMAIN}
ENV NODE_ENV=production

# Update and install dependencies.
# - `git` is required by the `yarn` command
RUN apk add --no-cache \
    git

WORKDIR /srv/app/

COPY --from=development /srv/app/ ./

RUN yarn run lint
RUN yarn run generate


#######################
# Provide a web server.

FROM nginx:1.21.1-alpine@sha256:bd0aa91fe6a182db22032463c17644cd2ff3bbe415e7b84964283bba687acaa6 AS production

WORKDIR /usr/share/nginx/html

RUN rm /etc/nginx/conf.d/default.conf
COPY ./nginx.conf /etc/nginx/conf.d/nginx.conf

COPY --from=build /srv/app/dist/ ./

HEALTHCHECK --interval=10s CMD wget -O /dev/null http://localhost:8080/healthcheck || exit 1
