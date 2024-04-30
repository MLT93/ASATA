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
  <h1>RESPUESTA LOGIN</h1>

  // ! LA COMPROBACIÓN LA ESTOY REALIZANDO EN LA MISMA PÁGINA PORQUE LA RESPUESTA IRÁ EN LA MISMA PÁGINA
  <?php
  // `$_REQUEST` es para obtener la respuesta enviada, se escribe el valor del atributo `name=""` del input HTML correspondiente. Devuelve un array
  $user = $_REQUEST["user"];
  $passwordUser = $_REQUEST["password"];

  echo "El usuario es: $user y su contraseña es: $passwordUser";
  ?>

</body>

</html>
