<!DOCTYPE html>
<html>

<head>

<meta charset ="utf-8">
<title>Ejemplo cookies</title>

</head>
<body>
<?php
setcookie("miprimeraCookie","Dario",time()+(3600*24*7),"/");
$texto = "texto de mi segunda cookie";

setcookie("misegundacookie",$texto,time()+(3600*2),"/");

?>


</body>


</html>



