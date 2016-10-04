#!/bin/bash

npm install
npm run build
/usr/bin/supervisord --nodaemon -c /etc/supervisor/supervisord.conf
