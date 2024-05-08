<?php
//ejc 01
$ahora = strtotime("now");
$hora = date("G", $ahora);

$hora = date("G");

if ($hora >= 8 && $hora < 14) {
 $mensaje = "Buenos días";
}
if ($hora >= 14 && $hora < 21) {
 $mensaje = "Buenas tardes";
} 
else {
 $mensaje = "Buenas noches";
}
echo $mensaje;
echo "<br/>";

//ejc 02
// $dia = date('j', $ahora);
$dia = date('j');

if ($dia <= 10) {
    $mensaje = "Periodo de pago activo";
} else {
    $mensaje = "Fuera del periodo de pago";
}

echo $mensaje;
echo "<br/>";


echo "Dia ";echo date("Y-F---j");

?>