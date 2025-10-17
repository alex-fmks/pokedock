FROM httpd
LABEL authors="AlexanderFarmakis"
RUN apt update && \
    apt install -y php php-mysql libapache2-mod-php
COPY public/pokemon.html /usr/local/apache2/htdocs/
COPY public/phpinfo.php /usr/local/apache2/htdocs/
