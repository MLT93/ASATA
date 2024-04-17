<?php

function cuadrado($num)
{
  echo "Esto en la función " . __FUNCTION__;
  echo "<br/>";
  return "El cuadrado de $num es: ". $num ** 2;
}

echo cuadrado(2);
