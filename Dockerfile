FROM newdeveloper/apache-php-composer:latest

MAINTAINER Wilker <sistemaswlk@gmail.com>

RUN apt-get update && apt-get upgrade -y \
    && curl -sL https://deb.nodesource.com/setup_14.x | bash - \
    && apt install nodejs && apt install -y build-essential gcc make libpng-dev

WORKDIR /var/www/html/laravel-docker-desafio-tecnico-problem/
COPY . /var/www/html/laravel-docker-desafio-tecnico-problem/
ADD docker/apache2/000-default.conf /etc/apache2/sites-available/000-default.conf
ADD docker/config/package.json /var/www/html/laravel-docker-desafio-tecnico-problem/package.json
ADD docker/config/apache2/php.ini /etc/php/7.4/apache2/php.ini
ADD docker/config/apache2/php.ini /etc/php/7.4/php/php.ini


