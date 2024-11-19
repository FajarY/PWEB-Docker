#!/bin/bash
rm -rf /var/www/pweb-nginx

sudo unlink /etc/nginx/sites-enabled/pweb-nginx
docker compose -f docker-compose-local.yaml up --build -d

cp -r ./public /var/www/pweb-nginx

sudo echo "server
{
    listen 8080;
    root /var/www/pweb-nginx;

    index index.php;

    location / 
    {
        try_files \$uri \$uri/ =404;
    }

    location ~ \.php$
    {
        include /etc/nginx/snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
        include /etc/nginx/fastcgi_params;
    }

    location ~ /\.ht
    {
        deny all;
    }

    error_log /var/log/nginx/error.log;
    access_log /var/log/nginx/access.log;
}
" > /etc/nginx/sites-available/pweb-nginx
sudo ln -s /etc/nginx/sites-available/pweb-nginx /etc/nginx/sites-enabled

sudo service nginx restart