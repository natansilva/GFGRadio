#!/bin/bash

service php7.0-fpm start
nginx -g 'daemon off;'
cd /var/www/
npm install
npm run build
