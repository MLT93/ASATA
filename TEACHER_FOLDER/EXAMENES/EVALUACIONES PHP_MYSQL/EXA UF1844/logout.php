
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

Sesion::cerrarSesion();
header("Location: login.php");  
// Redirige al formulario de login


?>

</body>
</html>
