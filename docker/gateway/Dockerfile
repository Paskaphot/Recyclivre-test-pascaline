FROM php:8.1-fpm

# install missing php dependencies
RUN apt-get update && apt-get install -y --no-install-recommends \
        libzip-dev zip unzip zlib1g-dev \
        libicu-dev \
    && docker-php-ext-install \
        zip \
        intl \
    && docker-php-ext-enable \
        opcache \
    && apt-get clean

# copy php ini configuration
COPY ./docker/gateway/php/conf.d/php.ini /usr/local/etc/php/conf.d/docker-php.ini

# install composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && chmod a+x /usr/local/bin/composer

# install symfony binary
RUN curl -sS https://get.symfony.com/cli/installer | bash \
    && mv $HOME/.symfony5/bin/symfony /usr/local/bin/symfony \
    && chmod a+x /usr/local/bin/symfony

# install php cs fixer
RUN curl -L https://cs.symfony.com/download/php-cs-fixer-v3.phar -o php-cs-fixer \
    && mv php-cs-fixer /usr/local/bin/php-cs-fixer \
    && chmod a+x /usr/local/bin/php-cs-fixer

# install git
RUN apt-get update && apt-get install -y --no-install-recommends git && apt-get clean

# install node
RUN apt-get update && apt-get install -y --no-install-recommends ca-certificates gnupg && apt-get clean \
    && mkdir -p /etc/apt/keyrings \
    && curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg \
    && echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_20.x nodistro main" | tee /etc/apt/sources.list.d/nodesource.list \
    && apt-get update && apt-get install -y --no-install-recommends nodejs && apt-get clean \
    && npm install -g yarn

# set working directory
WORKDIR /www