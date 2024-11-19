FROM ubuntu:latest

WORKDIR /var/www

RUN apt-get update
RUN apt-get install nginx php php-fpm php-mysqli unzip -y

RUN mkdir php-website
COPY ./public/* php-website/
COPY ./nginx.conf /etc/nginx/nginx.conf
COPY ./run.sh run.sh
RUN chmod +x run.sh

ENTRYPOINT [ "./run.sh" ]