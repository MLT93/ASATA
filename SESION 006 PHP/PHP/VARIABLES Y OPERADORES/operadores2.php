<?php
// ? OPERADOR NAVE ESPACIAL (parecido a sort() en JavaScript)

// Este operador compara los dos valores
// Si son iguales, devuelve 0
// Si el número de la IZQ es menor que el de la DCHA, devuelve -1
// Si el número de la IZQ es mayor que el de la DCHA, devuelve 1

$numeroMayor = 9;
$numeroMenor = 3;

echo $numeroMayor <=> $numeroMayor; //=> 0
echo "<br/>";
echo $numeroMenor <=> $numeroMayor; //=> -1
echo "<br/>";
echo $numeroMayor <=> $numeroMenor; //=> 1
echo "<br/>";

echo "<hr/>";

// Este operador compara los dos valores
// Si son iguales, devuelve 0
// Si el número de la IZQ es menor que el de la DCHA, devuelve -1
// Si el número de la IZQ es mayor que el de la DCHA, devuelve 1

$decimalMayor = 2.6;
$decimalMenor = 1.2;

echo $decimalMayor <=> $decimalMayor; //=> 0
echo "<br/>";
echo $decimalMenor <=> $decimalMayor; //=> -1
echo "<br/>";
echo $decimalMayor <=> $decimalMenor; //=> 1
echo "<br/>";

echo "<hr/>";

// Este operador compara los dos valores
// Si son iguales, devuelve 0
// Si la palabra de la IZQ en orden alfabético está antes de la palabra a la DCHA, devuelve -1
// Si la palabra de la IZQ en orden alfabético está después de la palabra a la DCHA, devuelve -1

$alfabetoMayor = "zanahoria";
$alfabetoMenor = "lechuga";

echo $alfabetoMayor <=> $alfabetoMayor; //=> 0
echo "<br/>";
echo $alfabetoMenor <=> $alfabetoMayor; //=> -1
echo "<br/>";
echo $alfabetoMayor <=> $alfabetoMenor; //=> 1
echo "<br/>";

echo "<hr/>";


?>
