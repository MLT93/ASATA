<?php

require_once("../../vendor/autoload.php");

use Faker\Factory;

$faker = Factory::create();

// nombres fake
echo $faker->name() . "<br/>";
echo $faker->name() . "<br/>";
echo $faker->name() . "<br/>";

// emails fake
echo $faker->email() . "<br/>";

// texto fake
echo $faker->text() . "<br/>";


// valores aleatorios y únicos
$valores = [];
for ($i = 0; $i < 20; $i++) {
  array_push($valores, $faker->unique($reset = true)->randomDigitNotNull());
}
print_r($valores) . "<br/>";

// conseguir un valor con distinta probabilidad de obtención
// se le especifica el "peso" (la probabilidad de salida)
echo $faker->optional(0.5)->randomDigit() . "<br/>"; // 50% de probabilidad de que devuelva `null`
echo $faker->optional(10)->randomDigit() . "<br/>"; // 90% de probabilidad de que devuelva `null`
echo $faker->optional(90)->randomDigit() . "<br/>"; // 10% de probabilidad de que devuelva `null`


// conseguir valores random `null` y con un valor predefinido
echo $faker->optional()->passthrough(rand(1, 99)) ."<br/>";

// valores solo random y definidos siempre
echo $faker->passthrough(rand(1, 99)) ."<br/>";
