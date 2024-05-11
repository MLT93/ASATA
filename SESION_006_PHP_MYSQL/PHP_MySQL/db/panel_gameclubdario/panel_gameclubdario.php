<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="Marcos Lambir Torres" />
  <meta name="description" content="JavaScript" />
  <meta name="keywords" content="Curso, Formación, Examen" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css" />
  <link rel="stylesheet" href="./css/panel_burger.css">
  <title>Curso ASATA - MYSQL</title>
</head>

<?php
// Requerir la ruta archivos
require_once("../../class/db_class.php");

// Uso paquetes del archivo
use Database\DB;

// Middleware que permite modificar las cabeceras en cualquier parte del código
ob_start();

// Conexión a la base de datos
$connection = new DB("localhost", "root", "mysql", "gameclubdario");
?>

<header>
  <h1>FORMULARIO PARA AGREGAR INFORMACIÓN A UNA DATABASE</h1>
</header>

<body>
  <main>

    <!-- Alquileres -->
    <form action="./panel_gameclubdario.php" method="post" target="_self">
      <label for="fechaAlquilerID">FECHA ALQUILER</label>
      <input type="date" name="fechaAlquiler" id="fechaAlquilerID" />

      <label for="idClienteID">ID CLIENTE</label>
      <input type="text" name="idCliente" id="idClienteID" />

      <label for="idVideojuegoID">ID VIDEOJUEGO</label>
      <input type="text" name="idVideojuego" id="idVideojuegoID" />

      <label for="idTarifaID">ID TARIFAS</label>
      <input type="text" name="idTarifa" id="idTarifaID" />

      <label for="fechaDevoID">FECHA DEVOLUCIÓN</label>
      <input type="date" name="fechaDevo" id="fechaDevoID" />

      <label for="idEmpleadoID">ID EMPLEADO</label>
      <input type="text" name="idEmpleado" id="idEmpleadoID" />

      <label for="idMetodoPagoID">ID MÉTODO DE PAGO</label>
      <input type="text" name="idMetodoPago" id="idMetodoPagoID" />

      <input type="submit" name="submitAlquiler" id="submitAlquilerID" value="ingrediente" />
    </form>

    <hr>

    <!-- Categorías -->
    <form action="./panel_gameclubdario.php" method="post" target="_self">
      <label for="categoriaID">CATEGORÍA EMPLEADO</label>
      <input type="text" name="categoria" id="categoriaID" />

      <label for="rangoID">RANGO EMPLEADO</label>
      <input type="text" name="rango" id="rangoID" />

      <input type="submit" name="submitCategoria" id="submitCategoriaID" value="ingrediente" />
    </form>

    <hr>

    <!-- Clientes -->
    <form action="./panel_gameclubdario.php" method="post" target="_self">
      <label for="nombreID">NOMBRE</label>
      <input type="text" name="nombre" id="nombreID" />

      <label for="apellido1ID">PRIMER APELLIDO</label>
      <input type="text" name="apellido1" id="apellido1ID" />

      <label for="apellido2ID">SEGUNDO APELLIDO</label>
      <input type="text" name="apellido2" id="apellido2ID" />

      <label for="emailID">E-MAIL</label>
      <input type="email" name="email" id="emailID" />

      <label for="passwordID">PASSWORD</label>
      <input type="password" name="password" id="passwordID" />

      <label for="tlfID">TELÉFONO</label>
      <input type="text" name="tlf" id="tlfID" />

      <label for="direccionID">DIRECCIÓN</label>
      <input type="text" name="direccion" id="direccionID" />

      <label for="dniID">DNI</label>
      <input type="text" name="dni" id="dniID" />

      <label for="numTarjetaID">NÚMERO DE LA TARJETA</label>
      <input type="text" name="numTarjeta" id="numTarjetaID" />

      <label for="fechaNacimientoID">FECHA DE NACIMIENTO</label>
      <input type="date" name="fechaNacimiento" id="fechaNacimientoID" />

      <label for="isSocioID">DIRECCIÓN</label>
      <input type="checkbox" name="isSocio" id="isSocioID" />

      <input type="submit" name="submitCliente" id="submitClienteID" value="ingrediente" />
    </form>

    <hr>

  </main>
</body>

</html>

<?php

# Tabla alquileres
// Comprobar envío del formulario
if (isset($_POST["submitAlquiler"])) {

  // -Variables formulario
  $fechaAlquiler = $_POST["fechaAlquiler"];
  $idCliente = $_POST["idCliente"];
  $idVideojuego = $_POST["idVideojuego"];
  $idTarifa = $_POST["idTarifa"];
  $fechaDevo = $_POST["fechaDevo"];
  $idEmpleado = $_POST["idEmpleado"];
  $idMetodoPago = $_POST["idMetodoPago"];

  // Variables database
  $camposDB = ["fechaAlquiler", "id_cliente", "id_videojuego", "id_tarifas", "fechaDevolucion", "id_empleado", "id_metodoPago"];
  $dataDB = [$fechaAlquiler, $idCliente, $idVideojuego, $idTarifa, $fechaDevo, $idEmpleado, $idMetodoPago];

  // Escribo en la database
  $connection->insertSingleRegister("alquileres", $camposDB, $dataDB);

  // Envío el cliente a otra página o la recargo
  header("Location: panel_gameclubdario.php");
}

# Tabla categorias
if (isset($_POST["submitCategoria"])) {

  $categoria = $_POST["categoria"];
  $rango = $_POST["rango"];

  $camposDB = ["categoria", "rango"];
  $dataDB = [$categoria, $rango];

  $connection->insertSingleRegister("categorias", $camposDB, $dataDB);
}

# Tabla clientes
if (isset($_POST["submitClientes"])) {

  $nombre = $_POST["nombre"];
  $apellido1 = $_POST["apellido1"];
  $apellido2 = $_POST["apellido2"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $telefono = $_POST["tlf"];
  $direccion = $_POST["direccion"];
  $dni = $_POST["dni"];
  $numTarjeta = $_POST["numTarjeta"];
  $fechaNacimiento = $_POST["fechaNacimiento"];
  $isSocio = $_POST["isSocio"];

  $camposDB = ["nombre", "apellido1", "apellido2", "email", "password", "telefono", "direccion", "dni", "numTarjeta", "fechaNacimiento", "socio"];
  $dataDB = [$nombre, $apellido1, $apellido2, $email, $password, $telefono, $direccion, $dni, $numTarjeta, $fechaNacimiento, $isSocio];

  $connection->insertSingleRegister("clientes", $camposDB, $dataDB);

  header("Location: panel_gameclubdario.php");
}

?>
