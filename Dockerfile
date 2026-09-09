# ==========================================
# Stage 1: Build frontend assets
# ==========================================
FROM node:22-bookworm AS frontend

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY resources ./resources
COPY vite.config.js ./
COPY public ./public

RUN npm run build


# ==========================================
# Stage 2: Laravel + FrankenPHP
# ==========================================
FROM dunglas/frankenphp:php8.3-bookworm

WORKDIR /app

# PHP extensions
RUN install-php-extensions \
    pdo_pgsql \
    mbstring \
    bcmath \
    opcache \
    zip

# Required for Render/FrankenPHP
RUN setcap -r /usr/local/bin/frankenphp

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Laravel application
COPY . .

# PHP dependencies
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction

# Copy compiled Vite assets
COPY --from=frontend /app/public/build ./public/build

# Laravel writable directories
RUN mkdir -p \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    bootstrap/cache

RUN chmod -R 775 storage bootstrap/cache

ENV SERVER_NAME=:80

CMD ["sh", "-c", "php artisan migrate --force && frankenphp run --config /etc/caddy/Caddyfile"]
