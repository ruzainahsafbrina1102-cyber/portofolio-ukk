
FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev \
    libxml2-dev libicu-dev libpq-dev \
    nodejs npm \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql \
       mbstring bcmath exif gd intl opcache zip \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction

RUN npm ci && npm run build

RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80
