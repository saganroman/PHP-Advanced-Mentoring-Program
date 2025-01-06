FROM php:8.2-fpm

WORKDIR /var/www/html
RUN apt-get update && apt-get install -y libc-client-dev libkrb5-dev && rm -r /var/lib/apt/lists/*
RUN docker-php-ext-configure imap --with-kerberos --with-imap-ssl && docker-php-ext-install imap

RUN apt update && apt install -y libicu-dev && rm -rf /var/lib/apt/lists/*
RUN apt update && apt-get install -y zlib1g-dev
RUN apt-get update && apt-get install -y libpng-dev

# Install any needed extensions
RUN apt-get install -y \
        libzip-dev \
        zip \
  && docker-php-ext-install zip
RUN docker-php-ext-install pdo pdo_mysql gd pcntl intl


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt-get update && apt-get install -y unzip libxslt1-dev
RUN docker-php-ext-install pdo_mysql exif xsl
RUN curl -sL https://deb.nodesource.com/setup_15.x | bash -
#RUN apt-get install -y nodejs
#RUN apt-get install -y git

RUN pecl install xdebug-3.3.1 && docker-php-ext-enable xdebug \
        && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
        && echo "xdebug.mode=debug,develop" >> /usr/local/etc/php/conf.d/xdebug.ini \
        && echo "xdebug.remote_handler=dbgp" >> /usr/local/etc/php/conf.d/xdebug.ini \
        && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/xdebug.ini \
        && echo "xdebug.discover_client_host=0" >> /usr/local/etc/php/conf.d/xdebug.ini \
        && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/xdebug.ini \
        && echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/xdebug.ini \
        && echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/xdebug.ini \
;

