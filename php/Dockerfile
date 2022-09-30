FROM php:8.1-fpm-alpine

# Set working directory
WORKDIR /var/www/html

RUN apk update && apk add --no-cache oniguruma-dev libzip-dev \
    # Install MySQL extensions
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl \
    # Install PHP-Redis
    && apk add --no-cache pcre-dev $PHPIZE_DEPS \
        && pecl install redis \
        && docker-php-ext-enable redis.so

# Copy existing application directory contents with directory permissions
COPY --chown=www-data:www-data project /var/www/html

# Copy the startup script
COPY start.sh /usr/local/bin/start
RUN chmod u+x /usr/local/bin/start

# Add Docker custom crontab script
ADD laravel_scheduler /etc/cron.d/laravel_scheduler

# Specify crontab file for running
RUN crontab /etc/cron.d/laravel_scheduler

# Expose the webroot directory to NGINX container
VOLUME ["/var/www/html/public"]

# Expose port 9000 of the php-fpm server
EXPOSE 9000
CMD ["/usr/local/bin/start"]
