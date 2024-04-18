<?php

$numeromayor = 9;
$numeromenor = 3;

//enteros
echo $numeromenor <=> $numeromayor;
// si el numero de la IZQ es menor que el numero de la DCH --->  -1
echo $numeromayor <=> $numeromenor;
// si el numero de la IZQ es mayor que el numero de la DCH --->  1
echo $numeromayor <=> $numeromayor;
// si el numero de la IZQ es igual que el numero de la DCH --->  0

echo"<br/>";

$decmayor = 2.6;
$decmenor = 0.3;

//decimales
echo $decmenor <=> $decmayor;
echo $decmayor <=> $decmenor;
echo $decmayor <=> $decmayor;

echo"<br/>";
//textos
 
$cadena1 = "zanahoria";
$cadena2 = "lechuga";


echo $cadena1 <=> $cadena2;// si la palabra de la IZQ esta por orden alafabetico despues de la palabra de la DCH ----> 1
echo $cadena2 <=> $cadena1;// si la palabra de la IZQ esta por orden alafabetico antes de la palabra de la DCH ----> -1
echo $cadena1 <=> $cadena1;
?>