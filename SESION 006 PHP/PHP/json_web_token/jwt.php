<?php

// ? `JWT` JSON Web Token
// `JWT` tiene esta estructura -> header.payload.signature
// 1 Header: encabezado dónde se indica, al menos, el algoritmo y el tipo de token, que en el caso del ejemplo anterior era el algoritmo HS256 y un token JWT.
// 2 Payload: donde aparecen los datos de usuario y privilegios, así como toda la información que queramos añadir, todos los datos que creamos convenientes.
// 3 Signature: una firma que nos permite verificar si el token es válido, y aquí es donde radica el quid de la cuestión, ya que si estamos tratando de hacer una comunicación segura entre partes y hemos visto que podemos coger cualquier token y ver su contenido con una herramienta sencilla, ¿dónde reside entonces la potencia de todo esto?

// Call de package
require_once("../../vendor/autoload.php");

// Call namespaces
use Firebase\JWT\JWT;

// Call ENV environment
// El parámetro que recibe la función estática en el namespace `Dotenv` recibe 1 parámetro
// El directorio donde encontrar el archivo `.env`. No hace falta poner el nombre del archivo oculto, solo ponemos el directorio donde está, porque lo busca automáticamente
$dotenv = Dotenv\Dotenv::createImmutable("../../");
$dotenv->load();

// Private key
// ? `$_ENV` PERMITE EL ACCESO A LAS VARIABLES DE ENTORNO (archivo .env)
// `$_ENV` nos da acceso a las variables dentro del archivo `.env`. Agrega siempre ese archivo al archivo `.gitignore` para que quede privado
$secret_key = $_ENV["SECRET_KEY"];

// Info user from database
$userData = [
  "id" => 01,
  "username" => "pip02",
  "email" => "pip02@example.com",
];

// Payload with data to encrypt (donde aparecen los datos de usuario y privilegios, así como toda la información que queramos añadir y los datos que creamos convenientes)
// The password is not necessary. If you want to introduce it, you need encrypt it before
$iat = time();
$exp = $iat + 3600; /* Token expire in 1 hour */
$sub = $userData["id"];
$user = $userData["username"];

$payload = [
  "iat" => $iat,
  "exp" => $exp,
  "sub" => $sub,
  "username" => $user,
];

// ? `JWT::ENCODE()` PERMITE CODIFICAR LOS DATOS SEGÚN UN CÓDIGO DE ENCRIPTADO
// `JWT::encode()` recibe 3 parámetros
// 1 Los datos de usuario en un formato standard. A partir de ahí, se puede añadir más información
// 2 La clave a encriptar
// 3 El formato de encriptado
// Encrypting data and create token
$tokenJWT = JWT::encode($payload, $secret_key, "HS256");

// Send info in cookie
setcookie("JWT", $tokenJWT, $exp, "/");
echo "TOKEN enviado al usuario $user";


// Example token
/* eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE3MTQzOTE5MDAsImV4cCI6MTcxNDM5NTUwMCwic3ViIjoxLCJ1c2VybmFtZSI6InBpcDAyIn0.4Eyzywup-LI56xdz1QFy2EbMTcKwVXZ1kozcH6u-vIU */
