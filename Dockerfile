# Use the official PHP image with the Apache server
FROM php:8.2-fpm


# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# Clear out the lists to save space
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Get Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory
COPY . /var/www

# Install all PHP dependencies
RUN composer install 

# Change ownership of our applications
RUN chown -R www-data:www-data /var/www

# Expose port 8000 and start apache server
EXPOSE 8000
CMD ["apache2-foreground"]
