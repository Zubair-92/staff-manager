FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip nginx libpq-dev

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && apt-get install -y nodejs

RUN docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . .

RUN composer install --no-dev --optimize-autoloader
RUN npm install --legacy-peer-deps && npm run build

COPY ./docker/nginx.conf /etc/nginx/sites-available/default
RUN ln -sf /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

# --- THE FIX: Create SQLite file and set permissions ---
RUN touch /var/www/database/database.sqlite
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache /var/www/database /var/www/public
RUN chmod -R 775 /var/www/storage /var/www/database

EXPOSE 80

CMD php artisan migrate --force && service nginx start && php-fpm
