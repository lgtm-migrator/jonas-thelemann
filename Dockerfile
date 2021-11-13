#############
# Serve Nuxt in development mode.

# Should be the specific version of node:alpine.
FROM node:16.13.0-alpine3.14@sha256:3bca55259ada636e5fee8f2836aba7fa01fed7afd0652e12773ad44af95868b9 AS development

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
FROM node:16.13.0-alpine3.14@sha256:3bca55259ada636e5fee8f2836aba7fa01fed7afd0652e12773ad44af95868b9 AS build

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

FROM nginx:1.21.4-alpine@sha256:12aa12ec4a8ca049537dd486044b966b0ba6cd8890c4c900ccb5e7e630e03df0 AS production

WORKDIR /usr/share/nginx/html

COPY ./nginx.conf /etc/nginx/nginx.conf

COPY --from=build /srv/app/dist/ ./

HEALTHCHECK --interval=10s CMD wget -O /dev/null http://localhost/healthcheck || exit 1
