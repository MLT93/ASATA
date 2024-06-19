<?php
//* PERMITO CORS DE UNA DIRECCIÓN URL ESPECÍFICA */
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Verifica el método de la solicitud
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  // Las solicitudes OPTIONS son utilizadas por los navegadores para verificar qué métodos están permitidos
  http_response_code(200);
  exit();
}

$proxyUrl = 'http://localhost:80'; // URL del proxy configurado en Apache
$targetUrl = 'http://localhost:80/ASATA/PROYECTO/server/credentials/registro.php'; // URL del backend PHP

// $ch = curl_init();

// curl_setopt($ch, CURLOPT_URL, $targetUrl);
// curl_setopt($ch, CURLOPT_PROXY, $proxyUrl);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

// $response = curl_exec($ch);


// if (curl_errno($ch)) {
//   echo 'cURL Error: ' . curl_error($ch);
// } else {
//   var_dump($response);
// }

// curl_close($ch);

//* OBTENGO LAS CREDENCIALES AUTH Y LA INFO AGREGADA EN EL HEADER */
// var_dump($_SERVER);
if (isset($_SERVER)) {
  echo "User: ". $_SERVER["PHP_AUTH_USER"] . "<br/>";
  echo "Password: ". $_SERVER["PHP_AUTH_PW"] . "<br/>";
  echo "Email: ". $_SERVER["HTTP_EMAIL"] . "<br/>";
} else {
  echo "<h3>No se han recibido las credenciales</h3>";
}

//* VEO LA INFORMACIÓN DE LA RESPUESTA SEGÚN EL MÉTODO DE LA PETICIÓN */
$method = $_SERVER['REQUEST_METHOD'];

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
