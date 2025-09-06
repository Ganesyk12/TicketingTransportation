# Gunakan image PHP FPM
FROM php:8.2-fpm-alpine

# Install dependensi yang dibutuhkan
RUN apk add --no-cache \
    git \
    curl \
    libpng-dev \
    libjpeg-turbo-dev \
    libzip-dev \
    oniguruma-dev \
    postgresql-dev \
    && docker-php-ext-install \
    gd \
    zip \
    mbstring \
    exif \
    opcache \
    pdo_pgsql \
    pgsql
    
# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy aplikasi
COPY . .

# Install dependensi PHP
RUN composer install --no-dev --optimize-autoloader

# Atur permissions
RUN chown -R www-data:www-data /var/www/html/storage \
    && chown -R www-data:www-data /var/www/html/bootstrap/cache

# Expose port
EXPOSE 8000