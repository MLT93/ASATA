<?php

// ? ARRAYS

// Creación de arrays
$users = array("Antonio", "Pedro", "Lucia", "Juan"); // Con constructor `array()`
$usuarios = ["Antonio", "Pedro", "Lucia", "Juan"]; // Con corchetes `[]`

print_r($usuarios);

echo "<hr/>";

// Si añado un índice que no existe, lo incluye en el array aunque se salte otros índices
// No asigna automáticamente los índices como en JavaScript
$usuarios[5] = "Miguel";
$usuarios[27] = "Rosa";

print_r($usuarios);

echo "<hr/>";

// Sobrescribir un elemento
$usuarios[2] = "Francisco";

print_r($usuarios);

echo "<hr/>";

// Elimina el elemento del array
unset($usuarios[2]);

print_r($usuarios);

echo "<hr/>";


// * EJERCICIOS

// 10-1. Definir un array que contenga los nombres de los días de la semana. Mostrar el primer nombre y el último elemento.

$arrWeekDays = ["Lun", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom"];

echo $arrWeekDays[0]; // `echo` muestra valores alfanuméricos
echo "<br/>";
print_r($arrWeekDays[count($arrWeekDays) - 1]); // `print_r()` muestra todos los valors

echo "<hr/>";

// 10-2. Crear un array compuesto por treinta números distintos, que serán las ventas diarias de nuestra tienda. A partir de estos datos, calcular el promedio de ventas y mostralo por pantalla. Puedes usar un bucle "For" para ayudarte en la suma

$numArray = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30];

$accumulator = 0;
$result = 0;
for ($i = 0; $i < count($numArray); $i++) {
  $accumulator += $numArray[$i];
  $result = $accumulator / count($numArray);
}

echo "Promedio: $result";
echo "<hr/>";

// ? ARRAY ASOCIATIVO

// En este caso el índice será una cadena de texto
// Igual que cuando 
$notas["Juan"] = 6;
$notas["Pedro"] = 5;
$notas["Antonio"] = 9;

print_r($notas);

echo "<hr/>";

// * EJERCICIOS

// 10-4. Crea un array asociativo en el que se guarden las contraseñas de cinco usuarios. Muestra las contraseñas accediendo a través del nombre

$pass["Alberto"] = 123;
$pass["Juan"] = 328;
$pass["Rosa"] = 151;
$pass["Julian"] = 828;

print_r($pass);
echo "<br/>";
print_r("La contraseña de Alberto es: " . $pass["Alberto"]);

echo "<hr/>";

// ? MATRIZ | MATRIX (Array de arrays)

// Matriz
// La forma de declararlo puede ser con constructor o no
$persons = [
  [
    "Juan",
    "Martínez",
    "López"
  ],
  [
    "Ana",
    "López",
    "López"
  ],
];

// Acceder al apellido 1 de la persona 1
echo $persons[0][1];
echo "<br/>";

// Matriz asociativa clave (key) => valor (value)
$personas = array(
  array(
    "nombre" => "Juan",
    "apellido1" => "Martínez",
    "apellido2" => "López"
  ),
  array(
    "nombre" => "Ana",
    "apellido1" => "López",
    "apellido2" => "López"
  ),
);

// Acceder al apellido 2 de la persona 1 en Matrix asociativa
echo $personas[0]["apellido2"];
echo "<br/>";

echo "<hr/>";

// ? FOREACH (método array) parecido al de JavaScript

/** Sintaxis general (se puede utilizar para todos los tipos de arrays, simplemente habrá partes que se utilizarán y otras que no, dependiendo del caso)
 * 
 * foreach ($variable as $key => $value) {
 *   # code...
 * }
 * 
 */

// Sintaxis común para índices numéricos
$numbers =  [1, 2, 3, 4, 5];

foreach ($numbers as $value) {
  echo $value . ", ";
}

echo "<br/>";
echo "<br/>";

// Sintaxis común para índices asociativos
$arrAsociativo = [
  "nombre" => "Juan",
  "apellido1" => "Martínez",
  "apellido2" => "López"
];

foreach ($arrAsociativo as $key => $value) {
  print_r($value);
  echo "<br/>";
}

echo "<br/>";

// Sintaxis común para índice numérico y asociativo juntos
$matrixNombresApellidos = [
  [
    "nombre" => "Juan",
    "apellido1" => "Martínez",
    "apellido2" => "López"
  ],
  [
    "nombre" => "Ana",
    "apellido1" => "López",
    "apellido2" => "López"
  ],
];

foreach ($matrixNombresApellidos as $value) {
  print_r($value); // Al ser un array dentro de otro, debo utilizar `print_r()`
  echo "<br/>";

  foreach ($value as $key => $val) {
    echo $key . ": " . $val;
    echo "<br/>";
  }
}

echo "<br/>";

// * EJERCICIOS

// 10-5. Crear un array con 10 notas de evaluación, recorrerlo y calcular su promedio. En función de la nota, sacar en pantalla si está suspenso, aprobado, notable o sobresaliente

$evaluation = [8.1, 7.3, 5.4, 8, 7.4, 6.3, 7, 9.1, 4.7, 9.3];

$acc = 0;
$result = 0;
foreach ($evaluation as $key => $value) {
  $acc += $value; // 1ª opción
  /* $acc += $evaluation[$key]; */ // 2ª opción
  $result = $acc / count($evaluation);
}

echo "El promedio es: " . $result;
echo "<br/>";

if ($result >= 5 && $result < 7) {
  echo "Con un $result es aprobado";
} elseif ($result <= 9) {
  echo "Con un $result es notable";
} elseif ($result > 9) {
  echo "Con un $result es sobresaliente";
} else {
  echo "Con un $result es suspenso";
}
echo "<br/>";

echo "<br/>";

// 10-6. Crear una agenda de contactos en una matriz y recorrerla para mostrar todo su contenido con un "Foreach"

$agenda = [
  [
    "name" => "Pepe",
    "phone" => "603458935",
    "contact" => "pepe@example.com"
  ],
  [
    "name" => "Claudia",
    "phone" => "621465987",
    "contact" => "clau@example.com"
  ],
  [
    "name" => "Aron",
    "phone" => "645321875",
    "contact" => "aron@example.com"
  ],
];

// Itero el primer Array numérico
foreach ($agenda as $index => $element) {
  // Itero el segundo array asociativo
  foreach ($element as $key => $value) {
    echo "$key: $value, ";
  }
  echo "<br/>";
}

print_r($matrixValuesOfAgenda);
echo "<br/>";
print_r($titles);
