#!/bin/sh
rm -r /var/www/jonas-thelemann/server/*
cp -a /usr/src/jonas-thelemann/server/ /var/www/jonas-thelemann/

exec "$@"