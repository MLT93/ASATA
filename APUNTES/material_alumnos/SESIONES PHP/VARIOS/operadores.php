<?php

//operadores de asignación


$n1 = 5;
echo $n1;
echo "<br/>";

//operador para sumar
$n1 += 3;//actualizar la variable n1, sumandole 3
echo $n1;
echo "<br/>";

//operador para restar
$n1 -= 5;//actualizar la variable n1, resto 5
echo $n1;
echo "<br/>";

//operadore rsto
$n1%=2;
echo $n1;
echo "<br/>";

//operadores aritmeticos 

$num1 = 6;
$num2 = 8;

$total1 = $num1 + $num2 ;
$total2 = $num1 - $num2;
$total3 = $num1 * $num2;
$total4 = $num1 / $num2;
$total5 = $num1 % $num2;

$total6 = ($num1+$num2) * $num1;

echo $total1;echo "<br/>";
echo $total2;echo "<br/>";
echo $total3;echo "<br/>";
echo $total4;echo "<br/>";
echo $total5;echo "<br/>";
echo $total6;echo "<br/>";

// operador incremental
echo ++$num1;echo "<br/>";//actualiza la variable
echo   $num1; 

?>