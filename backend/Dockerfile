# Use official PHP image with Apache
FROM php:8.2-apache

# Install required system packages and PHP extensions
RUN apt-get update && apt-get install -y \
    git unzip zip libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring

# Enable Apache rewrite module
RUN a2enmod rewrite

# Set the ServerName directive to avoid warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Change DocumentRoot to Laravel public folder
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

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
