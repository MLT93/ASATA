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
require_once('classes/Usuario.php');
require_once('classes/Sesion.php');
use Session\Sesion;
use User\Usuario;
Usuario::init();


if (isset($_REQUEST['login'])) {
 $email = $_POST['email'];
 $password = $_POST['password'];

 if (Usuario::verificarUsuario($email, $password) =="OK") {
  $misesion = new Sesion();
  $misesion->inicioLogin($email);
  header("Location: dashboard.php");  // Redirige al dashboard
 } else {
  echo "Credenciales incorrectas.";
 }

}

?>