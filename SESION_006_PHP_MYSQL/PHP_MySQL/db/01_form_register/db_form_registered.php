<?php
// Requerir la ruta del archivo
require("../../class/db_class.php");

// Activar almacenamiento en el búfer de salida. Esto recoge toda la salida del script hasta que decidas enviarla al navegador, permitiendo modificar las cabeceras en cualquier momento del script
// Permite modificar las cabeceras en cualquier momento
ob_start();

// Uso los paquetes en el archivo llamando primero el namespace y después la clase a usar
use Database\DB;

// Creo conexión a la base de datos
$myConnection = new DB("localhost", "root", "", "tienda");

// Si existe submit, es que se ha enviado el formulario y hay información enviada al formulario
if (isset($_REQUEST['submit'])) {

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

  // Aplico el código SQL para crear la tabla
  $mySQLCode2 = "INSERT INTO clientes (
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

  // Ejecuto el código SQL en la DB
  $myConnection->execute($mySQLCode2);

  // Envío el cliente a otra página o la recargo
  header("Location: db_form_registered.php");
}
