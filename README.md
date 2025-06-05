INSTRUCCIONES PARA VISUALIZAR Y EJECUTAR EL SISTEMA WEB
1. Requisitos previos
Antes de comenzar, asegúrese de tener instalado:

XAMPP (servidor local con Apache y MySQL):
Descargable desde: https://www.apachefriends.org/es/index.html

Después de instalar:

Iniciar el Panel de control de XAMPP.

Activar los servicios Apache y MySQL.

2. Ubicación de los archivos del proyecto
Reunir todos los archivos recibidos (PHP, CSS, imágenes, carpetas internas, etc.) en una única carpeta. Puede nombrarla, por ejemplo, inicio.

Copiar dicha carpeta en:

makefile

C:\xampp\htdocs\
3. Crear la base de datos
Este proyecto utiliza una base de datos llamada registro. Se debe importar el archivo registro (1) 1.sql proporcionado.

Pasos:
Ingresar a http://localhost/phpmyadmin

Hacer clic en "Nueva" para crear una base de datos con el nombre:

nginx

registro
Ingresar a la base de datos recién creada.

Seleccionar la pestaña "Importar".

Subir y ejecutar el archivo:
registro (1) 1.sql

Esto creará las tablas necesarias: datos, registro2, registronuevo, usuarios, y vehiculos, además de cargar registros de ejemplo.

4. Acceder al sistema
Una vez que los archivos estén copiados y la base de datos importada, ingresar en el navegador a:

arduino

http://localhost/inicio/
o

arduino

http://localhost/inicio/index.php
5. Configuración del inicio de sesión con Google
Este sistema permite autenticación mediante cuenta de Google. A continuación, se detalla cómo configurarla correctamente.

5.1 Generar credenciales en Google API Console
Acceder a:
https://console.developers.google.com/

Crear un proyecto nuevo o usar uno existente.

Configurar la pantalla de consentimiento del usuario:

Tipo de usuario: Externo

Permisos solicitados: email, profile

Crear una credencial del tipo OAuth 2.0 Client ID:

Tipo de aplicación: Aplicación web

URI de redirección autorizada (según este proyecto):

arduino

http://localhost/inicio/index.php
5.2 Reemplazar valores en el código
En el archivo que contiene la configuración del cliente de Google (por ejemplo, index.php o dentro de Login-Google-main/), buscar y reemplazar el siguiente bloque:

php

$google_client->setClientId('727283115644-7a620c038j7k3sv8hd57rrpkhpvulee8.apps.googleusercontent.com');
$google_client->setClientSecret('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');
$google_client->setRedirectUri('http://localhost/index.php');
por los valores generados en su cuenta de Google Cloud:

php

$google_client->setClientId('SU_CLIENT_ID');
$google_client->setClientSecret('SU_CLIENT_SECRET');
$google_client->setRedirectUri('http://localhost/inicio/index.php');
Asegúrese de que la URL de redirección coincida exactamente con la configurada en Google.

6. Instalación de dependencias con Composer (requerido para el login de Google)
Este sistema depende de la biblioteca oficial de Google API para funcionar correctamente. Para ello se necesita Composer.

6.1 Instalar Composer
Descargar e instalar desde:
https://getcomposer.org/download/

6.2 Instalar el cliente de Google API en el proyecto
Abrir una terminal (símbolo del sistema) como administrador.

Posicionarse dentro de la carpeta del proyecto:

bash

cd C:\xampp\htdocs\inicio
Ejecutar el siguiente comando:

bash

composer require google/apiclient:"^2.12.1"
Este comando descargará las dependencias necesarias para realizar la autenticación con Google. Puede tardar algunos minutos dependiendo de la conexión.

7. Verificación final
Una vez realizados todos los pasos anteriores:

La carpeta inicio debe estar dentro de htdocs.

La base de datos registro debe estar creada e importada correctamente.

El archivo config.php debe hacer referencia a esa base de datos.

Las credenciales de Google deben estar correctamente reemplazadas.

Composer debe haber instalado las dependencias necesarias.

Finalmente, ingresar en el navegador a:

arduino

http://localhost/inicio/index.php
Si todo fue configurado correctamente, el sistema estará funcionando.
