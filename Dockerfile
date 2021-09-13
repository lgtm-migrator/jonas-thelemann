#############
# Serve Nuxt in development mode.

# Should be the specific version of node:alpine.
FROM node:16.9.1-alpine3.14@sha256:62f442b1f2be995cb7352df38a77f936cbedf02ca3213f0cf8f61facf74d0d68 AS development

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
HEALTHCHECK --interval=10s CMD wget -O /dev/null http://localhost:3000/healthcheck || exit 1


########################
# Build Nuxt.

# Should be the specific version of node:alpine.
FROM node:16.9.1-alpine3.14@sha256:62f442b1f2be995cb7352df38a77f936cbedf02ca3213f0cf8f61facf74d0d68 AS build

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
  && yarn run generate


#######################
# Provide a web server.

FROM nginx:1.21.3-alpine@sha256:1ff1364a1c4332341fc0a854820f1d50e90e11bb0b93eb53b47dc5e10c680116 AS production

WORKDIR /usr/share/nginx/html

COPY ./nginx.conf /etc/nginx/nginx.conf

COPY --from=build /srv/app/dist/ ./

HEALTHCHECK --interval=10s CMD wget -O /dev/null http://localhost/healthcheck || exit 1
