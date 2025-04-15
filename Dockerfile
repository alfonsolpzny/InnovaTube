FROM php:8.2-apache

# Instala dependencias del sistema
RUN apt-get update && apt-get install -y \
    git zip unzip libzip-dev libonig-dev libxml2-dev curl \
    && docker-php-ext-install pdo pdo_mysql zip

# Instala Node y dependencias JS (opcional)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && npm install && npm run build

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia archivos del proyecto
COPY . /var/www/html/

# Ajustes de permisos y directorio
WORKDIR /var/www/html

# Instala dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader \
    && chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Habilita Apache mod_rewrite
RUN a2enmod rewrite

# Configuración de Apache
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

#Configurar permisos y Apache
RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

#Exponer el puerto y levantar Apache
EXPOSE 80
CMD ["apache2-foreground"]

# Iniciar la migracion de la base de datos
RUN php artisan migrate --force




############################################################

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



