<?php

// ! Si el captcha no se ve en la página, dentro del archivo `php.ini` (en la carpeta php), descomentar esto `extension=gd` para poder verlo en la página web

//iniciar una sesión
session_start();

header("Content-type:image/jpeg");

//creo al imagen
$ancho = 300;
$alto = 50;
$captcha = imagecreate($ancho,$alto);

//defino unos colores
$gris =imagecolorallocate($captcha,200,200,200);
$amarillo =imagecolorallocate($captcha,255,255,0);
$rojo =imagecolorallocate($captcha,200,10,0);

//relleno la imagen con un color
imagefill($captcha,0,0,$gris);

$caracteresUsados ="abcdefghijoklmnopqrstuvwxyzABCDEFGHAIJOKLMNOPQRSTUVWXYZ0123456789";
$longCaptcha = 2;
$textoCaptcha = substr(str_shuffle($caracteresUsados),0,$longCaptcha);

//creao una variable de session donde guardo el valor textual del captcha
$_SESSION['captcha']=$textoCaptcha;

//creo una texto y lo convierto en imagen 
imagettftext($captcha,25,0,5,35,$rojo,"../fonts/Jersey20Charted-Regular.ttf",$textoCaptcha);

//añadir ruido a la imagen
$nLineas = 5;
for($i=0;$i<=$nLineas;$i++){
    $x1 = rand(0,$ancho);
    $y1 = rand(0,$alto);
    $x2 = rand(0,$ancho);
    $y2 = rand(0,$alto);

    imageline($captcha,$x1,$y1,$x2,$y2,$amarillo);
}

imagejpeg($captcha);
imagedestroy($captcha);

?>
