FROM php:8.5
RUN apt-get update \
    && apt-get install -y libonig-dev libzip-dev unzip \
    && docker-php-ext-install pdo_mysql mbstring zip \
    && rm -rf /var/lib/apt/lists/*
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"
WORKDIR /var/www/html
COPY composer.json composer.lock ./
RUN composer install --no-scripts
COPY . .