# Use official PHP image with Apache
FROM php:8.2-apache

# Install required system packages and PHP extensions
RUN apt-get update && apt-get install -y \
    git unzip zip libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring

# Enable Apache rewrite module
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy Laravel app files to the container
COPY . .

# Copy Composer from the official Composer image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Ensure necessary folders exist and set correct permissions
RUN mkdir -p storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

# Install Composer dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Set environment variable
ENV APP_ENV=production

# Expose port 80 (optional, but good practice)
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
