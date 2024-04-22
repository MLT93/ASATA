<?php

// ? IMPORTAR COSAS
// include("funciones_de_tablas.php");

// ? TRANSFORMA NÚMEROS DE 1 DÍGITO A NÚMEROS DE DOS DÍGITOS
// NOS PUEDE SERVIR PARA ESCRIBIR UN FORMATO DE HORAS, SEGUNDOS Y MINUTOS QUE OCUPE SIEMPRE EL MISMO ESPACIO.

function twoDigit($num)
{
  if (!is_nan($num)) {
    $msg = "";

    $num < 10 ? $msg = "0$num" : $msg = "$num";

    return $msg;
  } else {
    echo "Tiene que escribir un número";
  }
}

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

echo "<hr/>";

$ahora = getdate();
print_r($ahora); //=> Array ( [seconds] => 53 [minutes] => 22 [hours] => 12 [mday] => 18 [wday] => 4 [mon] => 4 [year] => 2024 [yday] => 108 [weekday] => Thursday [month] => April [0] => 1713435773 )
echo "<hr />";

echo "Segundos: " . $ahora["seconds"];
echo "<hr />";

echo "Minutos: " . $ahora["minutes"];
echo "<hr />";

echo "Horas: " . $ahora["hours"];
echo "<hr />";

echo "Día en número: " . $ahora["mday"];
echo "<hr />";

echo "Número del día de la semana. Del 0 (domingo) al 6 (sábado): " . $ahora["wday"];
echo "<hr />";

echo "Mes en número: " .  $ahora["mon"];
echo "<hr />";

echo "Año en número: " . $ahora["year"];
echo "<hr />";

echo "Día del año: " . $ahora["yday"];
echo "<hr />";

echo "Día en texto: " . $ahora["weekday"];
echo "<hr />";

echo "Mes en texto: " . $ahora["month"];
echo "<hr />";

echo "Segundos desde el 1970: " . $ahora["0"];
echo "<hr />";

echo "Año " . $ahora["year"] . " de " . $ahora["month"] . " día " . $ahora["mday"];
echo "<hr/>";

// Vamos a devolver este formato => [2024-04-17] JUE 11:03:27
function miFecha($fecha)
{
  $year = twoDigit($fecha["year"]);
  $month = twoDigit($fecha["mon"]);
  $day = twoDigit($fecha["mday"]);

  $numWeakDay = $fecha["wday"];

  $hour = twoDigit($fecha["hours"]);
  $min = twoDigit($fecha["minutes"]);
  $sec = twoDigit($fecha["seconds"]);

  $msg = "";
  switch ($numWeakDay) {
    case 0:
      $msg = "DOM";
      break;
    case 1:
      $msg = "LUN";
      break;
    case 2:
      $msg = "MAR";
      break;
    case 3:
      $msg = "MIE";
      break;
    case 4:
      $msg = "JUE";
      break;
    case 5:
      $msg = "VIE";
      break;
    case 6:
      $msg = "SAB";
      break;

    default:
      # code...
      break;
  }

  return "[$year-$month-$day] $msg $hour:$min:$sec";
}

$result = getdate();
print_r(miFecha($result));
echo "<hr/>";

// Vamos a devolver este formato => Año 2024 de April día 18, Thursday a las 13 horas 29 minutos 59 segundos.
function miFechaTxt($fecha)
{
  $year = $fecha["year"];
  $month = $fecha["month"];
  $day = twoDigit($fecha["mday"]);

  $weekDay = $fecha["weekday"];

  $hour = twoDigit($fecha["hours"]);
  $min = twoDigit($fecha["minutes"]);
  $sec = twoDigit($fecha["seconds"]);

  return "Año " . $year . " de " . $month . " día " . $day . ", " . $weekDay . " a las " . $hour . " horas " . $min . " minutos y " . $sec . " segundos.";
}

$result2 = getdate();
print_r(miFechaTxt($result2));
echo "<hr/>";
