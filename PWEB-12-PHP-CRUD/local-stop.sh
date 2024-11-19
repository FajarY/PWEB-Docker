#!/bin/bash

sudo unlink /etc/nginx/sites-enabled/pweb-nginx
docker compose -f docker-compose-local.yaml down

rm -rf /var/www/pweb-nginx

sudo rm /etc/nginx/sites-available/pweb-nginx