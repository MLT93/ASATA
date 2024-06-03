<?php

// Esto lo cargo para utilizar las variables de entorno en el archivo `.env`
// Es necesario el `autoload` del `vendor` para cargar y encontrar estos paquetes. También se puede cargar el directorio en otro archivo e importar este en él
// La función estática en el namespace `Dotenv` recibe 1 parámetro
// 1 El directorio donde encontrar el archivo `.env`. No hace falta poner el nombre del archivo oculto, solo ponemos el directorio donde está porque lo busca automáticamente
require_once("../../../../vendor/autoload.php"); // Esto lo cargo para utilizar las variables de entorno en el archivo `.env`

use Firebase\JWT\JWT;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable("../../../../SITIO_WEB_MARCOS/"); // Busco el directorio del archivo `.env`
$dotenv->load();

//claves secretas del archivo `.env`
$secretKey = $_ENV['SIGNATURE_KEY'];
$cipherKey = $_ENV['CIPHER_KEY'];

// Antes de realizar ninguna acción controlo que la petición se realice a través de un método $payloadDesencriptado
if ($_SERVER['REQUEST_METHOD'] == "POST") {

  // Aquí recibiré una petición con credenciales: Usuario y Password
  // Generará y devolverá un Token relacionado
  // Las credenciales se enviarán como Basic Authentication (es lo más común para crear el Token)

  // Si como siempre se manda la información en el Header, entonces obtengo todos los datos del Header
  $headers = getallheaders();
  // var_dump($headers);

  // Compruebo que en el Header están los datos que me debe enviar el cliente

  // Vamos a pedirle las `credenciales de acceso` con el `nickname` y `password`
  // Esta información deberá ir en el Header como Basic Authentication
  // Se manda normalmente como Basic Authentication porque te devuelve la información encriptada
  $authHeader = isset($headers['Authorization']) ? $headers['Authorization'] : null; //=> 'Basic dXZ1cnVzZXI6MTIzNA=='
  // echo $authHeader;

  // Vamos a pasarle el `mail` y el `rol`
  // Esta información la recibiré a través del HEADER a la hora de realizar la petición para poder acceder a ella
  $mail = isset($headers['mail']) ? $headers['mail'] : null;
  $rol = isset($headers['rol']) ? $headers['rol'] : null;
  // echo $mail;
  // echo $rol;

  // Ahora compruebo la información encriptada y creo array para guardar la info separadamente
  $info = [];

  // Aquí pregunto si la cadena de texto donde estoy buscando, empieza por 'Basic ' en la posición 0
  if (strpos($authHeader, "Basic ") == 0) {

    // Recorto la cadena de texto. empieza en el indice 6 y acaba al final de la cadena
    $encodedCredentials = substr($authHeader, 6);

    // Decodifico las credenciales
    $decodedCredentials = base64_decode($encodedCredentials);
    // echo $decodedCredentials; //=> useruser:1234

    // Separar el nickname y la password
    // `list()` crea las variables
    // `explode()` quita la separación que le indique, sobre la variable que le paso, y devuelve la cantidad de elementos que le pase como número
    list($nickname, $password) = explode(":", $decodedCredentials, 2);

    // Asocio la información al array `info`
    $info['nickname'] = $nickname;
    $info['password'] = $password;
    $info['mail'] = $mail;
    $info['rol'] = $rol;

    // Verifico que me ha llegado toda la información para crear después el token
    if ($nickname && $password && $mail && $rol) {

      // Creo JWT
      // Preparo el Payload con la info del cliente para el cifrar el JWT
      $iat = time(); // Fecha creación
      $exp = $iat + (3200 * 30 * 24); // Fecha expiración
      $sub = 1;
      $payload = [
        "iat" => $iat,
        "exp" => $exp,
        "sub" => $sub,
        "nickname" => $info['nickname'],
        "password" => $info['password'],
        "mail" => $info['mail'],
        "rol" => $info['rol']
      ];

      // Vamos a cifrar el Payload anterior
      $metodoCifrado = "AES-128-CBC"; // Elijo el tipo de cifrado
      
      $iv_longitud = openssl_cipher_iv_length($metodoCifrado); // Calculo longitud vector inicialización del cifrado
      $iv = openssl_random_pseudo_bytes($iv_longitud); // Creo el vector de inicialización como un string de bytes random
      $payload_encriptado = openssl_encrypt(json_encode($payload), $metodoCifrado, $cipherKey, 0, $iv); // Encripto la información
      $iv_encriptado = base64_encode($iv); // Encripto el iv

      // Ahora con el `payload_encriptado` y el `iv_encriptado` creamos un Payload totalmente codificado
      $encodedPayload = array(
        "data" => $payload_encriptado,
        "iv" => $iv_encriptado
      );

      // Codificamos ese payload en un token JWT
      $encodedJWT = JWT::encode($encodedPayload, $secretKey, "HS256");

      // Creamos un array con toda la info
      $jwt = [
        "jwt" => $encodedJWT,
        "exp" => $exp
      ];

      // Set del la respuesta y mensaje en formato JSON
      http_response_code(200);
      echo json_encode(
        [
          'success' => true,
          'token' => $jwt
        ]
      );
    } else {
      // Set del la respuesta y mensaje en formato JSON
      http_response_code(400);
      echo json_encode(
        [
          'success' => false,
          'token' => 'Faltan parámetros para incluir en la petición'
        ]
      );
    }
  }
} else {
  http_response_code(400);
  echo json_encode(
    [
      'success' => false,
      'token' => 'La petición debe ser realizada a través de un POST'
    ]
  );
}
