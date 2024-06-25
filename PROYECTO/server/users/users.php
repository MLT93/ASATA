<?php

// Importar archivos
// require_once("../db/DB.php");
require_once(__DIR__ . '/../db/DB.php');

require_once("../classes/SesionDB.php");

// Asegurarme de ver todos los errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Habilitar CORS para permitir peticiones desde cualquier origen
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

// Solicitud OPTIONS
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  http_response_code(200);
  exit();
}

// Solicitud GET usuarios
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  try {
    $SQL = "SELECT * FROM usuarios";
    $usuarios = GET($SQL);
    if ($usuarios === null) {
      throw new Exception("Failed to fetch users");
    }
    http_response_code(200);
    echo json_encode(["success" => true, "data" => $usuarios]);
  } catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
  }
} else {
  http_response_code(400);
  echo json_encode(["success" => false, "message" => "Bad request"]);
}

// Solicitud POST usuarios
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {

    // Falta la info recibida por $_POST;

    POST("usuarios", ["id_rol", "username", "email", "hashedPassword"], [["2", "userPrueba", "userPrueba@mail.com", "1234"]]);
    if ($usuarios === null) {
      throw new Exception("Failed to fetch users");
    }
    http_response_code(200);
    echo json_encode(["success" => true, "data" => $usuarios]);
  } catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
  }
} else {
  http_response_code(400);
  echo json_encode(["success" => false, "message" => "Bad request"]);
}
