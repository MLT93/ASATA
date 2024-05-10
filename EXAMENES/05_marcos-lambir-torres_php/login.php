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
    require("./classes/Sesion.php");

    use Session\Session;
    use User\Usuario;

    /* Accedo a la base de datos */

    Usuario::init();

    session_start();

    // LOG IN
    if (
        isset($_REQUEST['email']) &&
        isset($_REQUEST['pass']) &&
        isset($_REQUEST['loguear'])
    ) {

        unset($email, $password, $loguearBtn);

        $email = $_REQUEST['mail'];
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


        //COMPRUEBO QUE LOS DATOS DE MI USUARIO ESTÁN EN MI BD
        $existeUsuario = false;

        if (Usuario::verificarUsuario($email, $password == "OK")) {
            $existeUsuario = true;
        } else {
            // Redirige a la página de registro
            header("Location: register.html");
        }

        if ($existeUsuario) {
            $mySession = new Session();
            $mySession->inicioLogin($email);
            header("Location: dashboard.php"); /* Redirige al dashboard */
        }
    }
    /* ToDo: resolver el warning y comparar con el examen resuelto de Dario */
    ?>
</body>

</html>
