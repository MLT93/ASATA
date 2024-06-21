A la hora de clonar el repositorio, en la carpeta `server` hay que proporcionar un archivo `.env` con las variables `SIGNATURE_KEY` y `CIPHER_KEY` (con cualquier valor). Es para que encuentre las claves y funcione la creación de JWT.

La carpeta `server` debe pegarse donde esté alojado el servidor, o mejor dicho, donde se almacenan los proyectos
creados en el Servidor y utilizar ese archivo para acceder a la información. En este caso será para el servidor Apache, en Windows `Xampp/htdocs` y en Linux en `var/www/html`
