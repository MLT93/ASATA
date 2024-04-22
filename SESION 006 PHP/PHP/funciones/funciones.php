<?php

// ? SIGUE EL MÉTODO DE JavaScript PARA FUNCS NORMALES

function cuadrado($num)
{
  echo "Esto en la función " . __FUNCTION__;
  echo "<br/>";
  return "El cuadrado de $num es: " . $num ** 2;
}

echo cuadrado(2);


// ? ORDENAR A TRAVÉS DE UNA COMPARACIÓN

function compare($a, $b)
{
  // A es menor que B según criterio de ordenamiento
  if ($a < $b) {
    return -1;
  }
  // A es mayor que B según criterio de ordenamiento
  if ($a > $b) {
    return 1;
  }
  // A es igual que B
  return 0;
}
