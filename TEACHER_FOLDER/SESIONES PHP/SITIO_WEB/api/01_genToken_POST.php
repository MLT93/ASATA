<?php

require_once("../functions/authentication.php");

// Esto lo cargo para utilizar las variables de entorno en el archivo `.env`
// Es necesario el `autoload` del `vendor` para cargar y encontrar estos paquetes. También se puede cargar el directorio en otro archivo e importar este en él
// La función estática en el namespace `Dotenv` recibe 1 parámetro
// 1 El directorio donde encontrar el archivo `.env`. No hace falta poner el nombre del archivo oculto, solo ponemos el directorio donde está porque lo busca automáticamente
require_once("../../vendor/autoload.php"); /* En este caso `$dotenv = Dotenv\Dotenv::createImmutable("./");` 
y `$dotenv->load();` no nos hacen falta porque se llaman en la función `newJWTCreation()` pero sí debo pasarle la ruta para encontrar el archivo `.env` a través de la variable `$path` */
$path = "../";

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
      $jwt = newJWTCreation($info, $path);

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
          'error' => 'Faltan parámetros para incluir en la petición'
        ]
      );
    }
  }
} else {
  http_response_code(400);
  echo json_encode(
    [
      'success' => false,
      'error' => 'La petición debe ser realizada a través de un POST'
    ]
  );
}
