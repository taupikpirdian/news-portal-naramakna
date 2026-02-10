FROM php:8.3-fpm

WORKDIR /var/www

# System deps & Node.js
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    zip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libicu-dev \
    nodejs \
    npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy composer & package files FIRST
COPY composer.json composer.lock package.json ./

# Install vendor dependencies
RUN composer install \
    --optimize-autoloader \
    --no-interaction \
    --no-scripts

# Install npm dependencies
RUN npm install

# Copy app source
COPY . .

# Clean esbuild completely and reinstall to fix version mismatch
RUN rm -rf node_modules/esbuild node_modules/.cache \
    && npm install --force \
    && npm cache clean --force

# Clear package cache and build assets
RUN rm -f bootstrap/cache/packages.php \
    && php artisan package:discover --ansi || true

# Build frontend assets
RUN npm run build

# Permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]