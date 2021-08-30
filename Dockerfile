#############
# Serve Nuxt in development mode.

FROM node:16.8.0-alpine3.14@sha256:e9dec0675a05bded5e881c6839461c2209a4abd8bd16239daf2e59db57c4adaf AS development

# Update and install dependencies.
# `git` is required by the `yarn` command
RUN apk add --no-cache \
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

FROM nginx:1.21.1-alpine@sha256:bfe377bdeb9ff37a62b49e149ac12c67a18089699bb844ce917fe3dbb834abed AS production

WORKDIR /usr/share/nginx/html

COPY ./nginx.conf /etc/nginx/nginx.conf

COPY --from=build /srv/app/dist/ ./

HEALTHCHECK --interval=10s CMD wget -O /dev/null http://localhost:8080/healthcheck || exit 1
