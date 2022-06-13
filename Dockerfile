#############
# Serve Nuxt in development mode.

# Should be the specific version of node:alpine.
FROM node:16.15.1-alpine3.14@sha256:889139aa824c8b9dd29938eecfd300d51fc2e984f9cd03df391bcfbe9cf10b53 AS development

# Update and install dependencies.
# `git` is required by the `yarn` command
RUN apk add --no-cache \
    git \
  && rm -rf /var/cache/apk/*

WORKDIR /srv/app/

COPY ./package.json ./yarn.lock ./

RUN yarn install

COPY ./ ./

CMD ["yarn", "dev", "--hostname", "0.0.0.0"]
HEALTHCHECK --interval=10s CMD wget -O /dev/null http://localhost:3000/api/healthcheck || exit 1


########################
# Build Nuxt.

# Should be the specific version of node:alpine.
FROM node:16.15.1-alpine3.14@sha256:889139aa824c8b9dd29938eecfd300d51fc2e984f9cd03df391bcfbe9cf10b53 AS build

ARG NUXT_ENV_STACK_DOMAIN=jonas-thelemann.de
ENV NUXT_ENV_STACK_DOMAIN=${NUXT_ENV_STACK_DOMAIN}
ENV NODE_ENV=production

# Update and install dependencies.
# - `git` is required by the `yarn` command
RUN apk add --no-cache \
    git \
  && rm -rf /var/cache/apk/*

WORKDIR /srv/app/

COPY --from=development /srv/app/ ./

RUN yarn run lint \
  && yarn run build


#######################
# Provide a web server.

FROM nginx:1.22.0-alpine@sha256:f335d7436887b39393409261603fb248e0c385ec18997d866dd44f7e9b621096 AS production

WORKDIR /usr/share/nginx/html

COPY ./nginx.conf /etc/nginx/nginx.conf

COPY --from=build /srv/app/.output/public/ ./

HEALTHCHECK --interval=10s CMD wget -O /dev/null http://localhost/api/healthcheck || exit 1
