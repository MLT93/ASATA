<?php
// ! true = 1
// ! false = 0
// ! Recuerda que si es falso, al devolver 0 no se verá el resultado en pantalla

// ? VERIFICAR EXISTENCIA DEL PARÁMETRO Y BORRAR SU EXISTENCIA
$nombre = "Antonio";

// `isset()` verifica si el parámetro existe y posee un valor, devolviendo `1` o `0` (verdadero o falso)
if (isset($nombre)) {
  // `unset()` elimina el valor del parámetro
  echo "El nombre existe " . isset($nombre); //=> 1
  echo "<br/>";
}

unset($nombre);
echo "<br/>";

if (isset($nombre)) {
  echo "Sigue existiendo";
} else {
  echo "Ya no existe";
}

echo "<br/>";
echo "****************************************";
echo "<br/>";

$precioTotal = 80;
$precioIVA = $precioTotal * 1.21;
$respuesta = "El precio total de mi compra es:";
$productos = ["queso", "agua", "huevos", "azúcar"];

// ? COMPRUEBA EL TIPO DEL PARÁMETRO

// `is_integer()` verifica si es de tipo `Integer`
echo "El precio total es un 'Integer'? " . is_integer($precioTotal); //=> 1
echo "<br />";

// `is_double()` verifica si es de tipo `Double`. Este es un tipo decimal con más rango de decimales
echo "El precio IVA es un 'Double'? " . is_double($precioIVA); //=> 1
echo "<br />";

// `is_array()` verifica si el tipo de dato es `Array`
echo "El precio IVA es un 'Array'? " . is_array($precioIVA); //=> 0 (no se muestra)
echo "<br />";

// `is_string()` verifica si el tipo de dato es `String`
echo "El precio IVA es un 'String'? " . is_string($respuesta); //=> 1
echo "<br/>";

echo "<br/>";
echo "****************************************";
echo "<br/>";

// ? PARSEA EL TIPO DE DATO

$cadena = "200"; // Tipo string


echo "Es Integer? " . is_integer($cadena); //=> 0 (no se muestra)
echo "<br/>";

// `intval()` transforma el tipo a `Integer`
echo "Es Integer? " . is_integer(intval($cadena)); //=> 1
echo "<br/>";

// `floatval()` transforma el tipo a `Float`
echo "Es Double? " . is_double(floatval($cadena)); //=> 1
echo "<br/>";

// `strval()` transforma el tipo a `String`
echo "Es Double? " . is_double(strval($cadena)); //=> 0 (no se muestra)
echo "<br/>";

echo "<br/>";
echo "****************************************";
echo "<br/>";

// ? CREACIÓN DE VARIABLES CONSTANTES

// `define()` recibe dos parámetros. El nombre de la constante y su valor
define("IFCD0210", "Desarrollo Web");
define("numberPI", 3.141592);

echo numberPI; //=> 3.141592
echo "<br/>";

echo IFCD0210; //=> Desarrollo Web
echo "<br/>";

echo "<br/>";
echo "****************************************";
echo "<br/>";

// ? SABER SI UNA CONSTANTE ESTÁ DEFINIDA

// `defined()` comprueba si un nombre dado de una constante existe
echo defined("numberPI"); //=> 1
echo defined("numberE"); // => 0 (no se muestra)
