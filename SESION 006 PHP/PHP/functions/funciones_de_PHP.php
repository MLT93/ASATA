<?php

// ? FUNCIONES PROPIAS DE PHP PARA EVALUAR 

// ! RECUERDA QUE EN PHP TRUE Y FALSE SE EVALÚAN COMO 1 Y 0
// ! SI ES 1, SERÁ TRUE
// ! SI ES 0, SERÁ FALSE
// ! SI NO ESTÁ INICIALIZADO, SERÁ FALSE

$a = 5;
$b = 0;
$c;

// `empty()` devuelve true (1) o false (0)
// Una variable se considera vacía si no existe o si su valor es igual a false
echo 'empty($a) =>' . empty($a); //=> 0
echo "<br/>";
echo 'empty($b) =>' . empty($b); //=> 1
echo "<br/>";
echo 'empty($c) =>' . empty($c); //=> 1
echo "<br/>";
echo 'empty($d) =>' . empty($d); //=> 1
echo "<br/>";

echo "<hr/>";

// `isset()` devuelve true (1) o false (0)
// Determina si una variable está definida y no es `null`
echo 'isset($a) =>' . isset($a); //=> 1
echo "<br/>";
echo 'isset($b) =>' . isset($b); //=> 1
echo "<br/>";
echo 'isset($c) =>' . isset($c); //=> 0
echo "<br/>";
echo 'isset($d) =>' . isset($d); //=> 0
echo "<br/>";

echo "<hr/>";

// `is_null()` devuelve true (1) o false (0)
// Determina si una variable es `null`. Si no tiene valor, le asocia el `null` pero lanza un error
echo 'is_null($a) =>' . is_null($a); //=> 0
echo "<br/>";
echo 'is_null($b) =>' . is_null($b); //=> 0
echo "<br/>";
echo 'is_null($c) =>' . is_null($c); //=> devuelve error
echo "<br/>";
echo 'is_null($d) =>' . is_null($d); //=> devuelve error
echo "<br/>";

echo "<hr/>";

// `is_integer()` devuelve true (1) o false (0). Evalúa si es un entero o no
// `is_float()` devuelve true (1) o false (0). Evalúa si es decimal o no
// `is_numeric()` devuelve true (1) o false (0). Evalúa si es numérico o no
// `is_array()` devuelve true (1) o false (0). Evalúa si es array o no
// `is_string()` devuelve true (1) o false (0). Evalúa si una cadena de texto o no

$str = "Hola Mundo";
$int = 3;
$float = 3.4;
$array = ["hello", "world"];
$object = new stdClass();

echo 'is_integer($str) =>' . is_integer($str); //=> 
echo "<br/>";
echo 'is_float($str) =>' . is_float($str); //=> 
echo "<br/>";
echo 'is_numeric($str) =>' . is_numeric($str); //=> 
echo "<br/>";
echo 'is_array($str) =>' . is_array($str); //=> 
echo "<br/>";

echo 'is_integer($int) =>' . is_integer($int); //=> 
echo "<br/>";
echo 'is_integer($int) =>' . is_integer($int); //=> 
echo "<br/>";
echo 'is_integer($int) =>' . is_integer($int); //=> 
echo "<br/>";
echo 'is_integer($int) =>' . is_integer($int); //=> 
echo "<br/>";

echo 'is_integer($str) =>' . is_integer($str); //=> 
echo "<br/>";
echo 'is_integer($str) =>' . is_integer($str); //=> 
echo "<br/>";
echo 'is_integer($str) =>' . is_integer($str); //=> 
echo "<br/>";
echo 'is_integer($str) =>' . is_integer($str); //=> 
echo "<br/>";
