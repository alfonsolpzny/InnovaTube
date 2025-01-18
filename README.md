# Proyecto Innova Tube

Proyecto para el puesto de desarrollador en grupo castores creado con Laravel.
## Requerimientos de software
1. PHP
Se puede instala con [XAMPP](https://www.apachefriends.org/es/index.html) como recomendación, se requiere PHP 8.2 en adelante para crear el sistema en Laravel 11.
2. Composer
Es necesario instalar [composer](https://getcomposer.org/download/) para poder obtener las dependencias del proyecto. 
3. Node.js con npm
Es necesario instalar [Node.js](https://nodejs.org/en/download/current) con npm para obtener las dependencias del proyecto.
4. Una vez instalado composer debe instalar Lavarel con el siguiente comando.
```
composer global require laravel/installer
```
## Preparar el entorno de desarrollo
Clonar el repositorio con el comando de `git clone`.

** En la carpeta de InnovaTube colocar los siguientes comando de consola.**

Para instalar las dependencias de composer (puede tardar unos minutos).
```
composer install
```
---
Crea una copia del archivo de variables de entorno (el original esta protegido por razones de seguridad). 
```
cp .env.example .env
``` 
En el archivo `.env`  se debe colocar la API key de youtube en la variable `YOUTUBE_API_KEY=<api key>` (no se incluyo por razones de seguridad) en caso de necesitarla puede contactarme.
___
Generar un llave de aplicación, sirve para encriptar contraseñas.
```
php artisan key:generate
```
---
Migración para generar la base de datos de los usuarios, otras tablas y campos
```
php artisan migrate
```
---
Para generar las dependencias de npm.
```
npm install
```

___
Para crear ciertos archivos de npm.
```
npm run build
```
## Iniciar el servidor
El servidor se puede iniciar mediante el comando `php artisan serve` y poder acceder mediante la url `http://127.0.0.1:8000/`.
___
Proyecto hecho con laravel.