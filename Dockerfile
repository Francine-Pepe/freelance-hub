# Stage 1: Build frontend assets
FROM node:22-bookworm AS frontend

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY resources ./resources
COPY vite.config.js ./
COPY public ./public

RUN npm run build


# Stage 2: Laravel + FrankenPHP
FROM dunglas/frankenphp:php8.3-bookworm

WORKDIR /app

RUN install-php-extensions \
    pdo_sqlite \
    mbstring \
    bcmath \
    opcache \
    zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction

# Copy compiled Vite assets from frontend stage
COPY --from=frontend /app/public/build ./public/build

RUN mkdir -p \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    bootstrap/cache

RUN chmod -R 775 storage bootstrap/cache

CMD ["sh", "-c", "frankenphp php-server -r public/ --listen :${PORT:-80}"]
