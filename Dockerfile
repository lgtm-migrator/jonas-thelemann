#############
# Serve Nuxt in development mode.

FROM node:16.8.0-alpine3.14@sha256:e9dec0675a05bded5e881c6839461c2209a4abd8bd16239daf2e59db57c4adaf AS development

# Update and install dependencies.
# - `git` is required by the `yarn` command
# - `curl` is required by the healthcheck
RUN apk add --no-cache \
    git \
    curl

WORKDIR /srv/app/

COPY ./package.json ./yarn.lock ./

RUN yarn install

COPY ./ ./

CMD ["yarn", "dev", "--hostname", "0.0.0.0"]
HEALTHCHECK --interval=10s CMD curl -f http://localhost:3000/healthcheck || exit 1


########################
# Build Nuxt.

FROM node:16.8.0-alpine3.14@sha256:e9dec0675a05bded5e881c6839461c2209a4abd8bd16239daf2e59db57c4adaf AS build

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

FROM httpd:2.4.48-alpine3.14@sha256:37757f1833175ab266ff112fb1a0cd1c291cdd444d907463849bc0093ffad803 AS production

# - `curl` is required by the healthcheck
RUN apk add --no-cache \
    curl

WORKDIR /usr/local/apache2/htdocs/

COPY --from=build /srv/app/dist/ ./

HEALTHCHECK --interval=10s CMD curl -f http://localhost:3000/healthcheck || exit 1
