<?php

// ? ASIGNACIÓN

$n1 = 5;
echo $n1;
echo "<br/>";

// ? ACTUALIZACIÓN DE UNA VARIABLE CON UNA SUMA

$n1 += 3; // Actualizar la variable `$n1` sumándole 3
echo $n1;
echo "<br/>";

// ? ACTUALIZACIÓN DE UNA VARIABLE CON UNA RESTA

$n1 -= 5; // Actualizar la variable `$n1` restando 5
echo $n1;
echo "<br/>";

// ? RESTO O MÓDULO

$n1 %= 2; // Actualizar la variable `$n1` realizando el módulo con 2
echo $n1;
echo "<br/>";

// ? OPERADORES ARITMÉTICOS

$num1 = 6;
$num2 = 8;

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

// ? INCREMENTO Y DECREMENTO

echo ++$num1 . "<br/>"; // En JavaScript lo pone al final, aquí al inicio
echo --$num2 . "<br/>"; // Actualiza el valor de la variable original

// ? EXPONENTE

echo $num2**2 . "<br/>"; //=> 64

// ? OPERADORES LÓGICOS

$true = true;
$false = false;

// Si ambas son verdaderas
echo $true && $true; //=> 1

// Si al menos una es verdadera
echo $true || $false; //=> 1
