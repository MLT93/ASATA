<?php
include("../funciones/api.php");
include("../funciones/crear_tablas.php");

$URL1 = "https://www.freetogame.com/api/games?platform=pc";
$jsonPlaceHolder = GET($URL1);

// `print_r()` sirve para leer el `return` de una función
// print_r($jsonPlaceHolder);

/**
 * * ESTO ES LO QUE DEVUELVE:
 * 
 * Array ( 
 *   [0] => Array ( 
 *     [id] => 540 
 *     [title] => Overwatch 2 
 *     [thumbnail] =>  https://www.freetogame.com/g/540/thumbnail.jpg 
 *     [short_description] => A hero-focused first-person team shooter from Blizzard Entertainment
 *     [game_url] => https://www.freetogame.com/open/overwatch-2
 *     [genre] => Shooter 
 *     [platform] => PC (Windows) 
 *     [publisher] => Activision Blizzard
 *     [developer] => Blizzard Entertainment
 *     [release_date] => 2022-10-04
 *     [freetogame_profile_url] =>  https://www.freetogame.com/overwatch-2
 *   )
 * )
 * 
 */

$matrix = [];
for ($i = 0; $i < count($jsonPlaceHolder); $i++) {
  // `array_push()` recibe 2 parámetros
  // 1 el array donde guardo 
  // 2 lo que deseo guardar
  array_push(
    $matrix,
    [
      $jsonPlaceHolder[$i]["id"],
      $jsonPlaceHolder[$i]["title"],
      $jsonPlaceHolder[$i]["thumbnail"],
      $jsonPlaceHolder[$i]["short_description"],
      $jsonPlaceHolder[$i]["game_url"],
      $jsonPlaceHolder[$i]["genre"],
      $jsonPlaceHolder[$i]["platform"],
      $jsonPlaceHolder[$i]["publisher"],
      $jsonPlaceHolder[$i]["developer"],
      $jsonPlaceHolder[$i]["release_date"],
      $jsonPlaceHolder[$i]["freetogame_profile_url"],
    ]
  );
};

// `array_keys()` recibe 1 parámetro
// 1 el array donde saco las "claves" del array en el parámetro
$titles = array_keys($jsonPlaceHolder[0]);

tableWithTitlesAndMatrixData($titles, $matrix);

echo "<hr/>";

$URL2 = "https://api.dawum.de/";
$apiDawDe = GET($URL2);
$sectionOfApiParliaments = $apiDawDe["Parliaments"];

// `print_r()` sirve para leer el `return` de una función
// print_r($sectionOfApi);

/**
 * * ESTO ES LO QUE DEVUELVE:
 * 
 * Array ( 
 *   [14] => Array (
 *     [Shortcut] => Sachsen-Anhalt
 *     [Name] => Landtag von Sachsen-Anhalt 
 *     [Election] => Landtagswahl in Sachsen-Anhalt
 *   )
 * )
 * 
 */

$dataParliaments = [];
for ($i = 0; $i < count($sectionOfApiParliaments); $i++) {
  // `array_push()` recibe 2 parámetros
  // 1 el array donde guardo 
  // 2 lo que deseo guardar
  array_push(
    $dataParliaments,
    [
      $sectionOfApiParliaments[$i]["Shortcut"],
      $sectionOfApiParliaments[$i]["Name"],
      $sectionOfApiParliaments[$i]["Election"],
    ]
  );
};

// `array_keys()` recibe 1 parámetro
// 1 el array donde saco las "claves" que deseo guardar
$titlesParliaments = array_keys($sectionOfApiParliaments[0]);

tableWithTitlesAndMatrixData($titlesParliaments, $dataParliaments);

echo "<hr/>";

$sectionOfApiParties = $apiDawDe["Parties"];

// `print_r()` sirve para leer el `return` de una función
// print_r($sectionOfApiParties);

/**
 * * ESTO ES LO QUE DEVUELVE:
 * 
 * Array ( 
 *   [7] => Array (
 *     [Shortcut] => AfD
 *     [Name] => Alternative für Deutschland 
 *   )
 * )
 * 
 */

$dataParties = [];
for ($i = 0; $i < count($sectionOfApiParties); $i++) {

  // Si existen los campos los guarda, si no, no
  if (isset($sectionOfApiParties[$i])) {

    // `array_push()` recibe 2 parámetros
    // 1 el array donde guardo 
    // 2 lo que deseo guardar
    array_push(
      $dataParties,
      [
        $sectionOfApiParties[$i]["Shortcut"],
        $sectionOfApiParties[$i]["Name"],
      ]
    );
  }
};

// `array_keys()` recibe 1 parámetro
// 1 el array donde saco las "claves" que deseo guardar
$titlesParties = array_keys($sectionOfApiParties[0]);

tableWithTitlesAndMatrixData($titlesParties, $dataParties);

echo "<hr/>";

$sectionOfApiSurveys = $apiDawDe["Surveys"];

// `print_r()` sirve para leer el `return` de una función
// print_r($sectionOfApiSurveys);

/**
 * * ESTO ES LO QUE DEVUELVE:
 * 
 * Array ( 
 *   [3418] => Array (
 *     [Date] => 2024-04-18
 *     [Survey_Period] => Array (
 *       [Date_Start] => 2024-04-10
 *       [Date_End] => 2024-04-17
 *     )
 *     [Surveyed_Persons] => 1000 
 *     [Parliament_ID] => 14
 *     [Institute_ID] => 5
 *     [Tasker_ID] => 4
 *     [Method_ID] => 3
 *     [Results] => Array (
 *       [101] => 32
 *       [7] => 29
 *       [23] => 10
 *       [2] => 8
 *       [0] => 7
 *       [4] => 5
 *       [5] => 5
 *       [3] => 4
 *     )
 *   )
 * )
 * 
 */

$dataSurveys = [];
foreach ($sectionOfApiSurveys as $clave => $valor) {

  // `implode()` convierte a `string` y realiza una especie de `join()` como en JavaScript. Recibe 2 parámetros
  // 1 El tipo de separación con el que deseo juntar los valores del array
  // 2 Array
  $VariouslyResults = implode(", ", $sectionOfApiSurveys[$clave]["Results"]);

  // `array_push()` recibe 2 parámetros
  // 1 el array donde guardo 
  // 2 lo que deseo guardar
  array_push(
    $dataSurveys,
    [
      $sectionOfApiSurveys[$clave]["Date"],
      $sectionOfApiSurveys[$clave]["Survey_Period"]["Date_Start"],
      $sectionOfApiSurveys[$clave]["Survey_Period"]["Date_End"],
      $sectionOfApiSurveys[$clave]["Surveyed_Persons"],
      $sectionOfApiSurveys[$clave]["Parliament_ID"],
      $sectionOfApiSurveys[$clave]["Institute_ID"],
      $sectionOfApiSurveys[$clave]["Tasker_ID"],
      $sectionOfApiSurveys[$clave]["Method_ID"],
      $VariouslyResults

    ]
  );
}

$titlesSurveys =  ["Date", "Date_Start", "Date_End", "Surveyed_Persons", "Parliament_ID", "Institute_ID", "Tasker_ID", "Method_ID", "Results"];

tableWithTitlesAndMatrixData($titlesSurveys, $dataSurveys);

echo "<hr/>";
