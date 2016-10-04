FROM ubuntu:16.04
MAINTAINER Natan Silva <natan.silva@gmail.com>

#Basic
RUN mkdir /music && \
    chmod 777 -R /music && \
    apt-get update -y && \
    apt-get install -y wget && \
    apt-get install -y curl

#Install Supervisor
RUN apt-get install -y supervisor

#Install Nginx
RUN apt-get install -y nginx

#Install PHP
RUN apt-get install -y php7.0 php7.0-cli php7.0-common php7.0-fpm php-ssh2 \
        php7.0-bcmath php7.0-phpdbg php7.0-mcrypt php7.0-mysql php7.0-curl \
        php7.0-intl php7.0-json php7.0-xml php7.0-mbstring php7.0-soap \
        php7.0-zip php-xdebug
RUN service php7.0-fpm start

#Install Compose
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#Install Node and npm
RUN curl -sL https://deb.nodesource.com/setup_6.x -o ./nodesource_setup.sh  && \
    bash ./nodesource_setup.sh  && \
    apt-get install -y nodejs

ADD Entrypoint.sh /Entrypoint.sh

VOLUME /var/www/
VOLUME /etc/nginx/sites-enable/
VOLUME /etc/supervisor/conf.d/
WORKDIR /var/www/

EXPOSE 80
EXPOSE 8080

ENTRYPOINT /Entrypoint.sh
