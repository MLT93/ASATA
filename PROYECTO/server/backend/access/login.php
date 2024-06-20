<?php
// Asegurarme de ver todos los errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Habilitar CORS para permitir peticiones desde cualquier origen
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Allow: GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Si la solicitud es OPTIONS, no es necesario procesar más
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  http_response_code(200);
  exit();
}

// Verificar que se están enviando datos por GET
if ($_SERVER['REQUEST_METHOD'] === "POST") {
  // Verificar si se reciben los campos esperados
  if (isset($_REQUEST['email']) && isset($_REQUEST['password'])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    // Realizar la conexión a la base de datos y validar los datos del usuario
    $emailDB = 'admin@mail.com';
    $passwordDB = '1234';

    if ($email === $emailDB && $password === $passwordDB) {
      // Usuario válido
      echo json_encode(["success" => true, "message" => "Login successful $email"]);
      // header("Location: http://localhost:5173/home");
    } else {
      // Usuario inválido
      echo json_encode(["success" => false, "message" => "Invalid email or password"]);
    }

    /* // Comprobar usuario en la base de datos
    $cnx = new \mysqli(DB_HOSTT, DB_USERR, DB_PASSS, DB_NAMEE);
    $SQL = "SELECT hashedPassword FROM usuarios WHERE email = '$email'";
    $result = $cnx->query($SQL);
    
    if ($result->num_rows > 0) {
      $matrixAssoc = $result->fetch_all(MYSQLI_ASSOC); // Matriz asociativo
      $hashedPassword = $matrixAssoc[0]['hashedPassword'];

      if ($password == $hashedPassword) {
        // Usuario válido
        echo json_encode(["success" => true, "message" => "Login successful"]);
      } else {
        // Usuario inválido
        echo json_encode(["success" => false, "message" => "Invalid email or password"]);
      }
    } */
  } else {
    // Datos incompletos
    echo json_encode(["success" => false, "message" => "Username and password are required"]);
  }
} else {
  // Método no permitido
  http_response_code(405);
  echo json_encode(["success" => false, "message" => "Method not allowed"]);
}
