#############
# Serve Nuxt in development mode.

# Should be the specific version of node:alpine.
FROM node:18.3.0-alpine3.14@sha256:a648bbe9a0af3991ef1bf02208b2e9b04b4bad49790efc5740a43d13cd1482b5 AS development

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
FROM node:18.3.0-alpine3.14@sha256:a648bbe9a0af3991ef1bf02208b2e9b04b4bad49790efc5740a43d13cd1482b5 AS build

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

FROM nginx:1.23.1-alpine@sha256:082f8c10bd47b6acc8ef15ae61ae45dd8fde0e9f389a8b5cb23c37408642bf5d AS production

WORKDIR /usr/share/nginx/html

COPY ./nginx.conf /etc/nginx/nginx.conf

COPY --from=build /srv/app/.output/public/ ./

HEALTHCHECK --interval=10s CMD wget -O /dev/null http://localhost/api/healthcheck || exit 1
