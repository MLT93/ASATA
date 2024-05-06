<?php

// * EJERCICIO 1

$currentHour = getdate();
$hour = date("G", intval($currentHour));
$hour = date("G");
$msg = "";

if ($hour >= 8 && $hour < 14) {
  $msg = "Buenos días";
};

if ($hour >= 14 && $hour < 20) {
  $msg = "Buenas tardes";
} else {
  $msg = "Buenas noches";
}

echo $msg . "<br/>";

// * EJERCICIO 2

$day = date("j");
if ($day <= 10) {
  $msg = "Periodo de pago activo";
} else {
  $msg = "Fuera del periodo de pago";
}

echo $msg . "<br/>";
