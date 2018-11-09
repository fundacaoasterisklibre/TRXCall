FROM php:7.1-fpm

LABEL maintainer = "Victor Muniz <victorcmuniz@gmail.com>"

RUN apt-get update \
	&& apt-get install -y \
		wget \
		curl \
		git \
		moreutils \
		dnsutils \
		zlib1g-dev \
		libicu-dev \
		libmemcached-dev \
		g++ \
    && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version
RUN docker-php-ext-configure intl
RUN docker-php-ext-install opcache intl
RUN apt-get update \
    && apt-get install -y \
        postgresql-server-dev-9.4 \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo_pgsql \
    && apt-get remove -y \
        postgresql-server-dev-9.4 \
    && apt-get install -y \
        libpq5 \
    && apt-get autoremove -y
# install xdebug
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug \
    && echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "display_startup_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_enable = 1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_connect_back = 1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.idekey = \"XDEBUG\"" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_port = 9001" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN usermod -u 1000 www-data

CMD php-fpm -F