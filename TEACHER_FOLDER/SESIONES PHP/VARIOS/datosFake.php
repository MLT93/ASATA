<?php

require_once("../vendor/autoload.php");

use Faker\Factory as Factory;

$faker = Factory::create();

//nombre fake
echo $faker->name();echo"</br>";
echo $faker->name();echo"</br>";
echo $faker->name();echo"</br>";

echo $faker->email();echo"</br>";
echo $faker->text();echo"</br>";


$valores = [];
for($i=0; $i<20; $i++){
    array_push($valores, $faker->randomDigitNotZero()  );
}
print_r($valores);echo"</br>";

//ejemplo para obtener valores ocn distinta probabilidad
//un numero decimal

echo $faker->optional(0.5)->randomDigit();echo"</br>"; //50% probabilidad de que me devuelva NULL y 50% que devuelva un numero (incluido el cero)

//numeros enteros
echo $faker->optional(10)->randomDigit();echo"</br>";  // 90% probabilidad de obtrener NULL
echo $faker->optional(90)->randomDigit();echo"</br>"; // 10% probabilidad de obtrener NULL




?>