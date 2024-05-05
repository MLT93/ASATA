<?php
// ? `SESSION_START()` INICIA UNA SESIÓN PARA ALMACENAR EL TEXTO DEL CAPTCHA Y PODERLO COMPARAR POSTERIORMENTE CON EL TEXTO INTRODUCIDO POR EL USUARIO
// `session_start()` crea una sesión o reanuda la actual basada en un identificador de sesión pasado mediante una petición GET o POST, o pasado mediante una cookie. PHP llamará a los gestores de almacenamiento de sesiones open y read. La llamada de retorno read recuperará cualquier información se de sesión existente (almacenada en un formato serializado especial) y será deserializada y usada para rellenar automáticamente la variable superglobal `$_SESSION` cuando la llamada de retorno read devuelva la información de sesión guardada a la gestión de sesiones de PHP
session_start();

// ? `HEADER()` ESTABLECE EL FORMATO DE LA IMAGEN EN EL ENCABEZADO
// `header("Content-type:image/jpeg")` establece el formato de imagen
header("Content-type: image/jpeg");

// ? `IMAGECREATE()` CREA UNA IMAGEN. PUEDE SER UTILIZADA COMO UN BOX
// `imageCreate()` establece las dimensiones de la imagen. Recibe 2 parámetros
// 1 width
// 2 height
$widthBox = 150;
$heightBox = 50;
$boxCaptcha = imageCreate($widthBox, $heightBox);

// ? `IMAGECOLORALLOCATE()` PERMITE DAR UN COLOR DE FONDO A LA IMAGEN CREADA
// `imagecolorallocate()` permite dar un color de fondo a la imagen que creamos
$gray = imagecolorallocate($boxCaptcha, 200, 200, 200);
$yellow = imagecolorallocate($boxCaptcha, 255, 255, 0);
$red = imagecolorallocate($boxCaptcha, 200, 50, 0);

// ? `IMAGEFILL()` RELLENA LA IMAGEN
// `imagefill()` Recibe 4 parámetros
// 1 Imagen a rellenar
// 2 Coordenada X
// 3 Coordenada Y
// 4 Color
imagefill($boxCaptcha, 0, 0, $gray);

// ? `SUBSTR(STR_SHUFFLE($characters), start, end)` CON ESTO TOMAMOS UN RECORTE DE NUESTROS CARACTERES CON UNA LONGITUD DEFINIDA Y HACEMOS QUE ESOS CARACTERES TENGAN UN ORDEN ALEATORIO
// `substr(str_shuffle($textCharts), 0, 7)`
// `substr()` recorta una cadena. Recibe 3 parámetros
// 1 La cadena de texto principal
// 2 El índice del donde empieza el recorte (offset) inclusive
// 3 El fin del recorte (length) inclusive
// `str_shuffle()` reordena aleatoriamente una cadena. Recibe 1 parámetro, la cadena de texto a reordenar
$textCharts = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890123456789";
$aleatoryTextCaptcha = substr(str_shuffle($textCharts), 0, 7);

// ? `$_SESSION` ES LA VARIABLE GLOBAL PROPORCIONADA POR EL INICIO DE SESIÓN
// `$_SESSION` almacena la información de la sesión `["clave"]=valor`, accesible por cualquier lugar que reanude o cree esa sesión
// Igualo al valor del texto del captcha que deberá introducir el usuario, así podré acceder a esa información desde otras partes
$_SESSION["captcha"] = $aleatoryTextCaptcha;

// ? `IMAGETTFTEXT()` MUESTRA UN TEXTO IMAGEN
// `imagettftext()` Recibe 8 parámetros
// 1 La imagen
// 2 Tamaño
// 3 Ángulo de inclinación del texto
// 4 Coordenada X
// 5 Coordenada Y
// 6 Color
// 7 Acceso a un archivo con extensión .ttf
// 8 El texto
imagettftext($boxCaptcha, 21, 0, 28, 33, $red, "../../../fonts/Jersey25-Regular.ttf", $aleatoryTextCaptcha);

// ? `AÑADIR RUIDO AL CAPTCHA` PARA EVITAR QUE LOS BOTS PUEDAN ENTRAR
// `añadir ruido al captcha` nos sirve para crear distorsión en la imagen
$quantityOfLines = 21;
for ($i = 0; $i < $quantityOfLines; $i++) {
  // ? `RAND()` CREA VALORES ALEATORIOS ENTRE UN NÚMERO Y OTRO
  // `rand()` viene utilizado para crear valores aleatorios desde un mínimo, hasta un máximo. Tiene dos parámetros
  // 1 Número mínimo
  // 2 Número máximo
  // Creo variables aleatorias para obtener una coordenada desde el inicio del box donde voy a dibujar hasta su fin (que será el ancho o el alto máximo de ese mismo box)
  $x1 = rand(0, $widthBox);
  $y1 = rand(0, $heightBox);
  $x2 = rand(0, $widthBox);
  $y2 = rand(0, $heightBox);

  // ? `IMAGELINE()` CREA UNA LINEA
  // `imageline()` dibuja una línea entre dos puntos dados
  // 1 La imagen
  // 2 Coordenada X 1
  // 3 Coordenada Y 1
  // 4 Coordenada X 2
  // 5 Coordenada Y 2
  // 6 Color
  imageline($boxCaptcha, $x1, $y1, $x2, $y2, $yellow);
}

// ? `IMAGEJPEG()` MUESTRA LA IMAGEN EN EL FORMATO JPEG
// `imagejpeg()` crea un archivo JPEG desde la imagen. Exporta la imagen al navegador o a un fichero. Recibe 3 parámetros
// 1 La imagen a crear
// 2 La ruta donde guardar el fichero
// 3 Número del 0 al 100 que determina la calidad de la imagen. Por defecto es 75
imagejpeg($boxCaptcha);

// ? `IMAGEDESTROY()` ELIMINA DE LA MEMORIA DESPUÉS DE MOSTRAR LA IMG
// `imagedestroy()` elimina la información guardada en la memoria
imagedestroy($boxCaptcha);
