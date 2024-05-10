
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
require("./html_modules/header.php") ;
require_once('classes/Usuario.php');
require_once('classes/Sesion.php');
use User\Usuario;
use Session\Sesion;
Usuario::init();

if (!Sesion::estaLogueado()) {
  // echo $_SESSION['usuario'];
  header("Location: login.php");  // Redirige a login si no está logueado
  exit;
}

echo "<h1>Bienvenido al Dashboard</h1>";
echo "<form method='post' action='logout.php'><button type='submit' name='logout'>Cerrar Sesión</button></form>";
?>

</body>
</html>