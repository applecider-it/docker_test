FROM php:8.3-fpm

# 必要な拡張（最低限）
RUN docker-php-ext-install pdo pdo_mysql

# Git / unzip / curl / bash を追加
RUN apt-get update && apt-get install -y \
        git \
        unzip \
        bash \
        curl \
    && rm -rf /var/lib/apt/lists/*

# Composer インストール
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

WORKDIR /var/www/html
