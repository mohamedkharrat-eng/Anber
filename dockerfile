FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev libxml2-dev libonig-dev nginx \
    && docker-php-ext-install pdo pdo_mysql zip xml mbstring

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN echo 'server { \
    listen 8000; \
    root /app/public; \
    index index.php; \
    location / { try_files $uri $uri/ /index.php?$query_string; } \
    location ~ \.php$ { fastcgi_pass 127.0.0.1:9000; fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name; include fastcgi_params; } \
}' > /etc/nginx/sites-available/default

CMD php-fpm -D && php artisan config:clear && nginx -g "daemon off;"