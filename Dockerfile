#############
# Serve Nuxt in development mode.

# Should be the specific version of node:alpine.
FROM node:16.15.1-alpine3.14@sha256:889139aa824c8b9dd29938eecfd300d51fc2e984f9cd03df391bcfbe9cf10b53 AS development

WORKDIR /srv/app/

COPY ./package.json ./pnpm-lock.yaml ./

RUN corepack enable && \
  pnpm install

COPY ./ ./

CMD ["pnpm", "run", "dev", "--hostname", "0.0.0.0"]
HEALTHCHECK --interval=10s CMD wget -O /dev/null http://localhost:3000/api/healthcheck || exit 1


########################
# Build Nuxt.

# Should be the specific version of node:alpine.
FROM node:16.15.1-alpine3.14@sha256:889139aa824c8b9dd29938eecfd300d51fc2e984f9cd03df391bcfbe9cf10b53 AS build

ARG NUXT_ENV_STACK_DOMAIN=jonas-thelemann.de
ENV NUXT_ENV_STACK_DOMAIN=${NUXT_ENV_STACK_DOMAIN}
ENV NODE_ENV=production

WORKDIR /srv/app/

COPY --from=development /srv/app/ ./

RUN corepack enable && \
  pnpm run lint && \
  pnpm run build


#######################
# Provide a web server.

FROM nginx:1.23.1-alpine@sha256:c1b0849508fe00ded75824a48c28c51bd0818b335a50aba1c904b13942b9422f AS production

WORKDIR /usr/share/nginx/html

COPY ./nginx.conf /etc/nginx/nginx.conf

COPY --from=build /srv/app/.output/public/ ./

HEALTHCHECK --interval=10s CMD wget -O /dev/null http://localhost/api/healthcheck || exit 1
