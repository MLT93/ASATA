<?php
// ? OPERADOR TERNARIO (igual que JavaScript)

$var1 = 3;
$var2 = 5;

$msg = "";

$var1 > $var2 ?  $msg = "$var1 es mayor que $var2" : $msg = "$var2 es mayor que $var1";

echo $msg;

echo "<br/>";

echo "<hr/>";

$palabra1 = "Lorem";
$palabra2 = "Ipsum";

$mensaje = "";

$palabra1 < $palabra2 ? $mensaje = "La primera palabra va en orden alfabético antes que la segunda" : $mensaje = "La primera palabra va en orden alfabético después que la segunda";

echo $mensaje;

echo "<br/>";

echo "<hr/>";
