<?php

// ? OPERADOR MATCH
// ! ESTE OPERADOR EVALÚA EL VALOR Y EL TIPO DE DATO

$weekDay = 7;
$msg = "";

// Domingo = 0
// Lunes = 1
// Martes = 2
// Miércoles = 3
// Jueves = 4
// Viernes = 5
// Sábado = 6


match ($weekDay) {
  0 => $msg = "Hoy es Domingo",
  1 => $msg = "Hoy es Lunes",
  2 => $msg = "Hoy es Martes",
  3 => $msg = "Hoy es Miércoles",
  4 => $msg = "Hoy es Jueves",
  5 => $msg = "Hoy es Viernes",
  6 => $msg = "Hoy es Sábado",

  default => "El día de la semana no es correcto",
};

echo $msg;
