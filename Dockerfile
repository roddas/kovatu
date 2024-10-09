# Use the official PHP image
FROM php:8.3.12-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    git && docker-php-ext-configure gd --with-freetype --with-jpeg\ 
    && docker-php-ext-install gd zip pdo pdo_mysql

# Set the working directory
WORKDIR /var/www

# Copy the application files
COPY . .

# Copy the config script
COPY docker-config.sh /usr/local/bin/docker-config.sh

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Expose the port
EXPOSE 9000

CMD ["/usr/local/bin/docker-config.sh"]
