FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev libxml2-dev libonig-dev \
    && docker-php-ext-install pdo pdo_mysql zip xml mbstring

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --no-dev --optimize-autoloader

EXPOSE 8000

CMD php artisan config:clear && php artisan serve --host=0.0.0.0 --port=8000