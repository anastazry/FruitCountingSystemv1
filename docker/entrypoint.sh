#!/bin/sh
set -eu
cd /var/www/html
: "${APP_KEY:?Set a permanent Laravel APP_KEY in Render environment settings}"
: "${DB_URL:?Set the Neon PostgreSQL connection URL in Render environment settings}"
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force
php artisan storage:link --force
chown -R www-data:www-data storage bootstrap/cache
sed -i "s/^Listen 80$/Listen ${PORT:-8080}/" /etc/apache2/ports.conf
sed -i "s/\*:8080/*:${PORT:-8080}/" /etc/apache2/sites-available/000-default.conf
exec "$@"
