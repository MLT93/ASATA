<?php

// ? FUNCIONES QUE SE UTILIZAN CON STRINGS

$texto = "Lorem Ipsum";
$palabra = "algo";
$mensaje = "Esto es un mensaje";
$inputRegistro = "    mail@example.com         ";
$encadenado = "matemáticas, literatura, música, ciencias";
$textoUpperCase = "HELLO";
$textoLowerCase = "hello";

// `strlen()` longitud de la cadena de texto
echo strlen($texto) . "<br/>"; //=> 11
echo strlen($palabra) . "<br/>"; //=> 4
echo strlen($mensaje) . "<br/>"; //=> 18

// `substr()` devuelve parte de una cadena. Tiene 3 parámetros
// 1 La cadena de texto a evaluar
// 2 Índice de inicio
// 3 Cantidad de caracteres. Si se omite, recorta hasta el final
/* Para empezar desde el final, se cuenta en negativo */
echo substr($mensaje, 5) . "<br/>"; //=> es un mensaje
echo substr($mensaje, 5, 5) . "<br/>"; //=> es un
echo substr($mensaje, -13, 5) . "<br/>"; //=> es un
echo substr($mensaje, -7) . "<br/>"; //=> mensaje

// `trim()` elimina los espacios excedente al principio y al final de la cadena de texto
echo "'start'" . $inputRegistro . "'end'" . "<br/>"; //=> 'start' mail@example.com 'end'
echo "'start'" . trim($inputRegistro) . "'end'" . "<br/>"; //=> 'start'mail@example.com'end'

// `explode()` convierte la cadena de texto a un array quitando las separaciones
$arrEncadenado = explode(", ", $encadenado);
print_r($arrEncadenado) . "<br/>"; //=> ["matemáticas", "literatura", "música", "ciencias"]

// `strtolower()` convierte a minúsculas
echo strtolower($textoUpperCase) . "<br/>"; //=> hello

// `strtoupper()` convierte a mayúsculas
echo strtoupper($textoLowerCase) . "<br/>"; //=> HELLO

// `ucfirst()` convierte la primera letra en mayúsculas
echo ucfirst($palabra) . "<br/>"; //=> Algo

// `ucwords()`
echo ucwords($palabra) . "<br/>"; //=> Algo
