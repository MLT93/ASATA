<?php

// ? OPERADOR FOR (igual que JavaScript)
// Ejecuta el código un determinado número de veces

$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 5, 0, 5, -1, 4, 5, 6, 6, 74, 6];

// `count()` sirve para contar la cantidad de elementos dentro de un objeto iterable. Como `length` en JavaScript
for ($i = 0; $i < count($array); $i++) {
  echo "$array[$i]";
  echo "<br/>";
}
