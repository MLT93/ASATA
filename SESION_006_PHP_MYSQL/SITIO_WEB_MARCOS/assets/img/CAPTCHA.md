# CAPTCHA

Un captcha es un rompecabezas de imágenes con alguna distorsión para que solo seres humanos puedan dar con la clave. Esto sirve para realizar comprobaciones de usuario.

Si la imagen captcha no se ve en la página, dentro del archivo `php.ini` (en la carpeta php), descomentar esto `extension=gd` para poder verlo en la página web

Cómo hacer que se vean las imágenes CAPTCHA en Apache2 Ubuntu 22.04
Para que las imágenes CAPTCHA se muestren correctamente en Apache2 en Ubuntu 22.04, hay que asegurarse de que se cumplan los siguientes requisitos:

**Requisitos previos:**

Apache2 instalado y configurado correctamente.
Módulo PHP GD instalado y habilitado.
Biblioteca libapache2-mod-php instalada.
Fuente TrueTypeFont para las letras del CAPTCHA (el archivo de la fuente '.ttf').
Pasos:

**Instalar el módulo PHP GD:**
Módulo necesario para la extensión gd.

```bash
sudo apt install php-gd -y
```

**Instalar la biblioteca libapache2-mod-php:**
Este paquete central proporciona el módulo PHP para Apache, permitiendo que los scripts PHP interactúen con el servidor web.

```bash
sudo apt install libapache2-mod-php -y
```

**Instalar biblioteca php-imagick (opcional)**
Este paquete ofrece capacidades de manipulación de imágenes en PHP, que a menudo son necesarias para renderizar CAPTCHAs.

```bash
sudo apt install php-imagick
```

**Verificar la posesión de archivos TrueType Font:**

La fuente TrueType es necesaria para las letras del CAPTCHA. Puede descargar fuentes TrueType gratuitas desde sitios web como `https://www.1001fonts.com/`.

**Reiniciar Apache2:**

```bash
sudo systemctl restart apache2
```

**Solución de problemas:**

Si aún no puede ver las imágenes CAPTCHA, consulte los siguientes consejos:

Asegúrese de que el archivo captcha.ttf existe y esté importado en el lugar correcto.
Verifique los permisos del archivo captcha.ttf. El archivo debe ser legible por el usuario y el grupo de Apache.
Verifique los registros de error de Apache2 para ver si hay algún error relacionado con el CAPTCHA.

**Recursos adicionales:**

https://askubuntu.com/questions/950146/cant-access-some-websites-always-asks-for-recaptcha
https://stackoverflow.com/questions/32410551/create-image-captcha-with-php

**Consejos adicionales:**

Es probable que necesite una biblioteca CAPTCHA dedicada a PHP para manejar la generación, validación e integración de CAPTCHAs con sus formularios.

Algunas opciones populares incluyen:

SimpleImage: `https://www.simpleimage.com/` (ligero, generación básica de CAPTCHA)
TextCaptcha: `https://github.com/topics/text-captcha` (CAPTCHAs personalizables basados en texto)
Captcha-PHP: `https://github.com/topics/php-captcha` (funciones más avanzadas)
Configuración de Apache: Una vez que haya elegido una biblioteca CAPTCHA, es posible que deba realizar ajustes en la configuración de Apache para habilitar el módulo y establecer las directivas necesarias. Consulte la documentación de la biblioteca elegida para obtener instrucciones específicas.


















