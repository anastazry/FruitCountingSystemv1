FROM php:8.2-cli

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    nodejs \
    npm \
    && docker-php-ext-install zip pdo pdo_mysql gd

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Install frontend dependencies and build assets
RUN npm install && npm run build

# Laravel optimization
RUN php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear

EXPOSE 8080

CMD php artisan migrate --force && php artisan db:seed --class=UserSeeder --force && php artisan storage:link && php artisan serve --host=0.0.0.0 --port=${PORT:-8080}