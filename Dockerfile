FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd

RUN useradd ctfplayer --password J822yl8#KvR09c%wYWxfb$9Ti

COPY ./php.ini /etc/php/8.1/apache2/php.ini

USER ctfplayer

RUN service apache2 restart 









