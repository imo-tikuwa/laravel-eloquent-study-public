FROM composer:2 as composer

FROM php:8.1-fpm-buster
SHELL ["/bin/bash", "-oeux", "pipefail", "-c"]

ARG UID=1000
ARG GID=1000
ENV TZ=Asia/Tokyo \
    COMPOSER_HOME=/composer
RUN groupmod -o -g ${GID} www-data && \
    usermod -o -u ${UID} -g www-data www-data && \
    chown -R www-data: /var/www && \
    echo "${TZ}" > /etc/timezone && \
    dpkg-reconfigure -f noninteractive tzdata

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/laravel

RUN curl -sL https://deb.nodesource.com/setup_14.x | bash - && \
    apt-get update && \
    apt-get -y --no-install-recommends install git \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    unzip \
    libpq-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    locales \
    nodejs && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* && \
    sed -i -E 's/# (ja_JP.UTF-8)/\1/' /etc/locale.gen && \
    locale-gen ja_JP.UTF-8 && \
    update-locale LANG=ja_JP.UTF-8 && \
    mkdir /var/run/php-fpm && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install intl mbstring zip pdo_pgsql gd fileinfo opcache && \
    { \
        echo "alias ll='ls -l --color=auto'"; \
    } >> /root/.bashrc && \
    mkdir ${COMPOSER_HOME} && \
    chown -R www-data: ${COMPOSER_HOME}

COPY ./php-fpm.d/zzz-www.conf /usr/local/etc/php-fpm.d/zzz-www.conf
COPY ./php.ini /usr/local/etc/php/php.ini