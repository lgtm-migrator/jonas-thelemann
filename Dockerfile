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

FROM nginx:1.23.0-alpine@sha256:4a846cc240449c53c8ae24269ba6bcaee5167d8ad75cd2a8d8ba422b7c726979 AS production

WORKDIR /usr/share/nginx/html

COPY ./nginx.conf /etc/nginx/nginx.conf

COPY --from=build /srv/app/.output/public/ ./

HEALTHCHECK --interval=10s CMD wget -O /dev/null http://localhost/api/healthcheck || exit 1
