<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login de Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <?php
    ob_start();
    require("./html_modules/header.html");
    require("./classes/Sesion.php");

    use Session\Session;
    
    session_start();

    // LOG OUT
    Session::cerrarSession($mySession);
    ?>

</body>

</html>
