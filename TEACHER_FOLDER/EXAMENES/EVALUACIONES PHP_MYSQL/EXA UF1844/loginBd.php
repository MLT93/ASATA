<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Login de Usuario</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <link rel="stylesheet" href="./css/style.css">
</head>


<body>
  <?php require("./html_modules/header.php") ?>
  <h1>Login de Usuario</h1>
  <form method="post" action="login.php">

    <label for="email">E-MAIL</label>
    <input type="email" name="email" required><br>

    <label for="password">CONTRASEÑA</label>
    <input type="password" name="password" required><br>

    <button type="submit" name="login">Iniciar Sesión</button>

  </form>
</body>

</html>

<?php
require_once('./classes/sesionBd.php');
require_once('./classes/usuarioBd.php');

use SesionBD\SesionBD;
use UsuarioBD\UsuarioBD;

if (isset($_REQUEST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (UsuarioBD::verificarUsuario($email, $password)) {
    $misesion = new SesionBD();
    $misesion->inicioLogin($email);
    header("Location: dashboard.php");  // Redirige al dashboard
  } else {
    echo "Credenciales incorrectas.";
  }
}

?>
