<?php

header("Content-type:image/png");
//voy establecer las dimensiones de la imagen
$miimagen = imagecreate(200,200);//ancho x alto
//creamos un color para la imagen
$colorFondoMorado = imagecolorallocate($miimagen,100,0,100);
$colorBlanco = imagecolorallocate($miimagen,255,255,255);
$colorAmarillo = imagecolorallocate($miimagen,255,255,0);
$colorazul = imagecolorallocate($miimagen,0,0,255);
$verde = imagecolorallocate($miimagen,0,255,0);

// con ese color de fondo
imagefill($miimagen,0,0,$colorFondoMorado);
//creo un rectangulo, solo los bordes
imagerectangle($miimagen,10,10,190,190,$colorBlanco);
//creo un rectangulo relleno de color
imagefilledrectangle($miimagen,11,11,189,189,$colorAmarillo);
//creo un array con los vertices de mi poligono
//cada vertice tiene 2 coordenadas x e y
//por lo tanto el número de elementos del array sera el doble que el de vertices.
$diamante = array(20,100,100,180,180,100,100,20);
imagefilledpolygon($miimagen,$diamante,4,$colorFondoMorado);
imagearc($miimagen,100,100,50,50,30,270,$colorazul);
imageellipse($miimagen,100,50,10,20,$colorAmarillo);

imageline($miimagen,20,20,150,180,$verde);
imagecolortransparent($miimagen,$colorAmarillo);


$texto = "texto captcha";
imagettftext($miimagen,40,0,50,50,$verde,"./Roboto/Roboto-Black.ttf",$texto);

// imagettftext(
//     GdImage $image,
//     float $size,
//     float $angle,
//     int $x,
//     int $y,
//     int $color,
//     string $font_filename,
//     string $text,
//     array $options = []
// ): array|false


//muestro la imagen
imagepng($miimagen);
//eliminar de la memoria una vez creada
imagedestroy($miimagen);

?>