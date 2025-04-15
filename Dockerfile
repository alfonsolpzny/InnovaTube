# 1. Imagen base con PHP + Apache
FROM php:8.2-apache

# 2. Habilitar extensiones necesarias
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# 3. Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Instalar Node.js y npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# 5. Copiar archivos del proyecto
COPY . /var/www/html

# 6. Establecer directorio de trabajo
WORKDIR /var/www/html

# 7. Instalar dependencias PHP y JS
RUN composer install --no-dev --optimize-autoloader \
    && npm install && npm run build

# 8. Configurar permisos y Apache
RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

# 9. Exponer el puerto y levantar Apache
EXPOSE 80
CMD ["apache2-foreground"]

# Iniciar la migracion de la base de datos
RUN php artisan migrate --force
