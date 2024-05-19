# Use the official PHP image with the Apache server
FROM php:8.2-apache

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libicu-dev \
    libzip-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd intl zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Verify installed extensions
RUN php -m

# Check the php.ini files
RUN php --ini

# Get Composer
COPY --from=composer:2.4 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Install all PHP dependencies
RUN composer install --no-interaction --optimize-autoloader --no-dev --ignore-platform-req=ext-intl --ignore-platform-req=ext-zip

# Change ownership of our applications
RUN chown -R www-data:www-data /var/www

# Expose port 8000 and start apache server
EXPOSE 8000
CMD ["apache2-foreground"]
