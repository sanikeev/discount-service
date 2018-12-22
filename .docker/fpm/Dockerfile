FROM php:7.2-fpm

RUN apt-get update \
    && apt-get -y install \
            libicu-dev \
            libfreetype6-dev \
            libjpeg62-turbo-dev \
            libpng-dev \
            git \
            zlib1g-dev \
        --no-install-recommends \
    && docker-php-ext-install -j$(nproc) intl \
    && docker-php-ext-install -j$(nproc) bcmath \
    && docker-php-ext-install -j$(nproc) pdo pdo_mysql \
    && docker-php-ext-install mbstring bcmath \
    && docker-php-ext-install -j$(nproc) opcache \
    && pecl install apcu-5.1.8 && docker-php-ext-enable apcu \
    && docker-php-ext-install -j$(nproc) zip \
    && docker-php-ext-configure gd \
                --with-gd \
                --with-freetype-dir=/usr \
                --with-png-dir=/usr \
                --with-jpeg-dir=/usr \
        && docker-php-ext-install -j$(nproc) gd \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && apt-get purge -y \
        icu-devtools \
    && apt-get autoremove -y \
    && rm -r /var/lib/apt/lists/*

# Install composer
COPY install-composer /install-composer
RUN chmod +x /install-composer && /install-composer && rm /install-composer && composer self-update && composer clear-cache \
	&& composer global require "fxp/composer-asset-plugin:^1.3.1"

