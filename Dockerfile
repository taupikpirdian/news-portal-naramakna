# syntax=docker/dockerfile:1.7

FROM node:22-bookworm-slim AS frontend

WORKDIR /build

COPY package.json ./

RUN --mount=type=cache,target=/root/.npm \
    npm install --no-audit --no-fund

COPY vite.config.js ./
COPY app ./app
COPY resources ./resources
COPY public ./public

RUN npm run build

FROM php:8.3-fpm

WORKDIR /var/www

# System dependencies and PHP extensions
RUN --mount=type=cache,target=/var/cache/apt,sharing=locked \
    --mount=type=cache,target=/var/lib/apt,sharing=locked \
    apt-get update && apt-get install -y --no-install-recommends \
    git \
    unzip \
    zip \
    libcurl4-openssl-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libicu-dev \
    && docker-php-ext-install -j"$(nproc)" curl pdo_mysql mbstring exif pcntl bcmath gd zip intl

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_CACHE_DIR=/tmp/composer-cache \
    COMPOSER_IPRESOLVE=4 \
    COMPOSER_MAX_PARALLEL_HTTP=4

# Copy Composer manifests first so dependency installation stays cached
COPY composer.json composer.lock ./

# Install vendor dependencies
RUN --mount=type=cache,target=/tmp/composer-cache \
    for attempt in 1 2 3; do \
        composer install \
            --no-dev \
            --prefer-dist \
            --optimize-autoloader \
            --no-interaction \
            --no-progress \
            --no-scripts && break; \
        if [ "$attempt" -eq 3 ]; then exit 1; fi; \
        echo "Composer install failed (attempt $attempt/3); retrying..."; \
        sleep $((attempt * 10)); \
    done

# Copy app source
COPY . .

COPY --from=frontend /build/public/build ./public/build

# Clear package cache and build assets
RUN rm -f bootstrap/cache/packages.php \
    && php artisan package:discover --ansi || true

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
