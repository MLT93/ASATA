<?php

// Operadores de asignación

$n1 = 5;
echo $n1;
echo "<br/>";

// Operador para sumar

$n1 += 3; // Actualizar la variable `$n1` sumándole 3
echo $n1;
echo "<br/>";

// Operador para restar

$n1 -= 5; // Actualizar la variable `$n1` restando 5
echo $n1;
echo "<br/>";

// Operador resto

$n1 %= 2; // Actualizar la variable `$n1` realizando el módulo con 2
echo $n1;
echo "<br/>";

// Operadores aritméticos

$num1 = 6; // Actualizar la variable `$n1` sumándole 3
$num2 = 8; // Actualizar la variable `$n1` sumándole 3

$total1 = $num1 + $num2;
$total2 = $num1 - $num2;
$total3 = $num1 * $num2;
$total4 = $num1 / $num2;
$total5 = $num1 % $num2;

$total6 = ($num1 + $num2) * $num1;

echo $total1 . "<br/>";
echo $total2 . "<br/>";
echo $total3 . "<br/>";
echo $total4 . "<br/>";
echo $total5 . "<br/>";
echo $total6 . "<br/>";

// Operador incremento y decremento

echo ++$num1 . "<br/>"; // En JavaScript lo pone al final, aquí al inicio
echo --$num2 . "<br/>"; // Actualiza el valor de la variable original
