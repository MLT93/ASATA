<?php

// ? FUNCIONES ESPECÍFICAS PARA OPERAR CON FECHAS

// `getdate()` obtiene la fecha actual como un array
$fecha = getdate();
print_r($fecha) . "<br/>"; //=> Array ( [seconds] => 37 [minutes] => 45 [hours] => 13 [mday] => 22 [wday] => 1 [mon] => 4 [year] => 2024 [yday] => 112 [weekday] => Monday [month] => April [0] => 1713786337 )
echo "<br/>";

// `strtotime()` obtiene el "timestamp" en segundos 
echo strtotime("20 May 1993") . "<br/>"; //=> 737848800
echo $now = strtotime("now") . "<br/>"; //=> 1713786385
echo $tomorrow = strtotime("+1 day") . "<br/>"; //=> 1713872785
echo ((intval($tomorrow) - intval($now)) / (60 * 60 * 24)) . "<br/>"; //=> 1
echo $nextWeek = strtotime("+1 week") . "<br/>"; //=> 1714391598
echo $nextMonday = strtotime("next Monday") . "<br/>"; //=> 1714341600
echo $lastMonday = strtotime("last Monday") . "<br/>"; //=> 1713132000
echo strtotime("+1 week 2 days 4 hours 2 seconds") . "<br/>"; //=> 1713132000

// `date()` permite definir el formato. Tiene 2 argumentos
// 1 formato
// 2 timestamp de la fecha requerida en formato de integer
echo date("d-m-y", intval($nextWeek)) . "<br/>";
echo $timeStamp1 = strtotime("22 September 2024") . "<br/>";
echo $date = date("d/m/y", intval($timeStamp1)) . "<br/>";

// `checkdate()` valida una fecha y me dice si es correcta. Devuelve true (1) o false (0)
// la fecha se pasa como DD-MM-AAAA
echo checkdate(12, 5, 2020) . "<br/>"; //=> 1
echo checkdate(12, 32, 2020) . "<br/>"; //=> 0

// `mktime()` permite crear una marca de tiempo (timestamp) pasándole los valores de hour, min, secs, month, days, years
// hora, minuto, segundo, mes, día, año
echo mktime(1, 2, 3, 4, 5, 2006) . "<br/>"; //=> 1144191723
echo date("c", mktime(1, 2, 3, 4, 5, 2006)) . "<br/>"; //=> 2006-04-05T01:02:03+02:00
