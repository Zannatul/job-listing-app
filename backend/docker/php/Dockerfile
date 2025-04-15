# Use the official PHP image
FROM php:8.2-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Copy composer.json early for layer caching
COPY composer.json /var/www/html/

# Install system dependencies
RUN apk update && apk add --no-cache \
    build-base shadow vim curl \
    freetype-dev git libjpeg-turbo-dev libzip-dev openssh-client postgresql-dev \
    libpng-dev nodejs npm

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql pdo_pgsql opcache

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Clean APK cache
RUN rm -rf /var/cache/apk/*

# Set www-data user UID to 1000
RUN usermod -u 1000 www-data

# Copy project files
COPY --chown=www-data:www-data . /var/www/html
COPY docker/php/php.ini /usr/local/etc/php/

# Install node packages (Laravel Mix dependencies)
RUN npm install

# Change to non-root user
USER www-data

# Expose PHP-FPM port
EXPOSE 9000

# Start both php-fpm and npm run dev
CMD sh -c "npm run dev & php-fpm"
