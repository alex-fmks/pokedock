#FROM httpd
#LABEL authors="AlexanderFarmakis"
#RUN apt update && \
#    apt install -y php php-mysql libapache2-mod-php
#COPY public/pokemon.html /usr/local/apache2/htdocs/
#COPY public/phpinfo.php /usr/local/apache2/htdocs/

FROM php:8.3-apache

RUN docker-php-ext-install pdo pdo_mysql

COPY pokemon.conf /etc/apache2/sites-available
RUN a2ensite pokemon.conf
RUN mkdir