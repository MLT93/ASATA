INDEX /server/index.php

<?php

// Importar archivos
require_once("./DB/DB.php");
require_once("./classes/SesionDB.php");

// Asegurarme de ver todos los errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Habilitar CORS para permitir peticiones desde cualquier origen
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Allow: GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

// Si la solicitud es OPTIONS, no es necesario procesar más
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  http_response_code(200);
  echo "HTTP/1.1 / 200 OK";
  exit();
}

// Solicitud es GET LOGIN
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  unset($_POST["METHOD"]);

  $response = GET("SELECT * FROM usuarios");
  var_dump($response);

  // Verificar si se reciben los campos esperados
  if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Construir consulta DB
    comprobarUsuario($email, $password);
    $usuario = new \SessionDB\Session();
  } else {
    // Datos incompletos
    echo json_encode(["success" => false, "message" => "Email and password are required"]);
  }
} else {
  // Método no permitido
  http_response_code(405);
  echo json_encode(["success" => false, "message" => "Method not allowed"]);
}

  // Manejo del método POST
  // Manejo del método PUT
  // Manejo del método DELETE
