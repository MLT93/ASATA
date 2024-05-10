<!DOCTYPE html>
<html lang="es">
 <head>
     <meta charset="UTF-8">
     <title>Registro de Usuario</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
     <link rel="stylesheet" href="./css/style.css">

 </head>
 <body>
  <?php require("./html_modules/header.php") ?>
  <h1>Registro de Usuario</h1>
  <form method="post" action="register.php">

   <label for="nombre">NOMBRE</label>
   <input type="text" name="nombre" required><br>

   <label for="email">E-MAIL</label>
   <input type="email" name="email" required><br>

   <label for="password">CONTRASEÑA</label>
   <input type="password" name="password" required><br>

   <label for="password2">VERIFICAR CONTRASEÑA</label>
   <input type="password2" name="password2" required><br>

   <button type="submit" name="register">Registrar</button>
   
  </form>
 </body>
</html>

<?php
require_once('classes/Usuario.php');
require_once('classes/Sesion.php');
use Session\Sesion;
use User\Usuario;
Usuario::init();


if (isset($_POST['register'])) {
 $nombre = $_POST['nombre'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $password2 = $_POST['password2'];

 if ($password == $password2) {
  $misesion = new Sesion();
  $misesion->inicioLogin($email);
  
  $user = new Usuario($nombre, $email, $password);
  echo "Usuario registrado exitosamente.";
 }else{
  echo "los passwords no coinciden.";
 }
}

?>
