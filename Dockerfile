#############
# Serve Nuxt in development mode.

# Should be the specific version of node:alpine.
FROM node:16.9.0-alpine3.14@sha256:82558d49922838cec5fe3220ab00245d64c6980099b1d1bbf83a8ecbffebbe8d AS development

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
FROM node:16.9.0-alpine3.14@sha256:82558d49922838cec5fe3220ab00245d64c6980099b1d1bbf83a8ecbffebbe8d AS build

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

FROM nginx:1.21.1-alpine@sha256:bfe377bdeb9ff37a62b49e149ac12c67a18089699bb844ce917fe3dbb834abed AS production

WORKDIR /usr/share/nginx/html

COPY ./nginx.conf /etc/nginx/nginx.conf

COPY --from=build /srv/app/dist/ ./

HEALTHCHECK --interval=10s CMD wget -O /dev/null http://localhost/healthcheck || exit 1
