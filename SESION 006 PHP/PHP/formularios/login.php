<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario</title>
</head>

<body>
  <h1>RESPUESTA LOGIN</h1>

  <?php
  $user = $_REQUEST["user"]; // Se escribe el atributo `name=""` del HTML
  $passwordUser = $_REQUEST["password"];

  echo "El usuario es: $user y su contraseña es: $passwordUser";
  ?>

</body>

</html>
