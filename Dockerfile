# Use an official PHP image as base
FROM php:8.3-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy composer.lock and composer.json
COPY composer.lock composer.json ./

# Install PHP extensions and other dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libexif-dev \
    && docker-php-ext-install pdo pdo_mysql exif

# Add a non-root user
RUN useradd -ms /bin/bash laravel
USER laravel

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/home/laravel --filename=composer

# Install PHP dependencies
RUN /home/laravel/composer install --no-plugins --no-scripts

# Copy the rest of the application code
COPY . .

# Set permissions
USER root

RUN chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
