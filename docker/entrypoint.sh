#!/bin/sh
rm -r /var/www/jonas-thelemann/server/*
cp -r /usr/src/jonas-thelemann/server/ /var/www/jonas-thelemann/

exec "$@"