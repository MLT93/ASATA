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
    require("./classes/Usuario.php");

    use Session\Session;
    use User\Usuario;

    // Accedo a la base de datos
    Usuario::init();

    // LOG OUT
    Session::cerrarSession();

    // Redirige a la página de login
    header("Location: login.html");
    ?>

</body>

</html>
