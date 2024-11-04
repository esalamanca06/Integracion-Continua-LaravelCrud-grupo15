# Integracion-continua-LaravelCrud-grupo15
Bienvenidos al repositorio del grupo #15 de la materia Integración continua, En el repositorio encontrará el proyecto junto con su respectivo codigo fuente y la documentación perteneciente a la aplicación basada en docker y sus propiedades.

Integrantes: 
- Erick Alexander Salamanca Borda
- Martha Yaneth Mera Velasco
- Jesús David Mendivelso Lizarazo

Para tener acceso al repo siga este paso a paso:
- clone el repositorio en su terminal ingresando el siguiente comando .... : git clone https://github.com/esalamanca06/Integracion-Continua-LaravelCrud-grupo15.git
- navegas a tu repositorio en tu máquina local con cd/canela -> esto si no se tiene laragon instalado. Si tiene laragon se dirige al siguiente cd/www/canela
- dentro de la ruta canela se ingresa el siguiente comando: composer install -> esto para instalar las dependencias de PHP
- luego debe copiar el archivo .env.example y nombrarlo solo .env de la siguiente manera -> cp .env.example .env
- luego edite el archivo .env con las configuraciones para el entorno:
    -> DB_CONNECTION=mysql
    -> DB_HOST=localhost #127.0.0.1
    -> DB_PORT=3306
    -> DB_DATABASE=prueba
    -> DB_USERNAME=root # o el usuario que usted tenga en mysql
    -> DB_PASSWORD= # La contraseña que usted tiene asignada
- para configurar la base de datos y que funcione la aplicación debe crear la base de datos como prueba e ingresar el siguiente comando para migrar la tablas necesarias -> php artisan migrate
- si o si, instale las dependencias npm con el siguiente comando si desea implementar el front -> npm i ó npm install [[OPCIONAL]]
- para activar el front ingrese alguno de los siguientes comandos -> npm run dev ó npm run build [[OPCIONAL]]
- Para compilarl la aplicación que acabó de clonar ingrese alguno de los siguientes comandos -> php artisan serve ó php artisan serve --host localhost
