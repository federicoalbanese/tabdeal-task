FROM php:8.3-fpm-alpine

ARG UID
ARG GID
ENV UID=${UID}
ENV GID=${GID}
ENV PHPGROUP=mautic
ENV PHPUSER=mautic

WORKDIR /var/www/html

RUN echo "https://mirror.arvancloud.ir/alpine/v3.22/main" > /etc/apk/repositories && \
    echo "https://mirror.arvancloud.ir/alpine/v3.22/community" >> /etc/apk/repositories && \
    apk update \
 && apk add --no-cache \
    bash \
    git \
    curl \
    zip \
    unzip \
    icu-dev \
    libxml2-dev \
    libzip-dev \
    zlib-dev \
    pcre-dev \
    linux-headers \
    autoconf \
    gcc \
    g++ \
    make \
    libc-dev \
    imap-dev \
    krb5-dev \
    openssl-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev


RUN docker-php-ext-configure imap --with-kerberos --with-imap-ssl && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) pdo pdo_mysql intl soap pcntl zip opcache gd imap bcmath sockets

RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS && \
    mkdir -p /usr/src/php/ext/redis && \
    curl -L -o /tmp/redis.tar.gz https://github.com/phpredis/phpredis/archive/6.1.0.tar.gz && \
    tar -xzf /tmp/redis.tar.gz -C /usr/src/php/ext/redis --strip-components=1 && \
    docker-php-ext-configure redis && \
    docker-php-ext-install redis && \
    docker-php-ext-enable redis && \
    rm -rf /tmp/redis.tar.gz /usr/src/php/ext/redis && \
    apk del .build-deps

RUN docker-php-ext-install sysvmsg sysvsem sysvshm

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN addgroup -g ${GID} ${PHPGROUP} \
 && adduser -G ${PHPGROUP} -D -s /bin/sh -u ${UID} ${PHPUSER}

EXPOSE 9000

CMD ["php-fpm", "--nodaemonize"]