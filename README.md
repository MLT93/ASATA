## IFCD0210 - DESARROLLO DE APLICACIONES CON TECNOLOGÍAS WEB

- 600h

- MF0491_3: Programación web entorno cliente: `HTML`, `CSS`, `JavaScript`, `UI/UX`, `Vue.js`

- MF0492_3: Programación web entorno servidor: `PHP`, `SQL`, `NoSQL`, `XAMPP`, `LAMP`, `Postman`, `Apache`, `FileZilla`


- A la hora de clonar el repositorio, al lado de cada `.gitignore` hay que proporcionar un archivo `.env` con las variables `CIPHER_KEY` y `SIGNATURE_KEY` (cualquier valor es válido) para que encuentre las claves y funcione la app. Además, hay que instalar `Composer` en todos los lugares donde aparezcan los `composer.lock` y `composer.json` para crear la carpeta `vendor` y así actualizar los paquetes. Esto se hace yendo a la ruta donde están esos archivos y realizando el siguiente comando:

```bash
composer install
```

Si no llegara a instalarse correctamente, borrar la carpeta `vendor` y realizar de nuevo el comando.

Posteriormente reiniciar el servidor y listo!
