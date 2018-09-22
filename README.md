[![Build Status](https://travis-ci.org/Dargmuesli/jonas-thelemann.de.svg?branch=master)](https://travis-ci.org/Dargmuesli/jonas-thelemann.de)
[![Known Vulnerabilities](https://snyk.io/test/github/dargmuesli/jonas-thelemann.de/badge.svg)](https://snyk.io/test/github/dargmuesli/jonas-thelemann.de)
[![Greenkeeper Badge](https://badges.greenkeeper.io/Dargmuesli/jonas-thelemann.de.svg)](https://greenkeeper.io/)
[![Website Uptime Monitoring](https://app.statuscake.com/button/index.php?Track=BkiZnQ1xpj&Days=1000&Design=3)](https://www.statuscake.com)

# jonas-thelemann.de

The source code of my website.

![Welcome](images/welcome.jpg "Welcome to my website")

## Table of contents
1. **[Configuration](#Configuration)**
1. **[Build & Deploy](#Build-Deploy)**
1. **[Usage](#Usage)**

<a name="Configuration"></a>

## Configuration

### Certificates
HTTPs/SSL encryption requires certificates. Those can easily be generated using the [new-certificates.sh](https://gist.github.com/Dargmuesli/538a2c382c009f4620803679c8172c9d) script. The root certificate needs to be imported in your browser.

### Docker Secrets
To keep confidential data, like usernames and passwords, out of the source code they need to be accessible as [Docker secrets](https://docs.docker.com/engine/swarm/secrets/). Under `docker/secrets/` these files, which contain the passwords' values, need to exist:
- postgres_password
- postgres_db
- postgres_user

Don't use password files for production though. Use the `docker secret create` command instead. PowerShell on Windows may add a carriage return at the end of strings piped to the command. A workaround can be that you create secrets from temporary files that do not contain a trailing newline. They can be written using:

```PowerShell
"secret data" | Out-File secret_name -NoNewline
```

When done, shred those files!

### DNS
The default configuration assumes that the local development is done on `jonas-thelemann.test`. Therefore one needs to configure the local DNS resolution to make this address resolvable. This can either be done by simply adding this domain and all subdomains to the operation system's hosts file or by settings up a local DNS server. An advantage of the latter method is that subdomain wildcards can be used and thus not every subdomain needs to be defined separately.

Here is an example configuration for [dnsmasq](https://en.wikipedia.org/wiki/Dnsmasq) on [Arch Linux](https://www.archlinux.org/) that uses the local DNS server on top of the router's advertised DNS server:

`/etc/dnsmasq.conf`
```Conf
# Use NetworkManager's resolv.conf
resolv-file=/run/NetworkManager/resolv.conf

# Limit to machine-wide requests
listen-address=127.0.0.1

# Wildcard DNS
address=/jonas-thelemann.test/127.0.0.1

# Enable logging (systemctl status dnsmasq)
#log-queries
```

`/etc/NetworkManager/NetworkManager.conf`
```Conf
[main]

# Don't touch /etc/resolv.conf
rc-manager=unmanaged
```

### Environment Variables
Remember to create the `credentials/.env` file using the provided template to enable complete functionality.

### PHP
For the `Composer` task to be executed you need to have [PHP](http://php.net/) installed. Make sure that the following settings are made in your `php.ini`:

#### Linux

```PHP
date.timezone = UTC
extension=gd
```

#### Windows

```PHP
date.timezone = UTC
extension=gd2
extension_dir = "ext"
```

<a name="Build-Deploy"></a>

## Build & Deploy

### Yarn

All required Node.js dependencies can be installed using [Yarn](https://yarnpkg.com/). By default the `yarn` command utilizes the `package.json` file to automatically install the dependencies to a local `node_modules` folder. Instructions on how to install Yarn can be found [here](https://yarnpkg.com/lang/en/docs/install/).

### Gulp

This repository contains all scripts needed to build this project. The `gulpfile.js` automatically manages tasks like cleaning the build (`dist`) folder, copying files to it, managing dependencies with composer and yarn, creating symlinks and a zip file and finally watching for any changes.

By default the `gulp` command executes all necessary functions to build the website. If the [gulp-cli](https://yarnpkg.com/en/package/gulp-cli) is not installed globally, you need to run `yarn global add gulp-cli` first.

### Docker

How you choose to integrate the built project is up to you. A `Dockerfile` and a `docker-compose.yml` template are provided to make deployment a breeze.

The given `Dockerfile` enables you to build a PHP/Apache-Server with the configuration files in the `docker` folder. It can be run as a Docker container just as you wish, but this alone makes the site not fully functional. Additional services like [a reverse proxy](https://traefik.io/) are needed. Those can be defined in the `docker-compose.yml` file, which describes a [stack that can be deployed on a swarm](https://docs.docker.com/engine/reference/commandline/stack_deploy/). With this file the deployment is complete.

#### Development

To generate a development version of this file you can use [PS-Docker-Management](https://github.com/dargmuesli/ps-docker-management). It simplifies development of Docker projects like this one. To setup this project's full Docker stack locally just run this command:

```PowerShell
./Invoke-PSDockerManagement.ps1 -ProjectPath ../jonas-thelemann.de/
```

#### Production

Use the `production/docker-compose.yml` file to deploy the predefined stack on a server. You need to specify environment variables as outlined in the `production/*.env` files.

`.env` contains environment variables for the stack file itself. Use a command similar to this for deployment where `-E` indicates preserved environment variables for `sudo` use:

```Bash
export $(cat .env | xargs) && sudo -E docker stack deploy -c docker-compose.yml jonas-thelemann-de
```

`traefik.env` sets provider credentials for DNS authentication as environment variables for the traefik service.

<a name="Usage"></a>

## Usage

### Adminer / PostgreSQL

Connect to the PostgreSQL instance via [Adminer](https://www.adminer.org/) on [adminer.jonas-thelemann.test](https://adminer.jonas-thelemann.test) using:

|          |                     |
| -------- | ------------------- |
| System   | PostgreSQL          |
| Server   | postgres            |
| Username | [postgres_user]     |
| Password | [postgres_password] |
| Database | [postgres_db]       |

Values in square brackets are Docker secrets.

### Apache

You can access the website at [jonas-thelemann.test](https://jonas-thelemann.test).

### Traefik

You can access the reverse proxy's dashboard at [traefik.jonas-thelemann.test](https://traefik.jonas-thelemann.test).
