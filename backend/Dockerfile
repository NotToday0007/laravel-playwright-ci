# Use the official PHP image with Apache
FROM php:8.2-apache

# Install required PHP extensions and tools
RUN apt-get update && apt-get install -y \
    git unzip zip libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Enable Apache rewrite module
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy everything from your Laravel app
COPY . .

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set correct permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Install dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Set environment
ENV APP_ENV=production

# Run Apache
CMD ["apache2-foreground"]
