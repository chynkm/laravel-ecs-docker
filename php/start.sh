#!/bin/sh

env=${APP_ENV:-production}

if [ "$env" != "local" ]; then
    (cd /var/www/html && php artisan config:cache && php artisan route:cache && php artisan view:cache)
fi

role=${CONTAINER_ROLE:-app}

if [ "$role" = "app" ]; then
    exec /usr/local/sbin/php-fpm
elif [ "$role" = "scheduler" ]; then
    exec /usr/sbin/crond -f -l 8
elif [ "$role" = "worker" ]; then
    exec /usr/local/bin/php /var/www/html/artisan queue:work redis --no-interaction --sleep=3 --tries=3
else
    echo "Could not match the container role \"$role\""
    exit 1
fi
