<?php

// ? `JWT` JSON Web Token
// `JWT` tiene esta estructura -> header.payload.signature
// 1 Header: encabezado dónde se indica, al menos, el algoritmo y el tipo de token, que en el caso del ejemplo anterior era el algoritmo HS256 y un token JWT.
// 2 Payload: donde aparecen los datos de usuario y privilegios, así como toda la información que queramos añadir, todos los datos que creamos convenientes.
// 3 Signature: una firma que nos permite verificar si el token es válido, y aquí es donde radica el quid de la cuestión, ya que si estamos tratando de hacer una comunicación segura entre partes y hemos visto que podemos coger cualquier token y ver su contenido con una herramienta sencilla, ¿dónde reside entonces la potencia de todo esto?

// Call de package JWT
require_once("../../vendor/autoload.php");

// Call namespaces JWT
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// Call ENV environment
// El parámetro que recibe la función estática en el namespace `Dotenv` recibe 1 parámetro
// El directorio donde encontrar el archivo `.env`. No hace falta poner el nombre del archivo. Hay que poner solo el directorio porque lo busca automáticamente
$dotenv = Dotenv\Dotenv::createImmutable("../../");
$dotenv->load();

// Secret key (the same value of encrypted key)
// ? `$_ENV` PERMITE EL ACCESO A LAS VARIABLES DE ENTORNO (archivo .env)
// `$_ENV` nos da acceso a las variables dentro del archivo `.env`. Agrega siempre ese archivo al archivo `.gitignore` para que quede privado
$secret_key = $_ENV["SECRET_KEY"];

// Comprobar que exista
if (isset($_COOKIE["JWT"])) {
  // Enviar otro error si el token es inválido a través de un try-catch
  try {
    // Decrypting (descodificar la clave)
    JWT::decode($_COOKIE["JWT"], new Key($secret_key, "HS256"));
    echo "El usuario tiene acceso a esta página";
  } catch (Exception $exception) {
    http_response_code(401);
    echo "Acceso denegado. El token es inválido" . $exception->getMessage();
  }
} else {
  // ? `HTTP_RESPONSE_CODE()` EMITE LOS ERRORES EN LAS RESPUESTAS HTTP
  // `http_response_code()` realiza el manejo de errores proporcionando el valor del error correspondiente
  http_response_code(401);
  echo "Acceso denegado. No se ha proporcionado un token";
}
