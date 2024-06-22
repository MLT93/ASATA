<?php

// Importar archivos
require_once(__DIR__ . "/constantVariables.php"); // Se incluye el `__DIR__` para que tome toda la ruta del PC. No es válida la ruta relativa en este archivo

// Asegurarme de ver todos los errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Habilitar CORS para permitir peticiones desde cualquier origen
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

/**
 * Summary of GET
 * @param string $sentenceSQL Sentencia SQL para realizar la consulta a la DB. No hace falta poner el `;` al final
 * @return array | null Devuelve `Matriz de índices con arrays asociativos` con la respuesta de la DB o `null` si la consulta se ha realizado mal
 */
function GET(string $sentenceSQL)
{
  try {
    // Realiza la conexión a la base de datos al instanciar
    $cnx = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $cnx->set_charset("utf8");

    // Verificar conexión
    if ($cnx->connect_error) {
      http_response_code(500);
      echo json_encode(["success" => false, "message" => "Connection failed: " . $cnx->connect_error]);
    }

    // Consulta DB
    $response = $cnx->query($sentenceSQL);

    if (!$response) {
      echo json_encode(["success" => false, "message" => "Query execution failed: " . $cnx->error]);
    }

    $result = $response->fetch_all(MYSQLI_ASSOC); // Matriz asociativa

    // Cerrar conexión y devolver resultado
    $cnx->close();
    return $result;
  } catch (\Throwable $th) {
    // Manejar excepciones
    echo json_encode(["success" => false, "message" => "Exception: " . $th->getMessage()]);
    return null;
  }
}
$usuarios = GET("SELECT * FROM usuarios");
http_response_code(200);
echo json_encode(["success" => true, "message" => $usuarios]);

/**
 * Summary of POST
 * @param string $tableName Nombre de la tabla de la DB
 * @param array $campos Campos de la tabla donde se añadirá la data
 * @param array $data `Matriz de índices con arrays asociativos` de registros para los campos donde la tabla
 * @return null No devuelve nada. Emite un mensaje satisfactorio o no, dependiendo del buen fin del `INSERT` realizado
 */
function POST(string $tableName, array $campos, array $data)
{
  try {

    // Realiza la conexión a la base de datos al instanciar
    $cnx = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $cnx->query("SET CHARSET utf8");

    // Verificar conexión
    if ($cnx->connect_error) {
      http_response_code(500);
      die(json_encode(["success" => false, "message" => "Connection failed: " . $cnx->connect_error]));
    }

    // Construir Consulta DB
    $SQL = "INSERT INTO " . $tableName . " (" . implode(", ", $campos) . ") VALUES ";

    $stringRegistros = "";
    foreach ($data as $fila) {

      $valores = array_map(function ($valor) {
        return is_string($valor) ? "'" . $valor . "'" : $valor; // Manejo de números y strings en la inserción de registros
      }, $fila);

      $stringRegistros .= "(" . implode(", ", $valores) . "),";
    }
    $stringRegistros = rtrim($stringRegistros, ",");

    $SQL .= $stringRegistros;

    // Ejecutar consulta
    if ($cnx->query($SQL) === true) {
      echo json_encode(["success" => true, "message" => "Data inserted successfully"]);
    } else {
      echo json_encode(["success" => false, "message" => "Error: " . $SQL . " - " . $cnx->error]);
    }

    // Cerrar conexión
    $cnx->close();
  } catch (\Throwable $th) {
    echo json_encode(["success" => false, "message" => "Exception: " . $th->getMessage()]);
  }
}
// POST("usuarios", ["id_rol", "username", "email", "hashedPassword"], [["2", "userPrueba", "userPrueba@mail.com", "1234"]]);

/**
 * Summary of PUT
 * @param string $tableName Nombre de la tabla de la DB
 * @param array $campos Campos de la tabla donde se actualizará la data
 * @param array $data `Matriz de índices con arrays asociativos` de registros para actualizar
 * @param string $condition Condición `WHERE` para la actualización (opcional)
 * @return void No devuelve nada. Emite un mensaje satisfactorio o no, dependiendo del buen fin del `UPDATE` realizado
 */
function PUT(string $tableName, array $campos, array $data, string $condition = "")
{
  try {
    // Realiza la conexión a la base de datos al instanciar
    $cnx = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $cnx->set_charset("utf8");

    // Verificar conexión
    if ($cnx->connect_error) {
      http_response_code(500);
      die(json_encode(["success" => false, "message" => "Connection failed: " . $cnx->connect_error]));
    }

    // Construir consulta DB
    $SQL = "UPDATE " . $tableName . " SET ";
    $sets = [];
    foreach ($campos as $campo) {
      $sets[] = "$campo = ?";
    }
    $SQL .= implode(", ", $sets);

    // Si se proporciona una condición WHERE, agregarla a la consulta
    if (!empty($condition)) {
      $SQL .= " WHERE " . $condition;
    }

    // Preparar la declaración
    $stmt = $cnx->prepare($SQL);
    if (!$stmt) {
      die(json_encode(["success" => false, "message" => "Preparation of statement failed: " . $cnx->error]));
    }

    // Bind parameters
    /*
      1. Agrega variables a una sentencia preparada como sus VALUES
      2. Recibe parámetros:
          1. Type (Una cadena que contiene uno o más caracteres que especifican los tipos para el correspondiente enlazado de variables)
              `i`	la variable correspondiente es de tipo entero
              `d`	la variable correspondiente es de tipo double
              `s`	la variable correspondiente es de tipo string
              `b`	la variable correspondiente es un blob y se envía en paquetes
          2. Las variables correspondientes a la cantidad de VALUES a ingresar en la consulta
    */
    $types = str_repeat("s", count($campos)); // Assume all fields are strings for simplicity
    $params = [];
    foreach ($data as $fila) {
      foreach ($fila as $valor) {
        $params[] = $valor;
      }
    }
    $stmt->bind_param($types, ...$params);

    // Ejecutar consulta
    if ($stmt->execute()) {
      echo json_encode(["success" => true, "message" => "Data updated successfully"]);
    } else {
      echo json_encode(["success" => false, "message" => "Error: " . $SQL . " - " . $stmt->error]);
    }

    // Cerrar conexión y declaración
    $stmt->close();
    $cnx->close();
  } catch (\Throwable $th) {
    echo json_encode(["success" => false, "message" => "Exception: " . $th->getMessage()]);
  }
}
// PUT("usuarios", ["username", "hashedPassword"], [["master", "1111"]], "id = 1");

/**
 * Summary of DEL
 * @param string $tableName Nombre de la tabla de la DB
 * @param string $condition Condición WHERE para la eliminación
 * @return void No devuelve nada. Emite un mensaje satisfactorio o no, dependiendo del buen fin del `DELETE` realizado
 */
function DEL(string $tableName, string $condition)
{
  try {
    // Realizar la conexión a la base de datos al instanciar
    $cnx = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $cnx->set_charset("utf8");

    // Verificar conexión
    if ($cnx->connect_error) {
      http_response_code(500);
      throw new Exception("Connection failed: " . $cnx->connect_error);
    }

    // Construir consulta DB
    $SQL = "DELETE FROM " . $tableName . " WHERE " . $condition;

    // Ejecutar consulta
    if ($cnx->query($SQL) === true) {
      echo json_encode(["success" => true, "message" => "Data deleted successfully"]);
    } else {
      echo json_encode(["success" => false, "message" => "Error: " . $SQL . " - " . $cnx->error]);
    }

    // Cerrar conexión
    $cnx->close();
  } catch (\Throwable $th) {
    echo json_encode(["success" => false, "message" => "Exception: " . $th->getMessage()]);
  }
}
// DEL("usuarios", "id = 4");

/**
 * Summary of ComprobarUsuario
 * @param string $email Email del usuario a comprobar. Debe ser de tipo UNIQUE en la DB
 * @param string $password Password del usuario
 * @return boolean Devuelve `true` o `false` si la password es correcta o no
 */
function comprobarUsuario(string $email, string $password): bool
{
  try {

    // Realiza la conexión a la base de datos al instanciar
    $cnx = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $cnx->query("SET CHARSET utf8");

    // Verificar conexión
    if ($cnx->connect_error) {
      http_response_code(500);
      die(json_encode(["success" => false, "message" => "Connection failed: " . $cnx->connect_error]));
    }

    // Consulta DB
    $SQL = "SELECT * FROM usuarios WHERE email = '$email';";
    $response = $cnx->query($SQL);
    $result = $response->fetch_assoc(); // Array asociativo

    $hashedPassword = $result['hashedPassword'];

    // // Verificación de la contraseña si es hashedPassword
    // if (password_verify($password, $hashedPassword)) {
    //   // Usuario válido
    //   http_response_code(200);
    //   echo json_encode(["success" => true, "message" => "Login successful $email"]);

    //   // Cierro y devuelvo resultado
    //   $cnx->close();
    //   return true;
    // } else {

    //   // Usuario inválido
    //   http_response_code(404);
    //   echo json_encode(["success" => false, "message" => "Invalid email or password"]);

    //   // Cierro y devuelvo resultado
    //   $cnx->close();
    //   return false;
    // }

    // Verificación de la contraseña
    if ($password === $hashedPassword) {

      // Usuario válido
      http_response_code(200);
      echo json_encode(["success" => true, "message" => "Login successful $email"]);

      // Cierro y devuelvo resultado
      $cnx->close();
      return true;
    } else {

      // Usuario inválido
      http_response_code(404);
      echo json_encode(["success" => false, "message" => "Invalid email or password"]);

      // Cierro y devuelvo resultado
      $cnx->close();
      return false;
    }
  } catch (\Throwable $th) {
    echo json_encode(["success" => false, "message" => "Exception: " . $th->getMessage()]);
    return false;
  }
}
// comprobarUsuario("admin@mail.com", "1111");
