[![build status](https://travis-ci.com/dargmuesli/jonas-thelemann.svg?branch=master)](https://travis-ci.com/dargmuesli/jonas-thelemann "build status")
[![Docker layer size & count](https://images.microbadger.com/badges/image/dargmuesli/jonas-thelemann.svg)](https://microbadger.com/images/dargmuesli/jonas-thelemann "Docker layer size & count")
[![Renovate](https://badges.renovateapi.com/github/dargmuesli/jonas-thelemann)](https://renovatebot.com/ "Renovate")
[![website uptime monitoring](https://app.statuscake.com/button/index.php?Track=BkiZnQ1xpj&Days=1000&Design=3)](https://www.statuscake.com "website uptime monitoring")

# jonas-thelemann

The source code of [jonas-thelemann.de](https://jonas-thelemann.de/).

![Welcome](images/welcome.jpg "Jonas Thelemann")

## Table of Contents
1. **[Development](#development)**
    - **[Build](#build)**
    - **[Deployment](#deployment)**
<!-- TODO
1. **[Context](#context)**
-->

## Development
This project is deployed within the [jonas-thelemann_stack](https://github.com/Dargmuesli/jonas-thelemann_stack/) in accordance to the [DargStack template](https://github.com/Dargmuesli/dargstack_template/) to make deployment a breeze.

The provided `Dockerfile` lets you build an Apache-PHP server image with the configuration files in the `docker` folder. Build it with the following command:

```bash
docker build -t dargmuesli/jonas-thelemann .
```

The following information is therefore only useful if you decide to deploy this project containerless.

### Build

#### Yarn
All required [Node.js](https://nodejs.org/) dependencies can be installed using [Yarn](https://yarnpkg.com/). By default the `yarn` command utilizes the `package.json` file to automatically install the dependencies to a local `node_modules` folder. Instructions on how to install Yarn can be found [here](https://yarnpkg.com/lang/en/docs/install/).

#### Gulp
This repository contains all scripts required to build this project. The `gulpfile.js` automatically manages tasks like cleaning the build (`dist`) folder, copying files to it, managing dependencies with composer and yarn, creating symlinks and a zip file and, finally, watching for changes too.

By default the `gulp` command executes all necessary functions to build the website. If the [gulp-cli](https://yarnpkg.com/en/package/gulp-cli/) is not installed globally, you need to run `yarn global add gulp-cli` first.

### Deployment

#### Environment Variables
Create the `credentials/jonas-thelemann.env` file using the provided template to enable complete functionality.

#### PHP
[PHP](https://php.net/) needs to be installed for the Gulp `composerUpdate` task to be executed. Make sure that the following settings are set in your `php.ini`:

```PHP
# Linux
date.timezone = UTC
extension=gd

# Windows
date.timezone = UTC
extension=gd2
extension_dir = "ext"
```
