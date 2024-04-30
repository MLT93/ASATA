<?php

// ? MÉTODOS ARRAY parecidos a JavaScript

/**
 * 
 * * TRANSFORMAN EL ARRAY
 * 
 */

// Añadir al final. Añade todo el grupo tal y como se escribió
$frutas = ["plátano", " fresas", "naranjas"];
array_push($frutas, "cerezas", "limón"); //=> ["plátano", " fresas", "naranjas", "cerezas", "limón"]

echo "<hr/>";

// Elimina el último del array y devuelve su valor
$names = ["Alice", "Bob", "Charlie"];
$lastElementDeleted = array_pop($names); //=> "Charlie"

echo "<hr/>";

// Elimina el primer elemento del array y devuelve su valor
$numbers = [1, 2, 3, 4, 5];
$firstElementDeleted = array_shift($numbers); //=> 1

echo "<hr/>";

// Añade valores al inicio del array. Añade todo el grupo tal y como se escribió
$colors = ["red", "grey"];
array_unshift($colors, "blue", "violet"); //=> ["blue", "violet", "red", "grey"]

echo "<hr/>";

// Elimina y agrega
$chemicalElements = ["Hydrogen", "Oxygen", "Helium"];
array_splice($chemicalElements, 1, 2, "Carbon"); //=> ["Hydrogen", "Carbon"]

echo "<hr/>";

// Ordena el array en orden creciente
$nums = [5, 8, 8, 1, 2, 3];
sort($nums);

echo "<hr/>";

// Ordena el array en orden decreciente
$nums2 = [15, 8, 5, 89, 2, 3];
rsort($nums2);

echo "<hr/>";

// Ordena las `values` del array asociativo en orden creciente y mantiene la relación `key => value`
$edades = [
  "Pedro" => 32,
  "María" => 22,
  "John" => 31,
  "Lucas" => 12,
];
asort($edades);

echo "<hr/>";

// Ordena las `values` del array asociativo en orden decreciente y mantiene la relación `key => value`
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

// Recorta un trozo del array y devuelve ese trozo. Primer índice (el offset -> índice de entrada) inclusive y el segundo (length -> índice de salida) inclusive
// Si se omite el tercer argumento, recorta desde el índice de entrada hasta el final del array
$integers = [1, 21, 3, 7];
$slicedIntegers = array_slice($integers, 2, 3); //=> [3, 7]
print_r($slicedIntegers);

echo "<hr/>";

// Concatena arrays
$domestic = ["Cat", "Dog"];
$wild = ["Tiger", "Lion"];
$animals = array_merge($domestic, $wild); //=> ["Cat", "Dog", "Tiger", "Lion"]

echo "<hr/>";

// Toma el primer array y le quita los elementos que sean iguales en el segundo array. Devuelve esa diferencia
$letters1 = ["a", "b", "c", "d"];
$letters2 = ["b", "d", "j"];
$differenceBetween = array_diff($letters1, $letters2); //=> ["a", "c"]

echo "<hr/>";

// Busca un elemento y devuelve su índice como `indexOf()` en JavaScript
$cities = ["Gijón", "Oviedo", "Mieres"];
$indexOf = array_search("Oviedo", $cities); //=> 1

echo "<hr/>";

// Mapea el array y a cada elemento le aplica una función. Recibe 3 argumentos
// 1 La función viene pasada como CALLBACK a través del primer argumento como un string. No hace falta pasarle argumentos (si los necesitara) porque automáticamente los toma del array
// 2 El array a recorrer
// 3 Otro array con los elementos que quiera agregar a cada elemento. Debe tener la misma longitud del que se itera
/* Puedo crear mi propia función custom para que ejecute código en todo el array */
$professions = ["Doctor", "Cook", "Lawyer"];
function concatWord($word, $number)
{
  return "LA PALABRA: " . $word . " $number";
};
$newArrayWithConcatWords = array_map("concatWord", $professions, [22, 32, 34]); //=> ["LA PALABRA: Doctor 22", "LA PALABRA: Cook 32", "LA PALABRA: Lawyer 34"]

// `strlen()` es el length para strings
$newArrayWithStringLengths = array_map("strlen", $professions); //=> [6, 4, 6]

echo "<hr/>";

// Cuenta la cantidad de elementos que haya dentro del array
$directions = ["left", "right", "up", "down"];
count($directions); //=> 4

echo "<hr/>";

// Devuelve un array con el orden invertido
$prices = [23, 52, 66, 99];
$reversedPrices = array_reverse($prices); //=> [99, 66, 52, 23]

echo "<hr/>";

// Saber si una clave (key) existe en un índice asociativo. Devuelve true (1) o false (0)
$userDetails = ["id" => "89", "nickname" => "pon23", "age" => 34];

$keyExist = array_key_exists("age", $userDetails); //=> 1
$keyNoExist = array_key_exists("aged", $userDetails); //=> 0

echo "<hr/>";

// Concatena los elementos del array en un string usando el separador que yo quiera. Como `join()` en JavaScript
$list = ["calle", "avenida", "plaza", "camino"];
$listString = implode(", ", $list); //=> calle, avenida, plaza, camino

echo "<hr/>";

// Determina si existe o no un determinado elemento en el array. Devuelve true (1) o false (0)
$apellidos = ["Dal Col", "Benigni", "Suárez", "Gómez"];
$existInArray = in_array("Benigni", $apellidos); //=> 1
$existInArray = in_array("Gentile", $apellidos); //=> 0
$existInArray ? "Está" : "No está";

echo "<hr/>";
