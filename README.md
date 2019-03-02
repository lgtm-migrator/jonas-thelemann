[![Build Status](https://travis-ci.org/Dargmuesli/jonas-thelemann.svg?branch=master)](https://travis-ci.org/Dargmuesli/jonas-thelemann)
[![Known Vulnerabilities](https://snyk.io/test/github/dargmuesli/jonas-thelemann/badge.svg)](https://snyk.io/test/github/dargmuesli/jonas-thelemann)
[![Greenkeeper Badge](https://badges.greenkeeper.io/Dargmuesli/jonas-thelemann.svg)](https://greenkeeper.io/)
[![Website Uptime Monitoring](https://app.statuscake.com/button/index.php?Track=BkiZnQ1xpj&Days=1000&Design=3)](https://www.statuscake.com)

# jonas-thelemann

The source code of [my website](https://jonas-thelemann.de/).

![Welcome](images/welcome.jpg "Welcome to my website")

## Table of Contents
1. **[Build](#build)**
1. **[Deployment](#deployment)**

<a name="build"></a>

## Build

- ### Containerized

  The provided `Dockerfile` lets you build an Apache-PHP server image with the configuration files in the `docker` folder.
  Build it with the following command:

  ```bash
  docker build -t dargmuesli/jonas-thelemann .
  ```

- ### Containerless

  #### Yarn

  All required [Node.js](https://nodejs.org/) dependencies can be installed using [Yarn](https://yarnpkg.com/). By default the `yarn` command utilizes the `package.json` file to automatically install the dependencies to a local `node_modules` folder. Instructions on how to install Yarn can be found [here](https://yarnpkg.com/lang/en/docs/install/).

  #### Gulp

  This repository contains all scripts required to build this project. The `gulpfile.js` automatically manages tasks like cleaning the build (`dist`) folder, copying files to it, managing dependencies with composer and yarn, creating symlinks and a zip file and, finally, watching for changes too.

  By default the `gulp` command executes all necessary functions to build the website. If the [gulp-cli](https://yarnpkg.com/en/package/gulp-cli/) is not installed globally, you need to run `yarn global add gulp-cli` first.

<a name="deployment"></a>

## Deployment

- ### Containerized

  This project is deployed within the [jonas-thelemann-stack](https://github.com/Dargmuesli/jonas-thelemann-stack/) in accordance to the [DargStack template](https://github.com/Dargmuesli/dargstack-template/) to make deployment a breeze.

  The Docker image alone doesn't provide a fully functional website. Additional services like [a reverse proxy](https://traefik.io/) are needed. Those are defined in the `stack.yml` file, which describes a [stack that can be deployed on a swarm](https://docs.docker.com/engine/reference/commandline/stack_deploy/). With this file the deployment is complete.

- ### Containerless

  #### PHP

  [PHP](https://php.net/) needs to be installed for the Gulp `composerUpdate` task to be executed. Make sure that the following settings are set in your `php.ini`:

  ##### Linux

  ```PHP
  date.timezone = UTC
  extension=gd
  ```

  ##### Windows

  ```PHP
  date.timezone = UTC
  extension=gd2
  extension_dir = "ext"
  ```

### Environment Variables

Remember to create the `credentials/.env` file using the provided template to enable complete functionality.
