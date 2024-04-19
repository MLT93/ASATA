<?php

// ? OPERADOR DO-WHILE (igual que JavaScript)
// Ejecuta el código al menos una vez
// "Dispara y luego pregunta"

$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 5, 0, 5, -1, 4, 5, 6, 6, 74, 6];

// `count()` sirve para contar la cantidad de elementos dentro de un objeto iterable. Como `length` en JavaScript
/* for ($i = 0; $i < count($array); $i++) {

  // ! AL SER LA PRIMERA ITERACIÓN DEL "FOR" SIEMPRE 1, CUMPLIRÁ LA CONDICIÓN DEL "DO-WHILE"
  // ! GENERA UN BUCLE INFINITO
  // ! AL NO MODIFICAR EL CÓDIGO ANTES DE QUE PASE POR LA CONDICIÓN, VOLVERÁ A REPETIR LO MISMO
  do {
    echo "$array[$i]";
    echo "<br/>";
  } while ($array[$i] > 0);
} */

// EJEMPLOS

$i = 0;
$j = 0;

do {
  echo "$i | $j <br/>";
  $i++;
  $j += 2; // $j = $j + 2;

} while ($i <= 10 && $j <= 10);
