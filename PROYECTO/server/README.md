# ESPECIFICACIONES BACKEND

A la hora de clonar el repositorio, en la carpeta `server` hay que proporcionar un archivo `.env` con las variables `SIGNATURE_KEY` y `CIPHER_KEY` (con cualquier valor). Es para que encuentre las claves y funcione la creación de JWT.

La carpeta `server` debe pegarse donde esté alojado el servidor, o mejor dicho, donde se almacenan los proyectos
creados en el Servidor, y utilizar ese archivo para acceder a la información. En este, caso será para el servidor Apache. En Windows `Xampp/htdocs` y en Linux en `var/www/html`.


// ****************\*\*****************\*\*\*\*****************\*\*****************


## **`Pasos a seguir`**

1. `habilitar el módulo Headers en Apache`
2. `habilitar el módulo de reescritura en Apache`
3. `habilitar módulo Proxy Apache`
4. `exportar la API (carpeta server) a la raíz del servidor` (la API y la App tienen que estar separadas)
5. `configurar el proxy virtual de React Vite en el vite.config.ts`
6. configurar el archivo `.htaccess` del backend con el código `<IfModule headers_module></IfModule>, RewriteEngine y <IfModule mod_proxy></IfModule>`. Recuerda que `RewriteBase /server/` es la ruta base (el `index | home`) del backend
7. Revisar `error.log`


// ****************\*\*****************\*\*\*\*****************\*\*****************


- [**Video1: explicación CRUD backend entre React y PHP**](https://www.youtube.com/watch?v=Gu-Fl1zIVbE)

- [**Video2: Explicación CRUD backend entre React y PHP**](https://www.youtube.com/watch?v=4B2XJHFaFIc)

- [**Explicación de uso de CORS client y server**](https://stackoverflow.com/questions/65218218/react-php-blocked-my-cors-policy-only-in-post-request)

- [**Explicación de configuración de Proxy en backend PHP**](https://brightdata.es/blog/procedimientos/php-proxy-servers)

- [**Explicación de configuración Proxy en Apache Linux**](https://www.ionos.es/digitalguide/servidores/configuracion/configurar-apache-como-proxy-inverso/)

- [**Explicación de Proxy en Windows**](https://help.eset.com/protect_install/90/es-ES/upgrade_apache_http_proxy_windows_instructions_manual.html)

- [**Explicación de cómo integrar React Vite en PHP**](https://www.quora.com/How-could-I-transpile-a-react-vite-exercise-to-be-used-on-Apache-server-running-PHP-or-even-to-be-simply-imported-in-HTML-with-a-script-tag)

- [**Explicación video para conectar PHP con React**](https://www.youtube.com/watch?v=OC9_B0bPku8)

- [**Ver módulos activos en Apache**](https://www.swhosting.com/es/comunidad/manual/como-ver-que-modulos-hay-activos-en-apache)

- [**Módulo Headers**](https://www.youtube.com/watch?v=ox5Ihgk27ic)

- [**Y este explica todo paso a paso para los Virtual Host (es un argentino pro de Linux)**](https://www.youtube.com/watch?v=irGyqdliM8I)

- [**Video1: Entender qué son los Virtual Hosts y cómo modificarlos**](https://www.youtube.com/watch?v=8EnTdCwaX48)

- [**Video2: Este hay que verlo, forma parte de Video1**](https://www.youtube.com/watch?v=RyCbZ7f-OoE)

- [**Para potenciar el servidor lee esto**](https://www.proxadmin.es/blog/configurar-apache-para-maximo-rendimiento/)


// ****************\*\*****************\*\*\*\*****************\*\*****************


## **`Archivos de configuración de Apache en Linux`**

En sistemas Linux, especialmente aquellos que ejecutan el servidor web Apache, puedes encontrar la configuración de los módulos y directivas dentro de los archivos de configuración del servidor web. Aquí te guiaré a través de dónde encontrar y cómo trabajar con la configuración en Linux:

1. **Directorio principal de configuración de Apache:**

   - El archivo principal de configuración de Apache se llama `httpd.conf` o `apache2.conf`, dependiendo de la distribución de Linux y la versión de Apache que estés utilizando.

   - Por ejemplo, en Ubuntu y Debian, el archivo principal de configuración puede encontrarse en `/etc/apache2/apache2.conf`.

   - En CentOS y Red Hat, el archivo principal puede estar en `/etc/httpd/conf/httpd.conf`.

   - En Windows, el archivo puede estar en `C:\Xampp\htdocs`.

2. **Archivos de configuración de los sitios virtuales (VirtualHosts):**

   Los sitios web individuales (VirtualHosts) tienen sus propios archivos de configuración generalmente ubicados en directorios como `/etc/apache2/sites-available/` y `/etc/apache2/sites-enabled/` en sistemas Debian/Ubuntu.

   - En sistemas Red Hat/CentOS, los archivos de configuración de VirtualHosts pueden estar en `/etc/httpd/conf.d/`.

   - Nos movemos a la carpeta de las configuraciones

   ```bash
   cd /etc/apache2/sites-available
   ```

   - Aquí se encuentran el archivo del configuración del puerto 80 (http) `000-default.conf` y del puerto 443 (https) `default-ssl.conf`. Realizamos una copia de la conf del puerto 80 y trabajaremos en ella (SOLO SI DESEAMOS CREAR MÁS VIRTUAL HOSTS Y SUBDOMINIOS. SI SE POSEE UN DOMINIO PROPRIO ES MEJOR)

   ```bash
   sudo cp 000-default.conf paginaProyectoReactPHP
   ```

   - Setear el archivo de configuración para crear páginas

   ```bash
   sudo vim paginaProyectoReactPHP
   ```

   - En ese archivo se modifica el `DocumentRoot`, `ServerName` y `ServerAdmin` para crear los directorios de las páginas y demás.

   - Después de eso habría que crear las carpetas por cada pagina creada, en el directorio donde asignaste `DocumentRoot` para que encuentre dichos sitios.

   ```bash
   cd /var/www/html && mkdir pagina1
   ```

   - Ahora hay que habilitar la página creada usando `apache2 enabled site -> a2ensite`

   ```bash
   cd /etc/apache2/sites-available
   sudo /usr/sbin/a2ensite pagina1
   sudo systemctl restart apache2
   ```

   - Ahora encontrarás `pagina1` en las páginas habilitadas:

   ```bash
   cd /etc/apache2/sites-available
   ```

   - Si querés deshabilitar los sitios `apache2 disable site -> a2dissite`

   ```bash
   sudo /usr/sbin/a2dissite pagina1
   ```


// ****************\*\*****************\*\*\*\*****************\*\*****************


## **`Configuración de Headers en Windows y Linux`**

Para habilitar y configurar el módulo `mod_headers` en Apache, sigue estos pasos:

1. **Abrir el archivo de configuración:**

   - Habilita el módulo por terminal:

     ```bash
     sudo a2enmod headers
     ```

   - Usa un editor de texto como `nano`, `vim` o `gedit` para abrir el archivo de configuración principal de Apache.

     ```bash
     sudo vim /etc/apache2/apache2.conf
     ```

     ```cmd
     cd C:\xampp\apache\conf
     dir httpd.conf
     ```

     ```vim
     tecla '/' para buscar desde el cursor en adelante
     tecla '?' para buscar desde el cursor hacia atrás
     tecla 'i' para escribir
     tecla 'exit o Esc' para salir del modo escritura
     tecla ':wq' para guardar y salir
     tecla ':q' para salir
     ```

2. **Agregar permisos a `mod_headers` en Linux `apache2.conf`:**

   - Agrega el archivo `<IfModule mod_headers>`. Aquí se añaden las directivas `Headers` para configurar encabezados HTTP según sea necesario para tu aplicación web dentro del archivo `apache2.conf`.
   
   - Recuerda modificar los permisos de escritura en los directorios `<Directory></Directory>` modificando el comando `AllowOverride None` por `AllowOverride None` en los directorios de tu interés.

   ```t
   <IfModule mod_headers>

      Header set Access-Control-Allow-Origin "<url_específica> o <*>"
      Header set Access-Control-Allow-Methods "GET, POST, PUT, DELETE, OPTIONS"
      Header set Access-Control-Allow-Headers "X-Requested-With, Content-Type, Authorization"
   </IfModule>
   ```

   - Otro ejemplo de uso típico sería:

   ```t
   <IfModule mod_headers>
       # Ejemplo: Aquí colocas las configuraciones específicas para mod_headers
       Header always set X-Frame-Options "SAMEORIGIN"
       Header always set X-XSS-Protection "1; mode=block"
       Header always set X-Content-Type-Options "nosniff"
   </IfModule>
   ```

3. **Ahora en Windows, activación y añadido de permisos en `<IfModule headers_module></IfModule>` dentro del archivo `httpd.conf`:**

   - Esta sección se utiliza para condicionar la carga de configuraciones específicas solo si el módulo `mod_headers` está cargado y disponible en Apache. Si no existen, créalos (sólo para windows).

   - Ve al archivo `httpd.conf` y en el `<IfModule headers_module>` agrega:

   ```t
   <IfModule headers_module>

      Header set Access-Control-Allow-Origin "<url_específica> o <*>"
      Header set Access-Control-Allow-Methods "GET, POST, PUT, DELETE, OPTIONS"
      Header set Access-Control-Allow-Headers "X-Requested-With, Content-Type, Authorization"
   </Directory>
   ```

   - Por último descomenta esta línea (el módulo):

   ```t
   LoadModule headers_module modules/mod_headers.so
   ```

4. **Guardar y salir:**

   - Guarda los cambios en el archivo de configuración y cierra el editor.

5. **Reiniciar Apache:**

   - Después de hacer cambios en la configuración de Apache, siempre debes reiniciar el servicio para que los cambios surtan efecto:

   ```bash
   sudo systemctl restart apache2   # En Debian/Ubuntu
   sudo systemctl restart httpd     # En CentOS/Red Hat
   ```

### Consideraciones adicionales

- **Permisos de usuario:** Para editar archivos de configuración en `/etc/apache2/` o `/etc/httpd/`, normalmente necesitarás privilegios de superusuario (root). Usa `sudo` antes de los comandos de edición o reinicio del servicio.
- **Documentación:** Siempre es útil revisar la documentación oficial de Apache y la guía específica para tu distribución de Linux para obtener detalles adicionales y mejores prácticas.

Siguiendo estos pasos, podrás encontrar y modificar la configuración dentro de `<IfModule mod_headers>` según sea necesario para tu configuración específica de Apache en Linux o Windows.


// ****************\*\*****************\*\*\*\*****************\*\*****************


## **`Configuración de Virtual Host en Apache`**

### Paso 1: Crear tu Virtual Host

On Ubuntu/Debian Apache also processes all the files in /etc/apache2/sites-enabled/ (which should be symlinks to files in sites-available/ directory, managed by the `a2ensite` and `a2dissite` programs)
You're intended to use these directories for VirtualHosts.

In Ubuntu/Debian systems running Apache, the directories `/etc/apache2/sites-enabled/` and `/etc/apache2/sites-available/` are used for managing virtual hosts, which allow you to host multiple websites or applications on a single Apache server. Here’s how these directories are typically used and managed:

### Directory Structure:

1. **sites-available/**:

   - This directory contains configuration files (`.conf` files) for all available virtual hosts.
   - These configuration files define how each virtual host should behave, including details like domain names, document roots, logging, and more.

2. **sites-enabled/**:

   - This directory contains symbolic links to the configuration files from `sites-available/` that should be active (enabled) and processed by Apache.
   - Only the configuration files symlinked here will be loaded and used by Apache.

### Managing Virtual Hosts:

- **Adding a New Virtual Host**:

  1. Create a new configuration file in `sites-available/`:

     ```bash
     sudo vim /etc/apache2/sites-available/mywebsite.conf
     ```

  2. Inside `mywebsite.conf`, define your virtual host configuration:

     ```t
     <VirtualHost *:80>
         ServerName mywebsite.com
         DocumentRoot /var/www/mywebsite
         ErrorLog ${APACHE_LOG_DIR}/error.log
         CustomLog ${APACHE_LOG_DIR}/access.log combined
     </VirtualHost>
     ```

     Adjust `ServerName`, `DocumentRoot`, and other directives as per your requirements.

  3. Enable the virtual host by creating a symbolic link in `sites-enabled/` using `a2ensite`:

     ```bash
     sudo a2ensite mywebsite.conf
     ```

  4. Reload Apache for the changes to take effect:

     ```bash
     sudo systemctl reload apache2
     ```

- **Disabling a Virtual Host**:

  - To disable a virtual host, use `a2dissite` followed by the virtual host configuration file name (without the `.conf` extension):

    ```bash
    sudo a2dissite mywebsite
    ```

  - Again, reload Apache to apply the changes:

    ```bash
    sudo systemctl reload apache2
    ```

- **Checking Syntax and Errors**:

  - Before reloading Apache, it’s a good practice to check the syntax of your configuration files for errors:

    ```bash
    sudo apache2ctl configtest
    ```

### Virtual Host Examples:

- **Simple Virtual Host**:

  ```t
  <VirtualHost *:80>
      ServerName mywebsite.com
      DocumentRoot /var/www/mywebsite
      ErrorLog ${APACHE_LOG_DIR}/error.log
      CustomLog ${APACHE_LOG_DIR}/access.log combined
  </VirtualHost>
  ```

- **Virtual Host with SSL** (if using HTTPS):

  ```t
  <VirtualHost *:443>
      ServerName mywebsite.com
      DocumentRoot /var/www/mywebsite
      ErrorLog ${APACHE_LOG_DIR}/error.log
      CustomLog ${APACHE_LOG_DIR}/access.log combined

      SSLEngine on
      SSLCertificateFile /etc/ssl/certs/mywebsite.crt
      SSLCertificateKeyFile /etc/ssl/private/mywebsite.key
  </VirtualHost>
  ```

### Summary:

- Use `sites-available/` for storing all virtual host configuration files.
- Use `sites-enabled/` for enabling and managing which virtual hosts are active.
- Use `a2ensite` and `a2dissite` commands to enable and disable virtual hosts respectively.
- Always reload Apache (`sudo systemctl reload apache2`) after making changes to virtual host configurations.

This approach allows you to host multiple websites or applications on the same Apache server while keeping their configurations organized and manageable.

En este ejemplo:

- `<VirtualHost *:5173>`: Define el virtual host para el puerto 5173, donde se encuentra tu aplicación React Vite.
- `ProxyPass` y `ProxyPassReverse`: Estas directivas indican a Apache que todas las solicitudes que lleguen a `http://localhost:80/ASATA/PROYECTO/server/` deben ser redirigidas al backend PHP en `http://localhost:80/ASATA/PROYECTO/server/`.

### Paso 2: Reiniciar Apache

Después de realizar cambios en la configuración de Apache, asegúrate de reiniciar Apache para que los cambios surtan efecto:

```bash
sudo systemctl restart apache2
```


// ****************\*\*****************\*\*\*\*****************\*\*****************


## **`Configurar Proxy en Apache y CORS en el archivo PHP`**

Antes de configurar tu servidor PHP para manejar las solicitudes y establecer los encabezados CORS, es importante asegurarte de que Apache esté configurado correctamente para permitir el tráfico entrante y dirigir las solicitudes correctamente al backend PHP. Aquí te guiaré a través de los pasos para configurar un proxy en Apache utilizando `mod_proxy`.

Para permitir que Apache actúe como un proxy inverso y redirija las solicitudes entrantes desde React Vite (en `http://localhost:5173/ASATA/PROYECTO/client`) al backend PHP (en `http://localhost:80/ASATA/PROYECTO/server/credentials`), debes seguir estos pasos:

### 1. Habilitar `mod_proxy` en el servidor Apache

Primero, asegúrate de que `mod_proxy` esté habilitado en tu servidor Apache en Linux. Puedes hacerlo ejecutando los siguientes comandos en la terminal:

```bash
sudo a2enmod proxy
sudo a2enmod proxy_http
sudo a2enmod proxy_balancer
sudo a2enmod proxy_connect
sudo a2enmod proxy_html
sudo systemctl restart apache2
```

En Windows, lo hacemos de forma manual en el archivo `httpd.conf` con:

```t
<Proxy *>
  AuthType Basic
  AuthName "Password Required"
  AuthUserFile password.file
  AuthGroupFile group.file
  Require group usergroup
  Order deny,allow
  Deny from all
  Allow from all
</Proxy>
```

Estos comandos habilitarán `mod_proxy` y `mod_proxy_http`, que son necesarios para configurar un proxy HTTP en Apache.

Para realizar peticiones HTTP entre una aplicación React y un servidor PHP sin incurrir en problemas de CORS (Cross-Origin Resource Sharing), hay varias soluciones que puedes implementar:

### 2. Configuración del archivo PHP para Permitir Headers (CORS)

La forma más directa de resolver problemas de CORS es configurando el servidor PHP para permitir las solicitudes de origen cruzado.

```php
<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

// Tu lógica de manejo de solicitudes aquí

# code...
?>
```

### 3. Uso de un Proxy

Otra forma de evitar problemas de CORS es configurando un proxy en tu servidor de desarrollo `Create-React-App`. Esto implica redirigir las solicitudes de tu aplicación React a través de un servidor proxy que hace la solicitud real al servidor PHP. Puedes configurar un proxy en tu proyecto `React` modificando el archivo `package.json` para redirigir las solicitudes de la API:

```json
{
  "name": "mi-app",
  "version": "1.0.0",
  "private": true,
  "dependencies": {
    "react": "^17.0.2",
    "react-dom": "^17.0.2",
    "react-scripts": "4.0.3"
  },
  "scripts": {
    "start": "react-scripts start",
    "build": "react-scripts build",
    "test": "react-scripts test",
    "eject": "react-scripts eject"
  },
  "proxy": "http://localhost:80" // Cambia esto por la URL de tu servidor PHP
}
```

También se puede hacer en `React Vite` dentro del archivo `vite.config.tsx`:

```tsx
import { defineConfig } from "vite";
import react from "@vitejs/plugin-react";

export default defineConfig({
  plugins: [react()],
  build: {
    target: "esnext",
  },
  server: {
    proxy: {
      // Las peticiones ahora deben empezar todas por `/api` para que la encuentre
      "/api": {
        target: "http://localhost:80/server", // URL del backend PHP
        changeOrigin: true,
        rewrite: (path) => path.replace(/^\/api/, ""), // Reescritura de `/api/registro.php` por `/registro.php` (la carpeta donde está el archivo `registro.php`)
      },
    },
  },
});
```

- `/api`: Este es el prefijo de las URLs que serán redirigidas al servidor backend. Esto significa que en tu petición frontend deberás incluir ese prefijo en el endpoint, ejemplo: `/api/registro.php`.
- `target`: Especifica la URL base del servidor backend al que quieres redirigir las solicitudes (`http://localhost:80/server` en tu caso). Siguiendo el ejemplo de arriba, la petición iría al backend de la siguiente forma: `http://localhost:80/server/registro.php`
- `changeOrigin`: Habilita el cambio de origen para las solicitudes CORS.
- `rewrite`: No se realiza una modificación significativa de la ruta original, excepto por el cambio en el puerto.

A continuación, mostramos cómo realizar una solicitud GET básica desde un componente React hacia el backend PHP a través del proxy configurado:

```javascript
import React, { useEffect, useState } from "react";

const App = () => {
  const [data, setData] = useState(null);

  useEffect(() => {
    const getFetchData = async () => {
      try {
        const response = await fetch("/api/registro.php"); // Realiza una solicitud a '/api/registro.php', será redirigida a 'http://localhost:80/server/registro.php'
        if (!response.ok) {
          throw new Error(
            "Get Error: Network response failed:",
            response.status,
          );
        }
        const jsonData = await response.json();
        setData(jsonData);
      } catch (error) {
        console.error("Error fetching data:", error);
      }
    };

    getFetchData();
  }, []);

  return (
    <div>
      <h1>Backend Data:</h1>
      <pre>{JSON.stringify(data, null, 2)}</pre>
    </div>
  );
};

export default App;
```

En este ejemplo:

- `fetch('/api/registro.php')`: Realiza una solicitud GET a `/api/registro.php`, que será redirigida por el proxy configurado a `http://localhost:80/server/registro.php`.

### 4. Uso de Nginx o Apache como Proxy

Si tienes control sobre tu servidor web (por ejemplo, Nginx o Apache), puedes configurarlo para que actúe como un proxy inverso, redirigiendo las solicitudes desde tu aplicación React al servidor PHP.

- `Configuración de Nginx`

```nginx
server {
    listen 80;
    server_name tu_dominio.com;

    location / {
        proxy_pass http://localhost:3000; # Puerto donde corre tu app React
        proxy_http_version 1.1;
        proxy_set_header Upgrade $http_upgrade;
        proxy_set_header Connection 'upgrade';
        proxy_set_header Host $host;
        proxy_cache_bypass $http_upgrade;
    }

    location /api/ {
        proxy_pass http://localhost:80; # Puerto donde corre tu servidor PHP
    }
}
```

- `Configuración dentro del proyecto Backend que usa Apache`

Crea un archivo `.htaccess` en la raíz de tu proyecto backend y añade lo sieguiente:

- Esto sirve para armar un Proxy virtual dentro de `.htaccess`:

```apache
<IfModule mod_proxy>
    ProxyRequests Off

    <Proxy *>
        Order deny,allow
        Allow from all
    </Proxy>

    ProxyPreserveHost On
    ProxyPass /api/ http://localhost:80/server/
    ProxyPassReverse /api/ http://localhost:80/server/

    ErrorLog ${APACHE_LOG_DIR}/vite-client-error.log
    CustomLog ${APACHE_LOG_DIR}/vite-client-access.log combined
</IfModule>
```

- Esto habilita reescritura y reescribe la URL base para permitirme trabajar con Query Params en los endpoints dentro de `.htaccess`:

También deberás dar los permisos de escritura:

```bash
sudo a2enmod rewrite
sudo systemctl restart apache2
```

<!-- Habilita la reescritura -->

RewriteEngine On

<!-- Actualizamos la URL base -->

RewriteBase /ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/

<!-- Condición para encontrar files (archivos). Si no lo encuentra, pasa a la siguiente línea -->

RewriteCond %{REQUEST_FILENAME} !-f

<!-- Condición para encontrar directories (carpetas). Si no lo encuentra, pasa a la siguiente línea -->

RewriteCond %{REQUEST_FILENAME} !-d

<!-- Si ningún Endpoint existe, me redirecciona a `index.php` y me guarda los Query Params `[QSA,L]` que haya puesto en el Endpoint equivocado. `index.php` al no tener esa ruta, cargará la página de error -->

RewriteRule ^(.*)$ index.php [QSA,L]

```apache
RewriteEngine On
RewriteBase /ruta/de/hasta/la/raíz/de/tu/proyecto/después/del/host/
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [QSA,L]
```

- Esto configura los Headers dentro de `.htaccess`

También deberás dar los permisos al módulo Headers (en Windows está dentro del archivo de configuración `httpd.conf` como `<IfModule headers_module></IfModule>`):

```bash
sudo a2enmod headers
sudo systemctl restart apache2
```

```
<IfModule mod_headers>
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS");
  header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
</IfModule>
```


// ****************\*\*****************\*\*\*\*****************\*\*****************


## **`Errores`**

En caso de recibir algún error en la manipulación o ejecución de la API, revisa los logs:

```bash
sudo tail -f /var/log/apache2/error.log
```

```bash
sudo tail -f /var/log/apache2/access.log
```

Prueba a realizar las peticiones a través de Curl o Postman:

```bash
curl -X GET http://localhost/server/users/users.php
```

Eventualmente se puede dar permiso de lectura y escritura para manipular `/server` dentro de Apache con:

```bash
sudo chmod 755 /var/www/html/server/
```
