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
</head>

<body>
  <h1>RESPUESTA REGISTRADA</h1>

  <?php

  // ? `$_REQUEST` RECIBE EL ENVÍO DEL FORMULARIO
  // `$_REQUEST` devuelve un array con toda la info del formulario, por eso se identifican individualmente
  // Para obtener la información individualmente, se escribe el valor del atributo `name=""` del input HTML al que se desea acceder
  // Mezcla entre POST y GET
  $nombre = $_REQUEST["nombre"];
  $apellido1 = $_REQUEST["apellido1"];
  $apellido2 = $_REQUEST["apellido2"];
  $_GET;

  echo "El usuario registrado se llama: $nombre $apellido1 $apellido2";
  echo "<br/>";

  // ? `VAR_DUMP()` MUESTRA TODA LA INFORMACIÓN DEL PARÁMETRO
  // Muestra toda la información sobre la variable que pongamos como parámetro
  var_dump($_REQUEST);
  ?>

</body>

</html>
