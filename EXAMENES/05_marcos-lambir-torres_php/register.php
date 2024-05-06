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
            if ($nombre == $usuariosDB[$i][2] || $email == $usuariosDB[$i][1]) {
                echo "<p>Usuario en la BD</p>";
                echo "<br/>";
                $existeUsuario = true;
                break; //salgo del bucle
            } elseif ($i == count($usuariosDB) - 1) {
                echo "<h2 class='card' >EL USUARIO Y/O LAS CREDENCIALES NO ESTÁN EN LA BASE DE DATOS</h2>";
                echo "<br/>";
            }
        }


        if (!$existeUsuario) {

            if ($pass1NewUser === $pass2NewUser) {
                echo "<p>Password correcto</p>";


                $info = [];
                $info["nombre"] = $nombre;
                $info["password"] = $pass1NewUser;
                //creo JWT
                $jwtArray = JWTCreation($info, "./");
                //CREO COOKIE CON JWT
                setcookie("jwt", $jwtArray['jwt'],  $jwtArray['exp'], "/");
                //CREO USUARIO
                $usuario = new Usuario($nombre, $email, $pass1NewUser);
                $indexOfNewUser = Usuario::mostrarIdUsuario($nombre);
                echo $indexOfNewUser;
                echo "<br/>";

                //inserto el formulario
                require("./html_modules/form_picture_up.php");
            } else {
                echo "<p>El password NO es correcto</p>";
                echo "<br/>";
            }
        }
    }
    ?>

    <?php
    // FUNCIÓN
    use Firebase\JWT\JWT;

    function JWTCreation($info, $path)
    {

        //las 2 siguientes lineas cargan el archivo .env para poder acceder a sus variables
        $dotenv = Dotenv\Dotenv::createImmutable($path);
        $dotenv->load();
        $key_secreta = "super_secreta";

        $iat = time();
        $exp = $iat + 3600;
        $sub = 1;
        $payload = [
            "iat" => $iat,
            "exp" => $exp,
            "sub" => $sub,
            "username" => $info['nombre'],
            "password" => $info['password']
        ];
        $metodoCifrado = "AES-128-CBC";
        $iv_longitud = openssl_cipher_iv_length($metodoCifrado);
        $iv = openssl_random_pseudo_bytes($iv_longitud);
        $payload_encriptado = openssl_encrypt(json_encode($payload), $metodoCifrado, "cipher_key", 0, $iv);

        $nuevoPayload = array(
            "data" => $payload_encriptado,
            "iv" => base64_encode($iv)
        );

        $jwt = JWT::encode($nuevoPayload, $key_secreta, "HS256");

        $jwtArray = [
            "jwt" => $jwt,
            "exp" => $exp
        ];

        return $jwtArray;
    }
    ?>
</body>

</html>
