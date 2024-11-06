FROM php:8.2-cli
WORKDIR /app
COPY . .
RUN apt-get update && apt-get install -y git unzip
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');" \

# Install Xdebug
#RUN pecl install xdebug && docker-php-ext-enable xdebug

# Configure Xdebug
#COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini