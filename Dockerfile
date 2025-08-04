
FROM php:8.2-fpm

WORKDIR /var/www/

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip gnupg2 ca-certificates libonig-dev libxml2-dev libzip-dev

# Install Node.js from NodeSource (22.x as an example)
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - && \
    apt-get install -y nodejs

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring zip

# Copy Composer from official image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Composer Packagas
# RUN composer install  --no-interaction --prefer-dist --optimize-autoloader

# COPY . /var/www/
# RUN chown -R www-data:www-data /var/www

EXPOSE 9000

CMD ["php-fpm"]
