<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Dotenv\Dotenv;

// ENCRIPTA Y CREA EL JWT. DEVUELVE UN ARRAY CON LA INFORMACIÓN
function JWTCreation($info, $path)
{

    // Las 2 siguientes lineas cargan el archivo .env para poder acceder a sus variables
    $dotenv = Dotenv::createImmutable($path);
    $dotenv->load();
    // Clave secreta utilizo la variable de mia archivo de entorno.
    $key_secreta = $_ENV['SIGNATURE_KEY'];

    $iat = time();
    $exp = $iat + 3600;
    $sub = 1;
    $payload = [
        "iat" => $iat,
        "exp" => $exp,
        "sub" => $sub,
        "username" => $info['usuario'],
        "password" => $info['password']
    ];

    // Vamos a cifrar / encriptar el payload anterior
    // DEFINO EL METODO DE CIFRADO
    $metodoCifrado = "AES-128-CBC";
    // Calculo longitud vector inicialización del cifrado
    $iv_longitud = openssl_cipher_iv_length($metodoCifrado);
    // Creo el vector de inicialización como un string de bytes random 
    $iv = openssl_random_pseudo_bytes($iv_longitud);
    // Encripto la información
    $payload_encriptado = openssl_encrypt(json_encode($payload), $metodoCifrado, $_ENV['CIPHER_KEY'], 0, $iv);

    // Tenemos el nuevo payload encriptado
    $nuevoPayload = array(
        "data" => $payload_encriptado,
        "iv" => base64_encode($iv)
    );

    // Codificamos ese payload en un token JWT
    $jwt = JWT::encode($nuevoPayload, $key_secreta, "HS256");


    $jwtArray = [
        "jwt" => $jwt,
        "exp" => $exp
    ];

    return $jwtArray;
}

// DESENCRIPTA EL JWT Y DEVUELVE EL USUARIO
function JWTDecodeUser($jwt, $secretKey, $cipherKey)
{

    $metodoCifrado = "AES-128-CBC";
    // Decodifico el jwt
    $jwtDecodificado = JWT::decode($jwt, new Key($secretKey, "HS256"));
    // Desencripto el payload del jwt
    $payloadDesencriptado =  openssl_decrypt($jwtDecodificado->data, $metodoCifrado, $cipherKey, 0, base64_decode($jwtDecodificado->iv));

    // Decodifico el JSON que tiene el valor del usuario que hay en el token
    $pay = json_decode($payloadDesencriptado);
    $userJWT = $pay->{'username'}; //=> Es el usuario logueado. Esta estructura se puede visualizar en la función `JWTCreation` dentro del array asociativo `$payload`

    return $userJWT;
}

function estadoAcceso($jwt, $secretKey, $cipherKey)
{
    try {
        /* $jwt = $_COOKIE['jwt'];
      $metodoCifrado = "AES-128-CBC";
      // Decodifico el jwt
      $jwtDecodificado = JWT::decode($jwt, new Key($key_secreta, "HS256"));
      // Desencripto el payload del jwt
      $payloadDesencriptado =  openssl_decrypt($jwtDecodificado->data, $metodoCifrado, $_ENV['CIPHER_KEY'], 0, base64_decode($jwtDecodificado->iv));

      // Decodifico el JSON que tiene el valor del usuario que hay en el token
      $pay = json_decode($payloadDesencriptado);
      $userJWT = $pay->{'username'}; //=> Es el usuario logueado. Esta estructura se puede visualizar en la función `JWTCreation` dentro del array asociativo `$payload` */

        $jwt = $_COOKIE['jwt'];
        $userJWT = JWTDecodeUser($jwt, $secretKey, $cipherKey);

        // Hago comprobación en la base de datos
        if ($_SESSION['usuario'] == $userJWT) {

            http_response_code(200); // OK
            echo "<p>El usuario tiene acceso a esta página.</p>";
            return true;

        } else {
            http_response_code(401); // No autorizado.
            echo '<h3 class="card">Acceso denegado. Toke inválido / Sesión incorrecta</h3>';
            return false;
        }
    } catch (Exception $exception) {
        http_response_code(401); // No autorizado.
        echo "<h2 class='card' >Acceso denegado. El token es inválido</h2>" . "<br/>";
        return false;
    }
}
