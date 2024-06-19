[**Explicación de MVC**](https://es.wikipedia.org/wiki/Modelo%E2%80%93vista%E2%80%93controlador)https://es.wikipedia.org/wiki/Modelo%E2%80%93vista%E2%80%93controlador

- **CONTROLLERS** -> Intermediario entre `Models` y `Views`
- **MODELS** -> Donde se ejecuta las consultas a las DB y se crean métodos para ejecutar las consultas (siempre se crea un modelo por cada tabla de la DB que se consulta)
- **VIEWS** -> Las páginas que transmito al cliente

- **INDEX** -> Donde se cargarán todos los archivos a través de `Router` y se declaran las variables constantes de todo el archivo (las que me sirven para conectarme a la DB: DB_HOST, DB_USER, DB_PASS, DB_NAME)
- **ROUTER** -> Es el enrutador de páginas que carga cada URL dependiendo de los Endpoints que se transmitan, transmitiendo errores y todo


Primero estructura las carpetas con `Models`, `Controllers` y `Views`. Después crea tu `Router` y el `index`
Recuerda que la transición entre archivos funcionará así:
1. - Pasarás primero por la llamada a la DB (models)
2. - Posteriormente utilizarás y/o transformarás la información (controllers)
3. - Después mostrarás esa información (views)
4. - Todo ello pasará por el enrutador (Router) donde se crea el array de las rutas 
5. - Por último se cargará en el archivo principal (index) el enrutador, donde se instancia y se obtiene el array con las rutas
6. - Recuerda que deberás crear un `.htaccess` para Apache con la siguiente estructura:
      `
       RewriteEngine On
       RewriteBase /ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/
       RewriteCond %{REQUEST_FILENAME} !-f
       RewriteCond %{REQUEST_FILENAME} !-d
       RewriteRule ^(.*)$ index.php [QSA,L]
      `

**Consejo:** Crea el primer Modelo, Controlador, Vista, Enrutamiento e index, y posteriormente crea inmediatamente la página de errores (esto es porque el error no necesita modelo, solo controlador y vista)
