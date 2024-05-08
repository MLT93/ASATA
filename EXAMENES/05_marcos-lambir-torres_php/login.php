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
    require("./html_modules/form_login.html");
    require("./classes/Usuario.php");

    use Session\Session;

    session_start();

    // LOG IN
    if (
        isset($_REQUEST['nombre']) &&
        isset($_REQUEST['pass']) &&
        isset($_REQUEST['loguear'])
    ) {

        unset($nombre, $email, $pass1NewUser, $pass2NewUser, $registrarBtn);

        $nombre = $_REQUEST['nombre'];
        $password = $_REQUEST['pass'];
        $loguearBtn = $_REQUEST['loguear'];

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

        //COMPRUEBO QUE LOS DATOS DE MI USUARIO ESTÁN EN MI BD
        for ($i = 0; $i < count($usuariosDB); $i++) {
            if ($nombre == $usuariosDB[$i]["nombre"] && $password == $usuariosDB[$i]["hashedPassword"]) {
                echo "<p>Usuario en la BD</p>";
                echo "<br/>";
                $existeUsuario = true;
                break;
            }
        }


        if ($existeUsuario) {
            $mySession = new Session();
            $mySession->inicioLogin($nombre);
        }
    }

    ?>
</body>

</html>
