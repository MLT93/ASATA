# ARCHIVO DE CONFIGURACIÓN `.htaccess` para APACHE

<!-- Habilita la reescritura -->
RewriteEngine On
<!-- Actualizamos la URL base -->
RewriteBase /ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/
<!-- Condición para encontrar files (archivos) -->
RewriteCond %{REQUEST_FILENAME} !-f
<!-- Condición para encontrar directories (carpetas) -->
RewriteCond %{REQUEST_FILENAME} !-d
<!-- Si ningún Endpoint existe, me redirecciona a `index.php` y me guarda los Query Params `[QSA,L]` que haya puesto en el Endpoint equivocado -->
RewriteRule ^(.*)$ index.php [QSA,L]
