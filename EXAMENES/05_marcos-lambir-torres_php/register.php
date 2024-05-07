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
    ob_start();

    require("./html_modules/header.html");
    require("./html_modules/form_registro.html");
    require("./classes/Usuario.php");

    use User\Usuario;

    session_start();

    // REGISTRAR
    if (
        isset($_REQUEST['nombre']) &&
        isset($_REQUEST['email']) &&
        isset($_REQUEST['pass']) &&
        isset($_REQUEST['pass2']) &&
        isset($_REQUEST['registrar'])
    ) {

        unset($nombre, $email, $pass1NewUser, $pass2NewUser, $captcha, $registrarBtn);

        $nombre = $_REQUEST['nombre'];
        $email = $_REQUEST['email'];
        $pass1NewUser = $_REQUEST['pass'];
        $pass2NewUser = $_REQUEST['pass2'];
        $registrarBtn = $_REQUEST['registrar'];

        $usuariosDB =
            [
                [
                    "id" => 1,
                    "mail" => "usuario1@example.com",
                    "nombre" => "UsuarioUno",
                    "hashedPassword" => password_hash("pass11", PASSWORD_DEFAULT)
                ],
                [
                    "id" => 2,
                    "mail" => "usuario2@example.com",
                    "nombre" => "Usuario Dos",
                    "hashedPassword" => password_hash("pass11", PASSWORD_DEFAULT)
                ],
                [
                    "id" => 3,
                    "mail" => "usuario3@example.com",
                    "nombre" => "Usuario Tres",
                    "hashedPassword" => password_hash("pass11", PASSWORD_DEFAULT)
                ],
                [
                    "id" => 4,
                    "mail" => "usuario4@example.com",
                    "nombre" => "Usuario Cuatro",
                    "hashedPassword" => password_hash("pass11", PASSWORD_DEFAULT)
                ],
                [
                    "id" => 5,
                    "mail" => "usuario5@example.com",
                    "nombre" => "Usuario Cinco",
                    "hashedPassword" => password_hash("pass11", PASSWORD_DEFAULT)
                ]
            ];

        $existeUsuario = false;

        //COMPRUEBO QUE LOS DATOS DE MI USUARIO ESTÁN EN MI DB
        for ($i = 0; $i < count($usuariosDB); $i++) {
            if ($nombre == $usuariosDB[$i]["nombre"] || $email == $usuariosDB[$i]["mail"]) {
                echo "<p>Usuario en la DB</p>";
                echo "<br/>";
                $existeUsuario = true;
            }
        }

        if (!$existeUsuario) {

            if ($pass1NewUser === $pass2NewUser) {
                echo "<p>Password correcto</p>";
                //CREO USUARIO
                $usuario = new Usuario($nombre, $email, $pass1NewUser);
                $indexOfNewUser = Usuario::mostrarIdUsuario($nombre);
                echo $indexOfNewUser;
                echo "<br/>";
            } else {
                echo "<p>El password NO es correcto</p>";
                echo "<br/>";
            }
        }
    }
    ?>
</body>

</html>
