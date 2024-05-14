<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>

  <?php
  require_once("./html_modules/header.php");

  require_once('./classes/sesionBd.php');
  require_once('./classes/usuarioBd.php');

  use SesionBD\SesionBD;

  SesionBD::cerrarSesion();
  header("Location: login.php");
  // Redirige al formulario de login


  ?>

</body>

</html>
