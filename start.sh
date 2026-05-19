#!/bin/bash

# Wait for the database to be ready (optional but good practice)
echo "Waiting for database connection..."
sleep 5

# Run migrations
echo "Running migrations..."
php artisan migrate --force

# Clear caches
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start Supervisor (which starts Nginx and PHP-FPM)
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf