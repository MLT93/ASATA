<?php

// ? OPERADOR WHILE (igual que JavaScript)
// "Pregunta y luego dispara"

$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 5, 0, 5, -1, 4, 5, 6, 6, 74, 6];

// `count()` sirve para contar la cantidad de elementos dentro de un objeto iterable. Como `length` en JavaScript
/* for ($i = 0; $i < count($array); $i++) {

  // ! AL SER LA PRIMERA ITERACIÓN DEL "FOR" SIEMPRE 1, CUMPLIRÁ LA CONDICIÓN DEL "WHILE"
  // ! GENERA UN BUCLE INFINITO
  // ! LA CONDICIÓN QUE SE EVALÚA DEBE CAMBIAR EN ALGÚN MOMENTO, SI NO, SE REALIZA UN BUCLE INFINITO POR ESO SE COMBINA CON "INPUTS"
  while ($array[$i] > 0) {
    echo "$array[$i]";
    echo "<br/>";
  }
} */

// FORMA DEL "WHILE" SIMILAR A UN "FOR"
$i = 0;
while ($i < 10) {
  echo "$i";
  echo "<br/>";
  $i++;
}


// EJEMPLOS

$i = 0;
$j = 0;

while ($i <= 10 && $j <= 10) {
  echo "$i | $j <br/>";
  $i++;
  $j += 2; // $j = $j + 2;
}
