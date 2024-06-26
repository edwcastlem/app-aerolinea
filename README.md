<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# Proyecto aerolínea

## Instrucciones

 ### 1. Clonar el repositorio de git con el siguiente comando:

`git clone https://github.com/edwcastlem/app-aerolinea.git`

### 2. Ejecutar composer install y npm intall
 - Ubicarse en la carpeta del proyecto con:
    `cd app-aerolinea`
    
- Luego ejecutar:
    `composer install`

- Luego ejecutar:
    `npm install`

### 3. Correr el script de la bd
- Ubicar el script de la base de datos en la siguiente ruta: `database\aerolinea_25062024.sql`
- El script de la bd contiene la estructura de tablas necesarias por laravel más las tablas del proyecto y algunos datos insertados, debido a esto no se requiere el uso de migrations ni seeders por el momento.
- Se debe creaer la base de datos con el nombre "aerolinea" y asegurarse que el código se ejecute con esa bd activa.
- Se receomienda ejecutar el script desde phpmyadmin en la sección de importar.

### 4. Copiar el archivo .env
- Hacer una copia y renombrar el archivo `.env.example` a `.env` ubicado en la raiz del proyecto `app-aerolinea`.
- Dentro de este archivo cambiar los siguientes parametros:
```
APP_LOCALE=es
APP_FALLBACK_LOCALE=es
APP_FAKER_LOCALE=es_ES

...

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=aerolinea
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Generar un key para la aplicacion

- En el directorio de la aplicacion ejecutar lo siguiente:
    `php artisan key:generate`

### 6. Correr php artisan serve y npm run dev
- Abrir la terminal con `ctrl + ñ` y correr los siguientes comandos:
    `php artisan serve`
    
    `npm run dev`

- Cada comando debe estar en una terminal distinta y se qedan siempre abiertos mientras se ejecute la aplicacion.
- Para entrar en la aplicacion accedemos a la ruta que nos da el primer comando:
    `http://127.0.0.1:8000` o `http://localhost:8000`

### 7. Ver la parte administrativa
- Se puede usar estas credenciales de prueba:
Email `admin@admin.com`
Contraseña `12345678`