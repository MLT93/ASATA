<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="Marcos Lambir Torres" />
  <meta name="description" content="JavaScript" />
  <meta name="keywords" content="Curso, Formación, Examen" />
  <link rel="stylesheet" href="./src/css/formulario.css" />
  <title>Curso ASATA - PHP</title>

  <style>
    form {
      display: flex;
      flex-flow: column;
      gap: 10px;

      width: fit-content;
    }

    select[id="cursoID"],
    select[id="ciudadesID"] {
      width: 100%;
    }
  </style>
</head>

<body>
  <h1>FORMULARIO</h1>

  <!-- El `action=""` envía los datos a esa página -->
  <!-- El `method=""` es el método que realiza la operación -->
  <!-- `method="get"` envía a través de `path` o ruta URL que es visible por los usuarios -->
  <!-- `method="post"` envía de forma oculta al usuario -->
  <form action="matricula.php" method="post" target="_self">
    <label for="nameID">NOMBRE</label>
    <input type="text" id="nameID" name="name" required />

    <label for="schoolID">USER LEVEL
      <!-- En el caso de `type="radio"` y `type="checkbox"` el atributo `name=""` debe ser el mismo -->
      <div>
        <input type="radio" name="lvl" value="Primaria" /> Primaria
      </div>
      <div>
        <input type="radio" name="lvl" value="Secundaria" /> Secundaria
      </div>
      <div>
        <input type="radio" name="lvl" value="Bachiller" /> Bachiller
      </div>
    </label>

    <label for="exa1ID">EXAMEN 1</label>
    <input type="number" id="exa1ID" name="exa1" required />

    <label for="exa2ID">EXAMEN 2</label>
    <input type="number" id="exa2ID" name="exa2" required />

    <!-- <label for="cursosID">CURSOS</label>
    <select name="curso" id="cursosID">
      <option value=""></option>
      <option value="web">Curso de programación Web</option>
      <option value="bd">Curso de bases de datos</option>
      <option value="html">Curso de HTML</option>
      <option value="cocina">Curso de cocina</option>
      <option value="finanzas">Curso de Análisis Financiero</option>
    </select> -->

    <!-- La ventaja de PHP es qe se puede mezclar con HTML perfectamente -->
    <label for="cursosID">CURSOS DISPONIBLES</label>
    <select name="curso" id="cursosID">
      <?php

      // Base de datos
      $dbListaCursos = [
        ["web", "Curso de programación Web"],
        ["bd", "Curso de bases de datos"],
        ["html", "Curso de HTML"],
        ["cocina", "Curso de cocina"],
        ["finanzas", "Curso de Análisis Financiero"],
      ];

      for ($i = 0; $i < count($dbListaCursos); $i++) {
      ?>

        <option value="<?php echo $dbListaCursos[$i][0]; ?>"> <?php echo $dbListaCursos[$i][1]; ?></option>

      <?php
      }
      ?>
    </select>

    <label for="ciudadID">CIUDADES DISPONIBLES</label>
    <select name="ciudad" id="ciudadID">
      <?php
      $dbListaCiudades = ["Madrid", "Valencia", "Barcelona", "Gijón"];

      for ($j = 0; $j < count($dbListaCiudades); $j++) {
      ?>

        <option value="<?= $dbListaCiudades[$j]; ?>"> <?= $dbListaCiudades[$j]; ?> </option>

      <?php
      }
      ?>

    </select>

    <button type="submit" id="submitID" name="submit" value="send">
      SUBMIT
    </button>
  </form>

  // ! LA COMPROBACIÓN LA ESTOY REALIZANDO EN LA MISMA PÁGINA PORQUE LA RESPUESTA IRÁ EN LA MISMA PÁGINA
  <?php
  // Database

  /* ... */

  // Compruebo si las variables están definidas o no
  if (
    isset($_REQUEST["name"]) &&
    isset($_REQUEST["lvl"]) &&
    isset($_REQUEST["exa1"]) &&
    isset($_REQUEST["exa2"]) &&
    isset($_REQUEST["curso"]) &&
    isset($_REQUEST["ciudad"])
  ) {
    // Primero borro
    unset($user, $passwordUser, $userType, $nombreCurso, $nombreCiudad);

    // Luego escribo
    $user = $_REQUEST["name"];
    $lvl = $_REQUEST["lvl"];
    $exa1 = $_REQUEST["exa1"];
    $exa2 = $_REQUEST["exa2"];
    $mediaExa = $exa1 + $exa2 / 2;
    $nombreCurso = "";
    $nombreCiudad = "";

    if ($_REQUEST["curso"] == "web") {
      $nombreCurso = "Curso de Programación Web";
    };
    if (
      $_REQUEST["curso"] == "bd"
    ) {
      $nombreCurso = "Curso de bases de datos";
    };
    if (
      $_REQUEST["curso"] == "html"
    ) {
      $nombreCurso = "Curso de HTML";
    };
    if (
      $_REQUEST["curso"] == "cocina"
    ) {
      $nombreCurso = "Curso de cocina";
    };
    if (
      $_REQUEST["curso"] == "finanzas"
    ) {
      $nombreCurso = "Curso de Análisis Financiero";
    };

    if (
      $_REQUEST["ciudad"] == "Madrid"
    ) {
      $nombreCiudad = "Madrid";
    };
    if (
      $_REQUEST["ciudad"] == "Valencia"
    ) {
      $nombreCiudad = "Valencia";
    };
    if (
      $_REQUEST["ciudad"] == "Barcelona"
    ) {
      $nombreCiudad = "Barcelona";
    };
    if (
      $_REQUEST["ciudad"] == "Gijón"
    ) {
      $nombreCiudad = "Gijón";
    };

    echo "201 - Correct!" . "<br/>";
    echo "Hola $user. Eres un usuario con estudios de tipo $lvl, tu nota media es $mediaExa. Has elegido el curso $nombreCurso en la ciudad $nombreCiudad" . "<br/>";


    // ? `FOPEN()` ES EL MANEJADOR DE ARCHIVOS DE PHP
    // `fopen()` sirve para acceder a los archivos. Tiene 2 parámetros
    // 1 El archivo al que voy a acceder
    // 2 El método con el que voy a interactuar en el archivo (escribir al final: "a+", leer desde el principio: "r", escribir al inicio: "c+")
    // Voy a abrir un archivo (.log, .txt, ...) para escribir en él
    $fichero = fopen("matricula.log", "a+");

    // ? `FWRITE()` ES EL QUE ESCRIBE EN LOS ARCHIVOS
    // `fwrite()` sirve para escribir en los archivos cuando he accedido a ellos. Tiene 2 parámetros
    // 1 El archivo con el método con el que voy a interactuar
    // 2 Lo que voy a escribir. Atento que en los archivos de texto los saltos de línea se realizan con `\r\n`
    // Voy a escribir
    $linea1 = "Usuario -> $user.";
    $linea2 = "Usuario con estudios de tipo $lvl y nota media de $mediaExa.";
    $linea3 = "Ha elegido el curso $nombreCurso en la ciudad de $nombreCiudad.";
    fwrite($fichero, "\r\n $linea1 \r\n");
    fwrite($fichero, $linea2 . "\r\n");
    fwrite($fichero, $linea3 . "\r\n");

    // ? `FCLOSE()` ES EL QUE CIERRA EL PROCESO DE ESCRITURA
    // `fclose()` sirve para cerrar los archivos. Tiene 1 parámetro
    // 1 El archivo con el que estaba interactuando
    // Voy a dejar de escribir
    fclose($fichero);


    // ? AHORA LEEREMOS UN ARCHIVO
    echo "<h2>Información del archivo LOG</h2>";

    $doc = fopen("matricula.log", "r");

    // ? `FEOF()` NOS DICE SI ESTAMOS AL FINAL DEL ARCHIVO O NO
    // `feof()` devuelve true (1) cuando hemos llegado al final de archivo y false (0) si no lo hemos alcanzado todavía
    while (!feof($doc)) {

      // ? `FGETS()` TOMA UNA LINEA DEL ARCHIVO
      // `fgets()` obtiene una cadena . Tiene 2 parámetros
      // 1 El archivo de lectura
      // 2 Longitud de caracteres para leer. Si se omite, leerá hasta 1024 caracteres
      echo fgets($doc) . "<br/>";
    }
  }
  ?>
</body>

</html>
