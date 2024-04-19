<?php

// ? IMPORTAR COSAS
// include("crear_tablas.php");

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

// ? GETDATE()

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
