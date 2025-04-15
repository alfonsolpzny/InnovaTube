FROM php:8.2-apache

# Instala dependencias del sistema
RUN apt-get update && apt-get install -y \
    git zip unzip libzip-dev libonig-dev libxml2-dev curl \
    && docker-php-ext-install pdo pdo_mysql zip

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Iniciar la migracion de la base de datos
RUN php artisan migrate --force

# Copia archivos del proyecto
COPY . /var/www/html/

# Ajustes de permisos y directorio
WORKDIR /var/www/html

# Instala dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader \
    && chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Instala Node y dependencias JS (opcional)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && npm install && npm run build

# Habilita Apache mod_rewrite
RUN a2enmod rewrite

# Configuración de Apache
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

