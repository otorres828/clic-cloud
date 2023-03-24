
# PRUEBA TECNICA  "CLIC CLOUD"🚗

_aplicacion web, basada en un sistema de "inventario de bodegas y productos"  con el fin de realizar la prueba tecnica de la compañia CLIC CLOUD_
## Construido con 🛠️
**Backend**
* [PHP 7.2.5](https://www.php.net/downloads.php)
* [Laravel ^7.0](https://laravel.com/docs/7.x)

## Comenzando 🚀

  _Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas._
  **El proyecto esta hecho en Laravel 7.x con Livewire**
   
### Pre-requisitos 📋
 
_Que cosas necesitas para instalar el software y como instalarlas_

  * [PHP 7.x.x](https://www.php.net/downloads.php) - lenguaje de programacion
  
_Es posible/recomendado instalar un paquete como "[XAMPP] o Laragon (https://www.apachefriends.org/es/index.html)" que ya incluye ambos elementos, Necesario PHP 7.^ y Apache 2.^_

  
  

* [Composer](https://getcomposer.org/) - Manejador de dependencias
* [Laravel 7.x](https://laravel.com/docs/7.x) - Framework web utilizado
* [Node.js](https://nodejs.org/es/) - Usado para generar algunas depencias con npm

### INICIO 🔧

1. Copiar el repositorio

```
$ git clone https://github.com/otorres828/clic-cloud.git
```
2. Instalar las dependencias de composer y npm
```
$ composer install
$ npm install
```
### BASE DE DATOS 🔧
3.  _descomenta el archivo **.env.example** y cambiale el nombre a **.env** y configura las variables de entorno con tu base de datos de preferencia "Postgresql o Mysql"_
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crud_livewire
DB_USERNAME=root
DB_PASSWORD=
```
4. Crear la base de datos **crud_livewire** y ejecuta en tu terminal:
```
$ php artisan migrate
```
5. Levanta el servidor de laravel
```
$ php artisan serve
```
### OPCIONAL
6. Una vez levantado el servidor, puedes ir a http://127.0.0.1:8000/registrarse y crear una cuenta.
7.  teniendo la cuenta creada, hacemos uso de factories para llenar la bdd nos dirigimos a tinker, ejecutamos en la terminal.
```
$ php artisan tinker
> factory(App\Models\Producto::class, 50)->create()
> factory(App\Models\Bodega::class, 30)->create()

```
## Autor ✒️
**Oliver Torres** https://wa.me/584249281245