<?php

// ? OPERADOR SWITCH (igual que JavaScript)
// ! ESTE OPERADOR EVALÚA SOLO EL VALOR DEL DATO

$weekDay = 4;
$msg = "";

// Domingo = 0
// Lunes = 1
// Martes = 2
// Miércoles = 3
// Jueves = 4
// Viernes = 5
// Sábado = 6


switch ($weekDay) {
  case 0:
    $msg = "Hoy es Domingo";
    break;
  case 1:
    $msg = "Hoy es Lunes";
    break;
  case 2:
    $msg = "Hoy es Martes";
    break;
  case 3:
    $msg = "Hoy es Miércoles";
    break;
  case 4:
    $msg = "Hoy es Jueves";
    break;
  case 5:
    $msg = "Hoy es Viernes";
    break;
  case 6:
    $msg = "Hoy es Sábado";
    break;
  default:
    $msg = "El día es incorrecto";
    break;
}
