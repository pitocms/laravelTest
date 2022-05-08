FROM php:7.3-apache
COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer
RUN a2enmod rewrite
RUN apt-get update -y && apt-get install -y git libicu-dev unzip zip
RUN docker-php-ext-install pdo_mysql
WORKDIR /var/www/html
COPY . .
COPY apache.conf /etc/apache2/sites-available/000-default.conf
RUN composer i -n -o --prefer-dist
EXPOSE 80
