FROM alpine:3.16

# Main packages

RUN apk --update add --no-cache \
	nginx \
	supervisor \
	curl \
	nodejs \
	npm

# PHP and your dependences

RUN apk --update add --no-cache \
	php81 \
	php81-ctype \
	php81-curl \
	php81-dom \
	php81-fpm \
	php81-json \
	php81-mbstring \
	# php81-pecl-mcrypt \
	php81-opcache \
	php81-openssl \
	php81-pdo \
	php81-pdo_pgsql \
	php81-phar \
	php81-session \
	php81-tokenizer \
	php81-xml \
	php81-xmlwriter \
	php81-zip \
	php81-fileinfo \
	php81-simplexml

# Create an symbolic to use php instead php8 and install composer

RUN ln -s /usr/bin/php81 /usr/bin/php

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# Copying the configs and the application to container

COPY docker/nginx/default.conf          /etc/nginx/conf.d/default.conf
COPY docker/nginx/default.conf          /etc/nginx/http.d/default.conf
COPY docker/supervisor/supervisord.conf /etc/supervisord.conf
COPY docker/php/www.conf                /etc/php81/php-fpm.d/www.conf
COPY .                                  /app

RUN mkdir -p /run/nginx

WORKDIR /app

# Init the Laravel basic configs and set the permissions

RUN composer install --no-dev \
	&& npm install --no-dev \
	&& npm run prod

RUN chown -R nginx:nginx . \
	&& chmod -R 777 /app

EXPOSE 80
CMD ["supervisord", "-c", "/etc/supervisord.conf"]
