FROM php:7.4-fpm

USER root

WORKDIR /

# Install dependencies
RUN apt-get update \
	# gd
	&& apt-get install -y --no-install-recommends build-essential  openssl nginx libfreetype6-dev libjpeg-dev libpng-dev libwebp-dev zlib1g-dev libzip-dev gcc g++ make vim unzip curl git jpegoptim optipng pngquant gifsicle locales libonig-dev nodejs npm \
	&& docker-php-ext-configure gd  \
	&& docker-php-ext-install gd \
	# gmp
	&& apt-get install -y --no-install-recommends libgmp-dev \
	&& docker-php-ext-install gmp \
	# pdo_mysql
	&& docker-php-ext-install pdo_mysql mbstring \
	# pdo
	&& docker-php-ext-install pdo \
	# opcache
	&& docker-php-ext-enable opcache \
	# zip
	&& docker-php-ext-install zip \
	&& apt-get autoclean -y \
	&& rm -rf /var/lib/apt/lists/* \
	&& rm -rf /tmp/pear/

RUN apt-get update \
    && apt-get install -y wget gpg apt-utils \
    # composer
    && curl -sS https://getcomposer.org/installer -o composer-setup.php \
    && HASH="$(wget -q -O - https://composer.github.io/installer.sig)" \
    && php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    # Yarn
    && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
    && echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list \
    && apt-get update \
    && apt-get install yarn \
    && apt-get install --no-install-recommends yarn

RUN apt-get update && apt-get install --no-install-recommends --assume-yes xfonts-75dpi fontconfig libjpeg62-turbo-dev libx11-6 libxcb1 libxext6 libxrender1 xfonts-base libpng-dev libjpeg-dev wget


RUN apt-get install -y default-mysql-client

COPY ./ /var/www/html/

WORKDIR /var/www/html

RUN cp .env .env.local && ls -a && cat .env.local

RUN echo 'DATABASE_URL="mysql://root:rootroot@db:3306/crook?serverVersion=5.7"' >> .env.local && cat .env.local

RUN composer install

RUN yarn install

RUN npm rebuild node-sass

RUN yarn encore dev

WORKDIR /

# Copy files
COPY ./docker/local.ini /usr/local/etc/php/conf.d/local.ini

COPY ./docker/conf.d/nginx.conf /etc/nginx/nginx.conf

RUN chmod 600 /var/www/html/traefik/acme.json

EXPOSE 8080
RUN nginx -t

COPY ./docker/script/post_deploy.sh /post_deploy.sh
RUN ["chmod", "+x", "post_deploy.sh"]

CMD [ "sh", "./post_deploy.sh" ]
