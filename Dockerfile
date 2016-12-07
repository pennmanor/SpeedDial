FROM quay.io/pennmanor/production:baseimage-latest
MAINTAINER chad@pennmanor.net

#Install php, nginx and run updates
RUN apt-get update && apt-get dist-upgrade -y
RUN apt-get install -y nginx php7.0-fpm php7.0 php7.0-common php7.0-xml php7.0-json php7.0-curl
RUN /usr/lib/php/php7.0-fpm-checkconf

#Nginx config file
COPY config/nginx.conf /etc/nginx/sites-available/default

#Copy all the code into the container
COPY index.html /var/www/html/
COPY browserconfig.xml /var/www/html/
COPY styles.css /var/www/html/
COPY twitter.html /var/www/html/
COPY veritime.html /var/www/html/
COPY cache/ /var/www/html/cache
COPY fonts/ /var/www/html/fonts
COPY icons/ /var/www/html/icons
COPY images/ /var/www/html/images
COPY js/ /var/www/html/js
COPY php/ /var/www/html/php

#configure the nginx and php services
RUN mkdir /etc/service/nginx
ADD config/service/nginx/run /etc/service/nginx/run
RUN chmod 755 /etc/service/nginx/run
RUN mkdir /etc/service/php-fpm
ADD config/service/php-fpm/run /etc/service/php-fpm/run
RUN chmod 755 /etc/service/php-fpm/run

EXPOSE 80

#Install/configure confd to build a configuration file from environment variables
RUN curl -fsSL -o /usr/bin/confd https://github.com/kelseyhightower/confd/releases/download/v0.11.0/confd-0.11.0-linux-amd64
RUN chmod +x /usr/bin/confd
RUN mkdir -p /etc/confd/{conf.d,templates}
ADD config/confd/homepage.toml /etc/confd/conf.d/
ADD config/confd/templates/config.php.tmpl /etc/confd/templates/

#Make sure www-data owns everthing
RUN chown -R www-data:www-data /var/www/html/

#Configure cron
ADD config/cron/homepage /etc/cron.d/homepage
