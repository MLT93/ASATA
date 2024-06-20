<?php
// QUITAR PROYECTO REACT DE `htdocs`
//* PERMITO CORS DE UNA DIRECCIÓN URL ESPECÍFICA */
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Allow: GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Accept, Authorization, X-Requested-With, X-Auth-Token, Origin, Application, X-API-KEY, Access-Control-Request-Method");
header("Content-Type: application/json; charset=UTF-8");

$input = json_decode(file_get_contents("php://input"), true);

if (isset($input['username']) && isset($input['password'])) {
  $username = $input['username'];
  $password = $input['password'];

  // Conexión a la base de datos (ajusta estos valores según tu configuración)
  $servername = "localhost";
  $database = "nombre_de_tu_base_de_datos";
  $db_username = "tu_usuario";
  $db_password = "tu_contraseña";

  // Crear conexión
  $conn = new mysqli($servername, $db_username, $db_password, $database);

  // Verificar conexión
  if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Connection failed: " . $conn->connect_error]));
  }

  // Comprobar usuario en la base de datos
  $sql = "SELECT * FROM usuarios WHERE username = ? AND password = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    // Usuario encontrado
    echo json_encode(["success" => true, "message" => "Login successful"]);
  } else {
    // Usuario no encontrado
    echo json_encode(["success" => false, "message" => "Invalid username or password"]);
  }

  $stmt->close();
  $conn->close();
} else {
  echo json_encode(["success" => false, "message" => "Username and password are required"]);
}
