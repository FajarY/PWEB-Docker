#!/bin/bash
echo "server
{
    listen 8080;
    root $(pwd)/public;

    index index.php;

    location / 
    {
        try_files \$uri \$uri/ =404;
    } 
}
"