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
    ob_start();
    // Inicio de sesión
    session_start();
    // Importa HTML
    require("./html_modules/header.html");
    require("./html_modules/form_registro.html");
    // Importa la ruta de la clase
    require("./classes/Usuario.php");
    // Importa el cargador automático de Composer
    // require_once("./vendor/autoload.php");

    use User\Usuario;
    use Firebase\JWT\JWT;

    session_start();

    // REGISTRO USUARIO
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
                $jwtArray = JWTCreation($info, /* "./" */);
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

    <?php
    // FUNCIÓN PARA CREAR EL JWT
    function JWTCreation($info)
    {
        try {
            $key_secreta = "super_secreta";

            $iat = time();
            $exp = $iat + 3600;
            $sub = 1;
            $payload = [
                "iat" => $iat,
                "exp" => $exp,
                "sub" => $sub,
                "username" => $info['nombre'],
                "password" => $info['pass']
            ];

            $metodoCifrado = "AES-128-CBC";
            $iv_longitud = openssl_cipher_iv_length($metodoCifrado);
            $iv = openssl_random_pseudo_bytes($iv_longitud);
            $payload_encriptado = openssl_encrypt(json_encode($payload), $metodoCifrado, '$_ENV["CIPHER_KEY"]', OPENSSL_RAW_DATA, $iv);

            $nuevoPayload = [
                "data" => $payload_encriptado,
                "iv" => base64_encode($iv)
            ];

            $jwt = JWT::encode($nuevoPayload, $key_secreta, "HS256");

            $jwtArray = [
                "jwt" => $jwt,
                "exp" => $exp
            ];

            return $jwtArray;
        } catch (Exception $exception) {
            // Manejo de errores
            echo "<p>Error al crear el JWT: </p>" . $exception->getMessage();
            return null;
        }
    }

    ?>
</body>

</html>
