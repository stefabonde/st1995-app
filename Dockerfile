FROM php:7.4-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libicu-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    wkhtmltopdf \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql intl zip gd \
    && docker-php-ext-enable opcache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Increase PHP upload limits and memory limit
RUN echo "upload_max_filesize = 64M" > /usr/local/etc/php/conf.d/custom.ini \
    && echo "post_max_size = 64M" >> /usr/local/etc/php/conf.d/custom.ini \
    && echo "memory_limit = 512M" >> /usr/local/etc/php/conf.d/custom.ini

# Copy virtual host config
COPY vhost.conf /etc/apache2/sites-available/000-default.conf

# Set working directory
WORKDIR /var/www/html

# Install Composer
COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

# Copy application files
COPY . /var/www/html/

# Create var directories if they don't exist and set permissions
RUN mkdir -p var/cache var/logs var/sessions web/uploads \
    && chown -R www-data:www-data var web/uploads \
    && chmod -R 777 var

# Install application dependencies
RUN composer install --no-scripts --no-interaction --optimize-autoloader

EXPOSE 80

CMD ["apache2-foreground"]
