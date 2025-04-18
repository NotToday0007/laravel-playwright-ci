FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    git unzip zip libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring tokenizer

# Enable Apache rewrite module
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy Laravel project files
COPY . .

# Copy Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set file permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Clear and install Composer dependencies
RUN composer clear-cache && composer install --no-interaction --prefer-dist --optimize-autoloader

# Set environment
ENV APP_ENV=production

# Start Apache
CMD ["apache2-foreground"]
