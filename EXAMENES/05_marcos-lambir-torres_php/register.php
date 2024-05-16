<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <?php
    // Activar almacenamiento en el búfer de salida. Esto recoge toda la salida del script hasta que decidas enviarla al navegador, permitiendo modificar las cabeceras en cualquier momento del script
    // Permite modificar las cabeceras en cualquier momento
    ob_start();

    // Importa HTML
    require("./html_modules/header.html");
    require("./html_modules/form_registro.html");

    // Importa la ruta de la clase
    require("./classes/Usuario.php");
    require("./classes/Sesion.php");

    use User\Usuario;
    use Session\Session;

    // Accedo a la base de datos
    Usuario::init();

    // REGISTRO USUARIO
    if (
        isset($_REQUEST['nombre']) &&
        isset($_REQUEST['email']) &&
        isset($_REQUEST['pass']) &&
        isset($_REQUEST['pass2']) &&
        isset($_REQUEST['registrar'])
    ) {

        unset($nombre, $email, $pass1NewUser, $pass2NewUser);

        $nombre = $_REQUEST['nombre'];
        $email = $_REQUEST['email'];
        $pass1NewUser = $_REQUEST['pass'];
        $pass2NewUser = $_REQUEST['pass2'];

        // VERIFICO SI EL USUARIO YA EXISTE EN LA DB
        $existeUsuario = false;

        // VERIFICO SI EL USUARIO YA EXISTE EN LA DB
        for ($i = 0; $i < count($usuariosDB); $i++) {
            if ($nombre == $usuariosDB[$i]["nombre"] && $email == $usuariosDB[$i]["mail"]) {
                echo "<p>EL USUARIO YA EXISTE EN LA BD</p><br/>";
                $existeUsuario = true;
                break;
            }
        }

        if (!$existeUsuario) {
            if ($pass1NewUser == $pass2NewUser) {
                echo "<h2 class='card'>EL USUARIO SE HA REGISTRADO EN LA BASE DE DATOS</h2>" . "<br/>";
                $info = [
                    "nombre" => "$nombre",
                    "hashedPassword" => password_hash($pass1NewUser, PASSWORD_DEFAULT)
                ];
                // CREO CODIFICACIÓN JWT
                $jwtArray = JWTCreation($info, /* "./" */); /* ToDo: Crear codificación sin la función */
                // CREO COOKIE CON JWT
                setcookie("jwt", $jwtArray['jwt'],  $jwtArray['exp'], "/");
                // CREO USUARIO
                $usuario = new Usuario($nombre, $email, $pass1NewUser);
                echo $usuario->getNombre();
                $indexOfNewUser = Usuario::mostrarIdUsuario($nombre);
                echo "El index del nuevo usuario es: " . $indexOfNewUser . "<br/>";
            } else {
                echo "<p>El password NO es correcto</p>";
            }
        }
    }
    ?>
</body>

</html>
