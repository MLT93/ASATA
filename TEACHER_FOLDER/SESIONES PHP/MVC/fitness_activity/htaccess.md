# ARCHIVO DE CONFIGURACIÓN `.htaccess` para APACHE

<!-- Habilita la reescritura -->
RewriteEngine On
<!-- Actualizamos la URL base (es el directorio raíz del servidor del proyecto) -->
RewriteBase /ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/
<!-- Condición para encontrar files (archivos). Si no lo encuentra, pasa a la siguiente línea -->
RewriteCond %{REQUEST_FILENAME} !-f
<!-- Condición para encontrar directories (carpetas). Si no lo encuentra, pasa a la siguiente línea -->
RewriteCond %{REQUEST_FILENAME} !-d
<!-- Si ningún Endpoint existe, me redirecciona a `index.php` y me guarda los Query Params `[QSA,L]` que haya puesto en el Endpoint equivocado. `index.php` al no tener esa ruta, cargará la página de error -->
RewriteRule ^(.*)$ index.php [QSA,L]
