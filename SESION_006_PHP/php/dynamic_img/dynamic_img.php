<?php

// ToDo: terminar esto

// ? `HEADER()` ESTABLECE EL FORMATO DE LA IMAGEN EN EL ENCABEZADO
// `header("Content-type:image/jpeg")` establece el formato de imagen
header("Content-type: image/jpeg");

// ? `IMAGECREATE()`
// `` establece las dimensiones de la imagen. Recibe 2 parámetros
// 1 width
// 2 height
$myImg = imagecreate(200, 200);

// ? `IMAGECOLORALLOCATE()` PERMITE DAR UN COLOR DE FONDO A LA IMAGEN CREADA
// `` permite dar un color de fondo a la imagen que creamos
$VioletBackgroundColor = imagecolorallocate($myImg, 155, 0, 155);
$WhiteBackgroundColor = imagecolorallocate($myImg, 255, 255, 255);
$YellowBackgroundColor = imagecolorallocate($myImg, 255, 255, 0);
$BlueBackgroundColor = imagecolorallocate($myImg, 15, 15, 170);
$GreenBackgroundColor = imagecolorallocate($myImg, 70, 195, 70);

// ? ``
// ``
// 1 La imagen
// 2 Identificador creado con `imagecolorallocate()`
imagecolortransparent($myImg, $BlueBackgroundColor);

// ? `IMAGEFILL()` RELLENA LA IMAGEN
// `imagefill()` Recibe 4 parámetros
// 1 Imagen a rellenar
// 2 Coordenada X
// 3 Coordenada Y
// 4 Color
imagefill($myImg, 0, 0, $VioletBackgroundColor);

// ? `IMAGERECTANGLE()` CREA LOS BORDES DEL RECTÁNGULO
// `imagerectangle()` Recibe 4 parámetros
// 1 Coordenada X esquina superior Izq
// 2 Coordenada Y esquina superior Izq
// 3 Coordenada X esquina inferior Dcha
// 4 Coordenada Y esquina inferior Dcha
// 5 Color
imagerectangle($myImg, 10, 10, 190, 190, $WhiteBackgroundColor);

// ? `IMAGEFILLEDRECTANGLE()` RELLENA EL RECTÁNGULO
// `imagefilledrectangle()` Recibe 4 parámetros
// 1 Coordenada X esquina superior Izq
// 2 Coordenada Y esquina superior Izq
// 3 Coordenada X esquina inferior Dcha
// 4 Coordenada Y esquina inferior Dcha
// 5 Color
imagefilledrectangle($myImg, 11, 11, 189, 189, $VioletBackgroundColor);

// ? `IMAGEFILLEDPOLYGON()` RELLENA EL POLÍGONO
// `imagefilledpolygon()` Recibe 4 parámetros
// 1 Imagen
// 2 Array de Coordenadas
// 3 Número de vértices
// 4 Color. Por defecto es negro
$diamond = [20, 100, 100, 180, 180, 100, 100, 20]; // coordenadas X e Y de cada vértice
imagefilledpolygon($myImg, $diamond, 4, $GreenBackgroundColor);

// ? `IMAGEARC()` CREA UN ARCO
// `imagearc()` Recibe 4 parámetros
// 1 Imagen
// 2 Coordenadas X del Centro
// 3 Coordenadas Y del Centro
// 4 Width
// 5 Height
// 6 Inicio del ángulo en grados
// 7 Fin del del ángulo en grados
// 8 Color. Por defecto es negro
imagearc($myImg, 100, 100, 50, 50, 30, 270, $BlueBackgroundColor);

// ? `IMAGEELLIPSE()` CREA UN ARCO
// `imageellipse()` Recibe 4 parámetros
// 1 Imagen
// 2 Coordenadas X del Centro
// 3 Coordenadas Y del Centro
// 4 Width
// 5 Height
// 8 Color. Por defecto es negro
imageellipse($myImg, 100, 50, 10, 20, $YellowBackgroundColor);

// ? `IMAGELINE()` MUESTRA LA IMAGEN
// `imageline()`
// 1 La imagen
// 2 Coordenada X 1
// 3 Coordenada Y 1
// 4 Coordenada X 2
// 5 Coordenada Y 2
// 6 Color
imageline($myImg, 20, 20, 150, 150, $YellowBackgroundColor);

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
$text = "Example";
imagettftext($myImg, 40, 0, 50, 50, $GreenBackgroundColor, "./fonts/Jersey_25", $text);

// ? `IMAGEJPEG()` MUESTRA LA IMAGEN EN EL FORMATO JPEG
// ``
imagejpeg($myImg);

// ? `IMAGEPNG()` MUESTRA LA IMAGEN EN EL FORMATO PNG
// ``
imagepng($myImg);

// ? `IMAGEDESTROY()` ELIMINA DE LA MEMORIA DESPUÉS DE MOSTRAR LA IMG
// `` elimina la información de la memoria
imagedestroy($myImg);
