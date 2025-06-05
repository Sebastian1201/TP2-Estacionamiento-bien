INSTRUCCIONES PARA VISUALIZAR Y EJECUTAR EL SISTEMA WEB
1. Requisitos previos
Antes de comenzar, se debe contar con los siguientes elementos instalados en el equipo:

Un servidor local como XAMPP, que incluye Apache (servidor web) y MySQL (gestor de base de datos).

Puede descargarse desde: https://www.apachefriends.org/es/index.html

Una vez instalado, se debe iniciar el panel de control de XAMPP y activar los módulos:

Apache

MySQL

2. Preparación del entorno de trabajo
Reunir todos los archivos recibidos en una única carpeta. Por ejemplo, se puede nombrar esta carpeta como inicio.

Copiar dicha carpeta en el siguiente directorio:

makefile

C:\xampp\htdocs\
Este paso coloca el proyecto en el entorno adecuado para ser ejecutado por el servidor local.

3. Creación de la base de datos
Ingresar en el navegador a:

arduino

http://localhost/phpmyadmin
Crear una base de datos con el mismo nombre que aparece en el archivo config.php del proyecto.

Por ejemplo, si dentro de config.php figura:

php

$conexion = mysqli_connect("localhost", "root", "", "usuarios");
entonces se debe crear una base de datos llamada usuarios.

Si se proporciona un archivo .sql, se debe importar desde la pestaña Importar de phpMyAdmin. En caso de no tenerlo, las tablas deberán crearse manualmente.

4. Acceso al sistema
Una vez copiados los archivos y creada la base de datos, se puede acceder al sistema abriendo un navegador web y escribiendo la siguiente URL:

arduino

http://localhost/inicio/
o bien:

arduino

http://localhost/inicio/index.php
5. Configuración del inicio de sesión con Google (Login Básico Google)
El proyecto incluye un módulo para autenticación mediante cuenta de Google. Para que este funcione correctamente, se debe realizar lo siguiente:

5.1 Generar credenciales en Google API Console
Acceder al sitio: https://console.developers.google.com/

Crear un nuevo proyecto o seleccionar uno existente.

Configurar el consentimiento del usuario. Se recomienda seleccionar:

Tipo de usuario: Externo

Permisos solicitados: email, profile

Ir a la sección Credenciales y crear un nuevo OAuth Client ID:

Tipo de aplicación: Aplicación web

URI de redirección autorizada: debe coincidir con la ubicación del archivo index.php, por ejemplo:

arduino

http://localhost/inicio/index.php
Una vez creada la credencial, se obtendrán dos datos importantes:

Client ID

Client Secret

5.2 Reemplazar las credenciales en el código
Buscar el siguiente bloque en el archivo que maneja la autenticación:

php

$google_client->setClientId('727283115644-7a620c038j7k3sv8hd57rrpkhpvulee8.apps.googleusercontent.com');
$google_client->setClientSecret('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');
$google_client->setRedirectUri('http://localhost/index.php');
Reemplazarlo con los valores obtenidos desde la consola de Google. Por ejemplo:

php

$google_client->setClientId('SU_CLIENT_ID');
$google_client->setClientSecret('SU_CLIENT_SECRET');
$google_client->setRedirectUri('http://localhost/inicio/index.php');
Es fundamental que la URL del Redirect URI coincida exactamente con la registrada en Google Cloud, incluyendo el nombre correcto de la carpeta del proyecto.

6. Instalación de dependencias con Composer (para el login de Google)
Este proyecto requiere el uso de Composer, una herramienta de gestión de dependencias para PHP.

6.1 Instalar Composer
Descargar e instalar Composer desde: https://getcomposer.org/download/

6.2 Instalar el cliente de Google API
Abrir una terminal (símbolo del sistema) como administrador.

Navegar hasta la carpeta del proyecto. Por ejemplo:

bash

cd C:\xampp\htdocs\inicio
Ejecutar el siguiente comando:

bash

composer require google/apiclient:"^2.12.1"
Este proceso puede tardar algunos minutos según la velocidad de la conexión a Internet.

7. Verificación final
Una vez realizados todos los pasos:

Todos los archivos deben estar dentro de la carpeta inicio ubicada en htdocs.

La base de datos debe estar creada correctamente.

Las credenciales de Google deben estar actualizadas en el código.

Las dependencias deben haberse instalado mediante Composer.

Acceda nuevamente desde el navegador a:

arduino

http://localhost/inicio/index.php
El sistema debería estar funcionando correctamente. Ante cualquier mensaje de error, revisar el archivo config.php, las rutas, y la configuración del entorno.
