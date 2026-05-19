FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nginx \
    supervisor \
    libpq-dev \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_pgsql pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy composer files first to leverage Docker cache
COPY composer.json composer.lock ./

# Install dependencies
# --no-dev: We don't need testing tools in production
# --optimize-autoloader: Speeds up loading
# --prefer-dist: Downloads zips instead of cloning git repos (faster)
RUN composer install --no-dev --optimize-autoloader --prefer-dist --no-scripts --no-interaction

# Now copy the rest of the application code
COPY . /var/www/html

# Generate Laravel keys and optimize (optional but recommended)
# RUN php artisan key:generate # Usually done via Env Var, but safe to skip if APP_KEY is set
# RUN php artisan config:cache
# RUN php artisan route:cache
# RUN php artisan view:cache

# Copy Nginx configuration
COPY ./nginx.conf /etc/nginx/sites-available/default

# Copy Supervisor configuration
COPY ./supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Ensure storage and bootstrap/cache are writable
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80
EXPOSE 80

# Start Nginx & PHP-FPM via Supervisor
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]