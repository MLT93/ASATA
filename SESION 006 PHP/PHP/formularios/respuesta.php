<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario</title>
</head>

<body>
  <h1>RESPUESTA REGISTRADA</h1>

  <?php

  // ? `$_REQUEST` RECIBE EL ENVÍO DEL FORMULARIO
  // `$_REQUEST` es un array que posee toda la información del formulario. Para identificar un input en concreto, se utiliza el atributo `name=""` asociado en HTML
  $nombre = $_REQUEST["nombre"];
  $apellido1 = $_REQUEST["apellido1"];
  $apellido2 = $_REQUEST["apellido2"];
  $_GET;

  echo "El usuario registrado se llama: $nombre $apellido1 $apellido2";
  echo "<br/>";

  // ? MUESTRA TODA LA INFORMACIÓN DEL PARÁMETRO
  var_dump($_REQUEST); // Muestra toda la información sobre la variable que pongamos como parámetro
  ?>

</body>

</html>
