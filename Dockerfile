FROM php:8.0-fpm

ENV COMPOSER_ALLOW_SUPERUSER=1

# Install system dependencies and tools required for extensions
RUN apt-get update && apt-get install -y \
    curl \
    git \
    zip \
    vim \
    unzip \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

# Copy composer.json first and install dependencies
COPY composer.json /var/www/
RUN composer install --no-interaction --prefer-dist --no-dev --no-scripts --no-progress --no-suggest --verbose

# Copy application files
COPY . .

# Ensure correct permissions
RUN chown -R www-data:www-data /var/www

# Install PHP dependencies via Composer
RUN composer install --no-interaction

EXPOSE 9000

RUN ls -la /var/www