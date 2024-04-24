FROM php:8.3-apache

# Copy the application files
COPY . /var/www/html/

# Set the working directory
WORKDIR /var/www/html

# Enable Apache rewrite module
RUN a2enmod rewrite

# Install dependencies
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libmariadb-dev \
    unzip \
    zip \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd gettext intl pdo_mysql

# Install Composer
COPY --from=composer:2.7.4 /usr/bin/composer /usr/bin/composer
