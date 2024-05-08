<?php
// Requerir la ruta del archivo
require("../class/db_class.php");

// Uso los paquetes en el archivo llamando primero el namespace y después la clase a usar
use Database\DB;

if (
  isset($_REQUEST['nombre']) &&
  isset($_REQUEST['apellido1']) &&
  isset($_REQUEST['apellido2']) &&
  isset($_REQUEST['dni']) &&
  isset($_REQUEST['birthday']) &&
  isset($_REQUEST['email']) &&
  isset($_REQUEST['direction']) &&
  isset($_REQUEST['phone']) &&
  isset($_REQUEST['submit'])
) {
  // Veo que me devuelve el formulario
  var_dump($_REQUEST);

  // Elimino las variables antes de crearlas
  unset($nombre, $apellido1, $apellido2, $birthday, $email, $direction, $phone, $submit);

  // Creo las variables
  $nombre = $_REQUEST["nombre"];
  $apellido1 = $_REQUEST["apellido1"];
  $apellido2 = $_REQUEST["apellido2"];
  $dni = $_REQUEST["dni"];
  $birthday = $_REQUEST["birthday"];
  $email = $_REQUEST["email"];
  $direction = $_REQUEST["direction"];
  $phone = $_REQUEST["phone"];
  $submit = $_REQUEST["submit"];

  // Creo conexión a la base de datos
  $myConnection = new DB("localhost", "root", "", "test");

  // Aplico el código SQL para crear la tabla
  $mySQLCode = "INSERT INTO clients (
      nombre,
      apellido1,
      apellido2,
      dni,
      birthday,
      email,
      direction,
      phone
    ) VALUES
    ('$nombre', '$apellido1', '$apellido2', '$dni', '$birthday', '$email', '$direction', '$phone');";

  $myConnection->execute($mySQLCode);

  // Al recargar la página no vuelve a realizar el registro del usuario
  header("Location: db_form_registered.php");
}
