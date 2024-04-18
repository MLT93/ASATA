<?php

// REALIZA UN MATCH QUE EMITA UN MENSAJE QUE, DEPENDIENDO DE LA CANTIDAD DE CAMAS REQUERIDAS, NOS MUESTRE LA DISPONIBILIDAD DEL HOTEL. EN EL HOTEL LA HABITACIÓN MÁS GRANDE POSEE 7 CAMAS

$numCamas = 3;

$habitGrande = "Esta es la habitación más grande";
$habitMediana = "Esta es la habitación mediana";
$habitPeque = "Esta es la habitación más pequeña";

$msg = "";
$msgError = "";

match ($numCamas) {
  1 => $msg = $habitPeque,
  2 => $msg = $habitPeque,
  3 => $msg = $habitPeque,
  4 => $msg = $habitPeque,
  5 => $msg = $habitMediana,
  6 => $msg = $habitMediana,
  7 => $msg = $habitGrande,
  default => $msgError = "No tenemos habitaciones con esa cantidad de camas",
};

echo $msg;
echo $msgError;
