# Stage 1: Composer
FROM composer:latest AS composer

# Stage 2: PHP with Laravel
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install pdo pdo_mysql mbstring bcmath gd

# Set working directory to Laravel project
WORKDIR /var/www/html

# Copy only the backend folder (Laravel app) into container
COPY ./backend/ ./

# Copy Composer from the build stage
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Install Laravel dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Set permissions for Laravel folders
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose Laravel port
EXPOSE 8000

# Start Laravel development server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
