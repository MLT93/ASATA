<?php

// ? MÉTODOS ARRAY parecidos a JavaScript

/**
 * 
 * * TRANSFORMAN EL ARRAY
 * 
 */

// ? `ARRAY_PUSH()` AÑADIR AL FINAL
// 1 El array
// 2 Los elementos a agregar. Añade todos los elementos tal y como se escriben en los argumentos
$frutas = ["plátano", " fresas", "naranjas"];
array_push($frutas, "cerezas", "limón"); //=> ["plátano", " fresas", "naranjas", "cerezas", "limón"]

echo "<hr/>";

// ? `ARRAY_UNSHIFT()` AÑADIR AL INICIO
// 1 El array
// 2 Los elementos a agregar. Añade todos los elementos tal y como se escriben en los argumentos
$colors = ["red", "grey"];
array_unshift($colors, "blue", "violet"); //=> ["blue", "violet", "red", "grey"]

echo "<hr/>";

// ? `ARRAY_POP()` ELIMINA EL ÚLTIMO ELEMENTO Y LO DEVUELVE
// 1 El array
$names = ["Alice", "Bob", "Charlie"];
$lastElementDeleted = array_pop($names); //=> "Charlie"

echo "<hr/>";

// ? `ARRAY_SHIFT()` ELIMINA EL PRIMER ELEMENTO Y LO DEVUELVE
// 1 El array
$numbers = [1, 2, 3, 4, 5];
$firstElementDeleted = array_shift($numbers); //=> 1

echo "<hr/>";

// ? `ARRAY_SPLICE()` ELIMINA Y AGREGA. DEVUELVE LOS ELEMENTOS BORRADOS
// 1 El array
// 2 Indice de inicio (offset) inclusive
// 3 Contador de elementos a borrar (length). El contador empieza desde el offset
// 4 Array de elementos a agregar. Al pasarle otro array no crea una matriz, tranquilo
$chemicalElements = ["Hydrogen", "Oxygen", "Helium"];
array_splice($chemicalElements, 1, 2, ["Carbon", "Nitrogen"]); //=> ["Hydrogen", "Carbon", "Nitrogen"]

echo "<hr/>";

// ? `SORT()` ORDENA EL ARRAY EN ORDEN CRECIENTE
// 1 El array
$nums = [5, 8, 8, 1, 2, 3];
sort($nums);

echo "<hr/>";

// ? `RSORT()` ORDENA EL ARRAY EN ORDEN DECRECIENTE
// 1 El array
$nums2 = [15, 8, 5, 89, 2, 3];
rsort($nums2);

echo "<hr/>";

// ? `ASORT()` ORDENA LOS VALORES DEL ARRAY ASOCIATIVO EN ORDEN CRECIENTE Y MANTIENE LA RELACIÓN `KEY => VALUE`
// 1 El array
$edades = [
  "Pedro" => 32,
  "María" => 22,
  "John" => 31,
  "Lucas" => 12,
];
asort($edades);

echo "<hr/>";

// ? `ARSORT()` ORDENA LOS VALORES DEL ARRAY ASOCIATIVO EN ORDEN DECRECIENTE Y MANTIENE LA RELACIÓN `KEY => VALUE`
// 1 El array
$edades = [
  "Pedro" => 32,
  "María" => 22,
  "John" => 31,
  "Lucas" => 12,
];
arsort($edades);

echo "<hr/>";

/**
 * 
 * * NO TRANSFORMAN EL ARRAY
 * 
 */

echo "<hr/>";

// ? `ARRAY_SLICE()` RECORTA UN TROZO DEL ARRAY Y DEVUELVE ESE TROZO
// 1 El array
// 2 Indice de inicio (offset) inclusive
// 3 Indice de salida (length) inclusive. Para el recorte empieza desde el offset y termina en el length. Si se omite, recorta desde el índice de entrada hasta el final del array
$integers = [1, 21, 3, 7];
$slicedIntegers = array_slice($integers, 2, 3); //=> [3, 7]
print_r($slicedIntegers);

echo "<hr/>";

// ? `ARRAY_MERGE()` DEVUELVE UNA CONCATENACIÓN DE ARRAYS
// 1 El array
// 2 El array a concatenar
$domestic = ["Cat", "Dog"];
$wild = ["Tiger", "Lion"];
$animals = array_merge($domestic, $wild); //=> ["Cat", "Dog", "Tiger", "Lion"]

echo "<hr/>";

// ? `ARRAY_DIFF()` TOMA EL PRIMER ARRAY Y LE QUITA LOS ELEMENTOS QUE SEAN IGUALES EN EL SEGUNDO ARRAY. DEVUELVE LA DIFERENCIA RESTANTE DEL PRIMER ARRAY
// 1 El array
// 2 El array a comparar
$letters1 = ["a", "b", "c", "d"];
$letters2 = ["b", "d", "j"];
$differenceBetween = array_diff($letters1, $letters2); //=> ["a", "c"]

echo "<hr/>";

// ? `ARRAY_SEARCH()` BUSCA UN ELEMENTO Y DEVUELVE SU INDICE (indexOf() en JavaScript)
// 1 Elemento buscado
// 2 El array
$cities = ["Gijón", "Oviedo", "Mieres"];
$indexOf = array_search("Oviedo", $cities); //=> 1

echo "<hr/>";

// ? `ARRAY_MAP()` MAPEA EL ARRAY Y A CADA ELEMENTO LE APLICA UNA FUNCIÓN
// 1 La función que viene pasada como CALLBACK en formato string sin paréntesis. No hace falta pasarle argumentos (si los necesitara) porque automáticamente los toma del array
// 2 El array a recorrer
// 3 Otro array con los elementos que quiera agregar a cada elemento donde se aplica la función. Debe tener la misma longitud del que se itera
/* Puedo crear mi propia función custom para que ejecute código en todo el array */
$professions = ["Doctor", "Cook", "Lawyer"];
function concatWord($word, $number)
{
  return "LA PALABRA: " . $word . " $number";
};
$newArrayWithConcatWords = array_map("concatWord", $professions, [22, 32, 34]); //=> ["LA PALABRA: Doctor 22", "LA PALABRA: Cook 32", "LA PALABRA: Lawyer 34"]

// ? `STRLEN()` CUENTA LA LONGITUD DE CARACTERES EN UN STRING
// 1 El array
$newArrayWithStringLengths = array_map("strlen", $professions); //=> [6, 4, 6]

echo "<hr/>";

// ? `COUNT()` CUENTA EL NÚMERO DE ELEMENTOS EN UN ARRAY
// 1 El array
$directions = ["left", "right", "up", "down"];
count($directions); //=> 4

echo "<hr/>";

// ? `ARRAY_REVERSE()` DEVUELVE UN ARRAY CON EL ORDEN INVERTIDO
// 1 El array
$prices = [23, 52, 66, 99];
$reversedPrices = array_reverse($prices); //=> [99, 66, 52, 23]

echo "<hr/>";

// ? `ARRAY_KEY_EXISTS()` COMPRUEBA SI UNA CLAVE (KEY) EXISTE EN UN INDICE ASOCIATIVO. DEVUELVE TRUE (1) O FALSE (0)
// 1 La clave buscada
// 1 El array
$userDetails = ["id" => "89", "nickname" => "pon23", "age" => 34];

$keyExist = array_key_exists("age", $userDetails); //=> 1
$keyNoExist = array_key_exists("aged", $userDetails); //=> 0

echo "<hr/>";

// ? `IMPLODE()` CONCATENA LOS ELEMENTOS DE UN ARRAY, Y DEVUELVE UN STRING USANDO EL SEPARADOR QUE YO QUIERA (join() en JavaScript)
// 1 Separador
// 1 El array
$list = ["calle", "avenida", "plaza", "camino"];
$listString = implode(", ", $list); //=> calle, avenida, plaza, camino

echo "<hr/>";

// ? `IN_ARRAY()` DETERMINA SI EXISTE O NO UN DETERMINADO ELEMENTO EN EL ARRAY. DEVUELVE TRUE (1) O FALSE (0)
// 1 El elemento
// 1 El array
$apellidos = ["Dal Col", "Benigni", "Suárez", "Gómez"];
$existInArray = in_array("Benigni", $apellidos); //=> 1
$existInArray = in_array("Gentile", $apellidos); //=> 0
$existInArray ? "Está" : "No está";

echo "<hr/>";
