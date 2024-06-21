# ESPECIFICACIONES BACKEND

A la hora de clonar el repositorio, en la carpeta `server` hay que proporcionar un archivo `.env` con las variables `SIGNATURE_KEY` y `CIPHER_KEY` (con cualquier valor). Es para que encuentre las claves y funcione la creación de JWT.

La carpeta `server` debe pegarse donde esté alojado el servidor, o mejor dicho, donde se almacenan los proyectos
creados en el Servidor, y utilizar ese archivo para acceder a la información. En este, caso será para el servidor Apache. En Windows `Xampp/htdocs` y en Linux en `var/www/html`.


// ************************************************************************


- [**Explicación de uso de CORS client y server**](https://stackoverflow.com/questions/65218218/react-php-blocked-my-cors-policy-only-in-post-request)

- [**Explicación de configuración de Proxy PHP. Fix CORS problem**](https://brightdata.es/blog/procedimientos/php-proxy-servers)

- [**Explicación de cómo integrar React Vite en PHP**](https://www.quora.com/How-could-I-transpile-a-react-vite-exercise-to-be-used-on-Apache-server-running-PHP-or-even-to-be-simply-imported-in-HTML-with-a-script-tag)

- [**Explicación video para conectar PHP con React**](https://www.youtube.com/watch?v=OC9_B0bPku8)


// ************************************************************************


### Ubicación de los archivos de configuración de Apache en Linux

En sistemas Linux, especialmente aquellos que ejecutan el servidor web Apache, puedes encontrar la configuración de los módulos y directivas dentro de los archivos de configuración del servidor web. Aquí te guiaré a través de dónde encontrar y cómo trabajar con la configuración en Linux:

1. **Directorio principal de configuración de Apache:**

   - El archivo principal de configuración de Apache se llama `httpd.conf` o `apache2.conf`, dependiendo de la distribución de Linux y la versión de Apache que estés utilizando.
   - Por ejemplo, en Ubuntu y Debian, el archivo principal de configuración puede encontrarse en `/etc/apache2/apache2.conf`.
   - En CentOS y Red Hat, el archivo principal puede estar en `/etc/httpd/conf/httpd.conf`.
   - En Windows, el archivo puede estar en `C:\Xampp\htdocs`.

2. **Archivos de configuración de los sitios virtuales (VirtualHosts):**

   - Los sitios web individuales (VirtualHosts) tienen sus propios archivos de configuración generalmente ubicados en directorios como `/etc/apache2/sites-available/` y `/etc/apache2/sites-enabled/` en sistemas Debian/Ubuntu.

   - En sistemas Red Hat/CentOS, los archivos de configuración de VirtualHosts pueden estar en `/etc/httpd/conf.d/`.
  
   - [**Lee esto**](https://www.swhosting.com/es/comunidad/manual/como-ver-que-modulos-hay-activos-en-apache)

   - [**Mira también este vídeo**](https://www.youtube.com/watch?v=ox5Ihgk27ic)

   - [**Y este explica todo paso a paso para los virtual host (es un argentino pro de Linux)**](https://www.youtube.com/watch?v=irGyqdliM8I)
   
   - [**Video1: Entender qué son los `virtual hosts` y cómo modificarlos**](https://www.youtube.com/watch?v=8EnTdCwaX48)

   - [**Video2: Este hay que verlo, forma parte de `Video1`**](https://www.youtube.com/watch?v=RyCbZ7f-OoE)
   
   - [**Para potenciar el servidor lee esto**](https://www.proxadmin.es/blog/configurar-apache-para-maximo-rendimiento/)

   - Habilitar los headers

   ```bash
   sudo a2enmod headers
   sudo systemctl restart apache2
   ```

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

### Encontrar la sección `<IfModule mod_headers.c>` en Windows y Linux

Para habilitar y configurar el módulo `mod_headers.c` en Apache, sigue estos pasos:

1. **Abrir el archivo de configuración:**

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

2. **Buscar la sección `<IfModule mod_headers.c>` en Windows `httpd.conf`:**

   - Dentro del archivo, puedes buscar directamente la sección `<IfModule mod_headers.c>` en Windows. Esta sección se utiliza para condicionar la carga de configuraciones específicas solo si el módulo `mod_headers` está cargado y disponible en Apache. Si no existen, créalos (sólo para windows).
   
   - Ve al archivo `httpd.conf` y en cada `<Directory></Directory>` modifica el `AllowOverride` añade:

   ```t
   <Directory>
      AllowOverride All

      Header set Access-Control-Allow-Origin "<url_específica> o <*>"
      Header set Access-Control-Allow-Methods "GET, POST, PUT, DELETE, OPTIONS"
      Header set Access-Control-Allow-Headers "X-Requested-With, Content-Type, Authorization, X-Auth-Token"
   </Directory>
   ``` 

   - Además, en el `<IfModule headers_module>` agrega:

   ```t
   <IfModule headers_module>

      Header set Access-Control-Allow-Origin "<url_específica> o <*>"
      Header set Access-Control-Allow-Methods "GET, POST, PUT, DELETE, OPTIONS"
      Header set Access-Control-Allow-Headers "X-Requested-With, Content-Type, Authorization, X-Auth-Token"
   </Directory>
   ```

   - Por último descomenta esta línea:

   ```t
   LoadModule headers_module modules/mod_headers.so
   ```


3. **Para ver los módulos y activar `mod_headers` en Linux `apache2.conf`:** 

   - Dentro de `<IfModule mod_headers.c>`, puedes agregar directivas como `Header` para configurar encabezados HTTP según sea necesario para tu aplicación web dentro del archivo `apache2.conf`.
  
   - También agregamos en cada `<Directory></Directory>`

   ```t
   <Directory>
      AllowOverride All

      Header set Access-Control-Allow-Origin "<url_específica> o <*>"
      Header set Access-Control-Allow-Methods "GET, POST, PUT, DELETE, OPTIONS"
      Header set Access-Control-Allow-Headers "X-Requested-With, Content-Type, Authorization, X-Auth-Token"
   </Directory>
   ```

   ```t
   <IfModule mod_headers.c>

      Header set Access-Control-Allow-Origin "<url_específica> o <*>"
      Header set Access-Control-Allow-Methods "GET, POST, PUT, DELETE, OPTIONS"
      Header set Access-Control-Allow-Headers "X-Requested-With, Content-Type, Authorization, X-Auth-Token"
   </IfModule>
   ```

   - Otro ejemplo de uso típico sería:

   ```t
   <IfModule mod_headers.c>
       # Ejemplo: Aquí colocas las configuraciones específicas para mod_headers
       Header always set X-Frame-Options "SAMEORIGIN"
       Header always set X-XSS-Protection "1; mode=block"
       Header always set X-Content-Type-Options "nosniff"
   </IfModule>
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

Siguiendo estos pasos, podrás encontrar y modificar la configuración dentro de `<IfModule mod_headers.c>` según sea necesario para tu configuración específica de Apache en Linux o Windows.


// ************************************************************************


- **Configuración de Proxy en Apache. Fix CORS problem**

Antes de configurar tu servidor PHP para manejar las solicitudes y establecer los encabezados CORS, es importante asegurarte de que Apache esté configurado correctamente para permitir el tráfico entrante y dirigir las solicitudes correctamente al backend PHP. Aquí te guiaré a través de los pasos para configurar un proxy en Apache utilizando `mod_proxy`.

Para permitir que Apache actúe como un proxy inverso y redirija las solicitudes entrantes desde React Vite (en `http://localhost:5173/ASATA/PROYECTO/client`) al backend PHP (en `http://localhost:80/ASATA/PROYECTO/server/credentials`), debes seguir estos pasos:

### Paso 1: Habilitar `mod_proxy` en Apache

Primero, asegúrate de que `mod_proxy` esté habilitado en tu servidor Apache. Puedes hacerlo ejecutando los siguientes comandos en la terminal:

```bash
sudo a2enmod proxy &&
sudo a2enmod proxy_http &&
sudo systemctl restart apache2
```

Estos comandos habilitarán `mod_proxy` y `mod_proxy_http`, que son necesarios para configurar un proxy HTTP en Apache.

### Paso 2: Configurar el Proxy en el Archivo de Configuración de Apache

Luego, debes configurar un proxy en el archivo de configuración de Apache (`httpd.conf` o un archivo de configuración virtual específico). 

These are not your only options. On Ubuntu/Debian, Apache also processes all the files in /etc/apache2/sites-enabled/ (which should be symlinks to files in sites-available/ directory, managed by the `a2ensite` and `a2dissite` programs)
You're intended to use these directories for VirtualHosts.

Aquí tienes un ejemplo de cómo podrías configurarlo:

```t
<VirtualHost *:5173>
    ServerName localhost

    ProxyPreserveHost On
    ProxyPass /ASATA/PROYECTO/server/ http://localhost:80/ASATA/PROYECTO/server/
    ProxyPassReverse /ASATA/PROYECTO/server/ http://localhost:80/ASATA/PROYECTO/server/

    ErrorLog ${APACHE_LOG_DIR}/vite-client-error.log
    CustomLog ${APACHE_LOG_DIR}/vite-client-access.log combined
</VirtualHost>
```

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
  1. Create a new configuration file in `sites-available/`. For example:
     ```bash
     sudo nano /etc/apache2/sites-available/mywebsite.conf
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
- `ProxyPass` y `ProxyPassReverse`: Estas directivas indican a Apache que todas las solicitudes que lleguen a `http://localhost:5173/ASATA/PROYECTO/client/ASATA/PROYECTO/server/credentials` deben ser redirigidas al backend PHP en `http://localhost:80/ASATA/PROYECTO/server/credentials`.

### Paso 3: Reiniciar Apache

Después de realizar cambios en la configuración de Apache, asegúrate de reiniciar Apache para que los cambios surtan efecto:

```bash
sudo systemctl restart apache2
```

- **Configuración de Proxy en React Vite. Fix CORS problem**

Para configurar un proxy en Vite y poder realizar solicitudes desde una aplicación React Vite hacia un backend PHP sin problemas de CORS, utilizando las rutas proporcionadas:

### Paso 1: Configuración del Proxy en `vite.config.js`

Crea o modifica el archivo `vite.config.js` en la raíz de tu proyecto Vite con la siguiente configuración:

```javascript
import { defineConfig } from 'vite';
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
        target: "http://localhost:80/ASATA/PROYECTO/server", // URL del backend PHP
        changeOrigin: true,
        rewrite: (path) => path.replace(/^\/api/, "/credentials"), // Reescritura de `/api` por `/credentials` (la carpeta donde está el archivo `registro.php`)
      },
    },
  },
});
```

- `'/api'`: Este es el prefijo de las URLs que serán redirigidas al servidor backend.
- `target`: Especifica la URL base del servidor backend al que quieres redirigir las solicitudes (`http://localhost:80/ASATA/PROYECTO/server` en tu caso).
- `changeOrigin`: Habilita el cambio de origen para las solicitudes CORS.
- `rewrite`: No se realiza una modificación significativa de la ruta original, excepto por el cambio en el puerto.

### Paso 2: Ejemplo de Uso en el Componente React

A continuación, mostramos cómo realizar una solicitud GET básica desde un componente React hacia el backend PHP a través del proxy configurado:

```javascript
import React, { useEffect, useState } from 'react';

const App = () => {
  const [data, setData] = useState(null);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await fetch('/api/registro.php'); // Realiza una solicitud a '/api/registro.php', será redirigida a 'http://localhost:80/ASATA/PROYECTO/server/credentials/registro.php'
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        const jsonData = await response.json();
        setData(jsonData);
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    };

    fetchData();
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

- `fetch('/api/registro.php')`: Realiza una solicitud GET a `/ASATA/PROYECTO/server/api/registro.php`, que será redirigida por el proxy configurado a `http://localhost:80/ASATA/PROYECTO/server/credentials/registro.php`.

### Consideraciones Adicionales

- **Configuración CORS en el Backend**: Asegúrate de que tu backend PHP en `localhost:80` tenga configurado CORS adecuadamente para aceptar solicitudes desde `localhost:5173`.
- **Seguridad**: No es recomendable deshabilitar completamente CORS en producción. Configura tu servidor PHP para permitir CORS desde `localhost:5173` específicamente.

Con esta configuración, deberías poder realizar solicitudes HTTP desde tu aplicación React Vite hacia tu backend PHP en `localhost:80/ASATA/PROYECTO/server/credentials` sin problemas de CORS, utilizando el proxy configurado en Vite para manejar las rutas adecuadamente.


// ************************************************************************


- **Configurar CORS:**

Para realizar peticiones HTTP entre una aplicación React y un servidor PHP sin incurrir en problemas de CORS (Cross-Origin Resource Sharing), hay varias soluciones que puedes implementar. A continuación, se presentan algunas estrategias comunes:

1. `Configuración del Servidor PHP para Permitir CORS`

La forma más directa de resolver problemas de CORS es configurando el servidor PHP para permitir las solicitudes de origen cruzado. Puedes hacerlo agregando encabezados CORS en tu archivo PHP:

```php
<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With, X-Auth-Token");

// Tu lógica de manejo de solicitudes aquí
?>
```

2. `Uso de un Proxy`

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

También se puede hacer en `React Vite`:

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
        target: "http://localhost:80/ASATA/PROYECTO/server", // URL del backend PHP
        changeOrigin: true,
        rewrite: (path) => path.replace(/^\/api/, "/credentials"), // Reescritura de `/api` por `/credentials` (la carpeta donde está el archivo `registro.php`)
      },
    },
  },
});
```

3. `Uso de Nginx o Apache como Proxy`

Si tienes control sobre tu servidor web (por ejemplo, Nginx o Apache), puedes configurarlo para que actúe como un proxy inverso, redirigiendo las solicitudes desde tu aplicación React al servidor PHP.

### **Configuración de Nginx**

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

### **Configuración de Apache dentro del proyecto backend**

Crea un archivo `.htaccess` en la raíz de tu proyecto con lo siguiente:

Esto sirve para armar un Proxy virtual

```apache
<IfModule mod_proxy.c>
    ProxyRequests Off
    <Proxy *>
        Order deny,allow
        Allow from all
    </Proxy>

    ProxyPass /api/ http://localhost:80/
    ProxyPassReverse /api/ http://localhost:80/
</IfModule>
```

Esto habilita reescritura y reescribe la URL base para permitirme trabajar con Query Params en los endpoints

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

