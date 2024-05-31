<?php

require_once("../functions/authentication.php");

// Esto lo cargo para utilizar las variables de entorno en el archivo `.env`
// Es necesario el `autoload` del `vendor` para cargar y encontrar estos paquetes. También se puede cargar el directorio en otro archivo e importar este en él
// La función estática en el namespace `Dotenv` recibe 1 parámetro
// 1 El directorio donde encontrar el archivo `.env`. No hace falta poner el nombre del archivo oculto, solo ponemos el directorio donde está porque lo busca automáticamente
require_once("../../vendor/autoload.php");

$dotenv = Dotenv\Dotenv::createImmutable("../"); // Busco el directorio del archivo `.env`
$dotenv->load();

// Antes de realizar ninguna acción controlo que la petición se realice a través de un método $payloadDesencriptado
if ($_SERVER['REQUEST_METHOD'] == "GET") {

  // Aquí recibiré una petición con credenciales: Usuario y Password
  // Generará y devolverá un Token relacionado
  // Las credenciales se enviarán como Basic Authentication (es lo más común para crear el Token)

  // Si como siempre se manda la información en el Header, entonces obtengo todos los datos del Header
  $headers = getallheaders();
  // var_dump($headers);

  // Compruebo que en el Header están los datos que me debe enviar el cliente

  // Vamos a pedirle las `credenciales de acceso`
  // Esta información deberá ir en el Header siempre. En este caso, al haber creado ya el Token con el Basic Authentication previamente, obtendremos un Bearer Token
  $authHeader = isset($headers['Authorization']) ? $headers['Authorization'] : null; //=> 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRhIjoiUEhZcEFoM0kxTkt5d3lsUFJMeFJrbkNqL0VpcHZ0K2dnOEdkck0zLzRFOFNGZmMrMkE3alFadkRCVEJpNWVBblhpQ1FsWTR5am1XcW5uM09lcThqTk83SjZUZXRLYWdwU0pZZ2lRT2I5Z1p5dnJwQ0Q0YjEwR1FiZ3VVcDNxWjNCZElCY2s4ZDRuYXB0b0JvaGErcHA5NlJEWk9PVjBRRkhPYTh6YXRPRGpJPSIsIml2IjoiNkt1TnV0dXUrenVybytMMDZFZEQ3dz09In0.Slnr0-Uv4Nxah_s5svywssEWSd_T3Wlt4BftMIXNqUc'
  // echo $authHeader;

  // Ahora compruebo la información encriptada
  // Aquí pregunto si la cadena de texto donde estoy buscando, empieza por 'Basic ' en la posición 0
  if (strpos($authHeader, "Bearer ") == 0) {

    // Recorto la cadena de texto. empieza en el indice 6 y acaba al final de la cadena
    $encodedCredentialsJWT = substr($authHeader, 7);
    // echo $encodedCredentialsJWT; //=> eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRhIjoiUEhZcEFoM0kxTkt5d3lsUFJMeFJrbkNqL0VpcHZ0K2dnOEdkck0zLzRFOFNGZmMrMkE3alFadkRCVEJpNWVBblhpQ1FsWTR5am1XcW5uM09lcThqTk83SjZUZXRLYWdwU0pZZ2lRT2I5Z1p5dnJwQ0Q0YjEwR1FiZ3VVcDNxWjNCZElCY2s4ZDRuYXB0b0JvaGErcHA5NlJEWk9PVjBRRkhPYTh6YXRPRGpJPSIsIml2IjoiNkt1TnV0dXUrenVybytMMDZFZEQ3dz09In0.Slnr0-Uv4Nxah_s5svywssEWSd_T3Wlt4BftMIXNqUc
    $secretKey = $_ENV['SIGNATURE_KEY'];
    $cipherKey = $_ENV['CIPHER_KEY'];

    // Decodifico las credenciales
    $decodedCredentials = newJWTDecodeUser($encodedCredentialsJWT, $secretKey, $cipherKey);
    // print_r($decodedCredentials); //=> ['nickname' => useruser, 'password' => 1234, 'mail' => pepito@mail.com, 'rol' => admin]

    // Asocio la información a variables
    $nickname = $decodedCredentials['nickname'];
    $password = $decodedCredentials['password'];
    $mail = $decodedCredentials['mail'];
    $rol = $decodedCredentials['rol'];

    // Verifico que me ha llegado toda la información para crear después el token
    if ($nickname && $password && $mail && $rol) {

      if ($rol == "admin") {
        // Set del la respuesta y mensaje en formato JSON
        http_response_code(200);
        echo json_encode(
          [
            'success' => true,
            'token' => $encodedCredentialsJWT,
            'rol' => "El usuario es admin"
          ]
        );
      } else {
        // Set del la respuesta y mensaje en formato JSON
        http_response_code(400);
        echo json_encode(
          [
            'success' => false,
            'token' => $encodedCredentialsJWT,
            'rol' => 'Este rol de usuario no tiene acceso'
          ]
        );
      }
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
      'token' => 'La petición debe ser realizada a través de un GET'
    ]
  );
}
