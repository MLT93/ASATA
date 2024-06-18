<?php
//* PERMITO CORS DE UNA DIRECCIÓN URL ESPECÍFICA */
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Accept, Authorization, X-Requested-With, X-Auth-Token, Origin, Application, X-API-KEY, Access-Control-Request-Method");
header("Content-Type: application/json; charset=UTF-8");
header("Allow: GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Accept: */*");
header("Cors: no-cors");

//* OBTENGO LA INFORMACIÓN DEL SERVIDOR */
var_dump($_SERVER);

//* OBTENGO LAS CREDENCIALES AUTH Y LA INFO AGREGADA EN EL HEADER */
if (isset($_SERVER)) {
  // echo $_SERVER["PHP_AUTH_USER"] . "<br/>";
  // echo $_SERVER["PHP_AUTH_PW"] . "<br/>";
  // echo $_SERVER["HTTP_EMAIL"] . "<br/>";
} else {
  echo "<h3>No se ha recibido información</h3>";
}

$method = $_SERVER['REQUEST_METHOD'];
var_dump($method);

switch ($method) {
  case 'GET':
    # code...
    break;
  case 'POST':
    # code...
    break;
  case 'PUT':
    # code...
    break;
  case 'DELETE':
    # code...
    break;

  default:
    # code...
    break;
}
