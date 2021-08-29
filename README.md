[![build status](https://github.com/dargmuesli/jonas-thelemann/workflows/CI/badge.svg)](https://github.com/dargmuesli/jonas-thelemann/actions?query=workflow%3A%22CI%22 "build status")
[![Language grade: JavaScript](https://img.shields.io/lgtm/grade/javascript/g/dargmuesli/jonas-thelemann.svg?logo=lgtm&logoWidth=18)](https://lgtm.com/projects/g/dargmuesli/jonas-thelemann/context:javascript)
[![website uptime monitoring](https://app.statuscake.com/button/index.php?Track=BkiZnQ1xpj&Days=1000&Design=3)](https://www.statuscake.com "website uptime monitoring")

# jonas-thelemann

The source code of [jonas-thelemann.de](https://jonas-thelemann.de/).

<!-- ![Welcome](images/welcome.jpg "Jonas Thelemann") -->

## Table of Contents
1. **[Development](#development)**
1. **[Deployment](#deployment)**
<!-- TODO
1. **[Context](#context)**
-->

## Development
This project builds upon the [Nuxt.js](https://nuxtjs.org/) framework.
Install [Node.js](https://nodejs.org/) and [Yarn](https://yarnpkg.com/).
Then run `yarn` to install the project's dependencies.
After that, use `yarn develop` for development or `yarn generate` to generate the [static page](https://nuxtjs.org/blog/going-full-static).

Alternatively, build the provided [Dockerfile](https://www.docker.com/) using `docker build -t dargmuesli/jonas-thelemann .` and run the resulting image using `docker run dargmuesli/jonas-thelemann`.

## Deployment
This project is deployed within the [jonas-thelemann_stack](https://github.com/dargmuesli/jonas-thelemann_stack/) in accordance to the [DargStack template](https://github.com/dargmuesli/dargstack_template/) to make deployment a breeze.
