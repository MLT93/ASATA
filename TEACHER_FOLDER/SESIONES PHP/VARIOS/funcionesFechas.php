<?php

//obtener fecha actual como array
$fecha = getdate();
print_r ($fecha);
echo "<br/>";



//strtotime permite obtener el TIMESTAMP para un string que determine una fecha
//obtener fecha actual en TIMESTAMP
//numero de segundos desde el 1 de enero de 1970
echo $ahora = strtotime("now");echo "<br/>";

echo strtotime("10 September 1990");echo "<br/>";

echo $mañana = strtotime("+1 day");echo "<br/>";
echo ($mañana - $ahora)/(60*60*24);echo "<br/>";
echo "<br/>";
echo $semanaQueViene = strtotime("+1 week");echo "<br/>";
echo strtotime("next monday");echo "<br/>";
echo strtotime("last monday");echo "<br/>";
echo "<br/>";
echo strtotime("+1 week 2 days 4 hours 2 seconds");echo "<br/>";

//date puedo definir el formato de una fecha dandole el TIMESTAMP
echo date ("d-m-Y", $semanaQueViene);
echo "<br/>";

//22 Septiembre de 2024;
$timestamp1 =strtotime("22 September 2024");
$fecha1 = date("d F Y", $timestamp1);
echo $fecha1;echo "<br/>";

//30 Junio de 2024;
$timestamp2 =strtotime("30 June 2024");
$fecha2 = date("d F Y", $timestamp2);
echo $fecha2;echo "<br/>";


//checkdate me valida una fecha y me dice si es correcta
echo checkdate(12,5,2020);echo "<br/>";//devuelve true
echo checkdate(6,31,2020);echo "<br/>";//devuelve false


//mktime me permite crear una marca de tiempo TIMESTAMP pasandole los valores de h, m, s, ...
// hora, minuto, segundo, mes, dia, año
echo mktime(1,2,3,4,5,2006);echo "<br/>";
echo date("c",mktime(1,2,3,4,5,2006));echo "<br/>";


?>