#############
# Serve Nuxt in development mode.

# Should be the specific version of node:alpine.
FROM node:16.14.0-alpine3.14@sha256:98a87dfa76dde784bb4fe087518c839697ce1f0e4f55e6ad0b49f0bfd5fbe52c AS development

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
FROM node:16.14.0-alpine3.14@sha256:98a87dfa76dde784bb4fe087518c839697ce1f0e4f55e6ad0b49f0bfd5fbe52c AS build

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

FROM nginx:1.21.6-alpine@sha256:581ac1da0f8f8c342fa6cf77885a2320227667c0bc42bdca4b1dd74599d02498 AS production

WORKDIR /usr/share/nginx/html

COPY ./nginx.conf /etc/nginx/nginx.conf

COPY --from=build /srv/app/.output/public/ ./

HEALTHCHECK --interval=10s CMD wget -O /dev/null http://localhost/api/healthcheck || exit 1
