# Base PHP 7.4 con il backport ufficiale CVE-2026-109618/109619 (php/php-src PHP-7.4-CVE-2026-109618-109619).
# Immagine locale costruita sul server da infra/php74-patched (build.sh): se manca, `docker build` fallisce.
FROM php74-patched:712e60f9

# Install system dependencies
# Debian 11 (bullseye) e' EOL: i repo sono passati ad archive.debian.org (deb.debian.org dava 404 sui .deb)
RUN sed -i -e 's|deb.debian.org/debian-security|archive.debian.org/debian-security|' -e 's|deb.debian.org/debian|archive.debian.org/debian|' -e '/bullseye-updates/d' /etc/apt/sources.list \
    && echo 'Acquire::Check-Valid-Until "false";' > /etc/apt/apt.conf.d/99archive

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

# Increase PHP upload limits and memory limit.
# upload_progress off: mitigazione CVE-2026-115560 (richiesta CSIRT/CISO) fino alla prossima release PHP.
RUN echo "upload_max_filesize = 64M" > /usr/local/etc/php/conf.d/custom.ini \
    && echo "post_max_size = 64M" >> /usr/local/etc/php/conf.d/custom.ini \
    && echo "memory_limit = 512M" >> /usr/local/etc/php/conf.d/custom.ini \
    && echo "session.upload_progress.enabled = 0" >> /usr/local/etc/php/conf.d/custom.ini

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
