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

En el archivo `.env` se debe colocar la API key de youtube en la variable `YOUTUBE_API_KEY=<api key>` (no se incluyo por razones de seguridad) en caso de necesitarla puede contactarme.

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

### Posibles errores al ejecutar el código. 
Posiblemente salga este error al crear un usuario o ejecutar un programa.
```
GuzzleHttp\Exception\RequestException
cURL error 60: SSL certificate problem: unable to get local issuer certificate (see https://curl.haxx.se/libcurl/c/libcurl-errors.html) for https://www.googleapis.com/youtube/v3/search?
```


La solución consiste en descargar el archivo `cacert.pem` de [esta direccion](https://curl.haxx.se/ca/cacert.pem),  y agregarlo a la ruta `C:\xampp\php\extras\ssl\` o donde tenga instalado PHP, después en el archivo `php.ini` colocar la siguiente linea: `curl.cainfo = "C:\xampp\php\extras\ssl\cacert.pem"` donde coloco el archivo. Finalmente reinicie el servidor. [referencia](https://stackoverflow.com/questions/50345702/laravel-guzzle-curl-error-77-error-setting-certificate-verify-locations)
## Lista de tareas completadas
 #### Datos a considerar
 * Registro de usuarios ✅
* Nombre y Apellido ✅
* Nombre de usuario ✅
* Correo electrónico ✅
* Contraseña ✅
* Confirmación de contraseña ✅
* ReCaptcha (https://www.google.com/recaptcha/about/) ❌
#### Inicio de sesión
* Nombre de usuario o correo electrónico ✅
* Contraseña ✅
* Recuperado de contraseña ✅
#### Sección Principal
##### Navegación
* Nombre de usuario autenticado. ✅
* Opción para cerrar sesión ✅
##### Área de trabajo 
* Listado de videos con buscador ✅
* Opción para marcar video como favorito ✅
* Listado de favoritos con buscador ✅
* Opción para desmarcar video como favorito ✅

#### Sera un plus si aplicas lo siguiente:
* Uso de una biblioteca de componentes de interfaz de usuario. ✅
* Seguridad adicional (Encriptación de contraseñas, tokens, entre otros). ✅
* Diseño responsivo. ✅
* Uso de contenedores. ❌
* Monitoreo y Registro (Logging) ✅
* Características adicionales a las anteriormente descritas para el buscador de videos. ✅


Proyecto hecho con Laravel, Tailwind y Bootstrap 5.