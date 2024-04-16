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
  $nombre = $_REQUEST["nombre"]; // Se escribe el atributo `name=""` del HTML
  $apellido1 = $_REQUEST["apellido1"];
  $apellido2 = $_REQUEST["apellido2"];
  $_GET;

  echo "El usuario registrado se llama: $nombre $apellido1 $apellido2";
  echo"<br/>";

  var_dump($_REQUEST); // Permite obtener toda la información sobre la variable que pongamos como parámetro
  ?>

</body>

</html>
