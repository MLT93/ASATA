<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="Marcos Lambir Torres" />
  <meta name="description" content="JavaScript" />
  <meta name="keywords" content="Curso, Formación, Examen" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css" />
  <link rel="stylesheet" href="../03_panel_gameclubdario/css/style_gameclubdario.css" />
  <title>Curso ASATA - MYSQL</title>
</head>

<?php
// Requerir la ruta archivos
require_once("../../class/db_class.php");

// Uso paquetes del archivo
use Database\DB;

// Activar almacenamiento en el búfer de salida. Esto recoge toda la salida del script hasta que decidas enviarla al navegador, permitiendo modificar las cabeceras en cualquier momento del script
// Permite modificar las cabeceras en cualquier momento
ob_start();

// Conexión a la base de datos
$connection = new DB("localhost", "root", "", "gameclubdario");
?>

<header>
  <h1>FORMULARIO PARA AGREGAR INFORMACIÓN A UNA DATABASE</h1>
</header>

<body>
  <main>

    <!-- Alquileres -->
    <form action="./panel_gameclubdario.php" method="post" target="_self">
      <fieldset>
        <legend>ALQUILERES</legend>

        <label for="fechaAlquilerID">FECHA ALQUILER</label>
        <input type="date" name="fechaAlquiler" id="fechaAlquilerID" />

        <label for="idClienteID">CLIENTE</label>
        <!-- <input type="text" name="idCliente" id="idClienteID" /> -->
        <select name="idCliente" id="idClienteID">
          <?php
          $sqlQuery = "SELECT clientes.id, clientes.nombre FROM clientes;";
          $arrIdCliente = $connection->myQueryCodeMultiple($sqlQuery, false);
          foreach ($arrIdCliente as $key => $value) { ?>
            <option value="<?= $value[0] ?>"> <?= $value[1] ?> </option>
          <?php
          }
          ?>
        </select>

        <label for="idVideojuegoID">VIDEOJUEGO</label>
        <!-- <input type="text" name="idVideojuego" id="idVideojuegoID" /> -->
        <select name="idVideojuego" id="idVideojuegoID">
          <?php
          $sqlQuery = "SELECT videojuegos.id, videojuegos.nombre FROM videojuegos";
          $arrIdVideojuego = $connection->myQueryCodeMultiple($sqlQuery, false);
          foreach ($arrIdVideojuego as $key => $value) { ?>
            <option value="<?= $value[0] ?>"> <?= $value[1] ?> </option>
          <?php
          }
          ?>
        </select>

        <label for="idTarifaID">TARIFAS</label>
        <!-- <input type="text" name="idTarifa" id="idTarifaID" /> -->
        <select name="idTarifa" id="idTarifaID">
          <?php
          $sqlQuery = "SELECT tarifas.id, tarifas.tipo FROM tarifas";
          $arrIdTarifas = $connection->myQueryCodeMultiple($sqlQuery, false);
          foreach ($arrIdTarifas as $key => $value) { ?>
            <option value="<?= $value[0] ?>"> <?= $value[1] ?> </option>
          <?php
          }
          ?>
        </select>

        <label for="fechaDevoID">FECHA DEVOLUCIÓN</label>
        <input type="date" name="fechaDevo" id="fechaDevoID" />

        <label for="idEmpleadoID">EMPLEADO</label>
        <!-- <input type="text" name="idEmpleado" id="idEmpleadoID" /> -->
        <select name="idEmpleado" id="idEmpleadoID">
          <?php
          $sqlQuery = "SELECT empleados.id, empleados.nombre, empleados.apellido1 FROM empleados";
          $arrIdEmpleado = $connection->myQueryCodeMultiple($sqlQuery, false);
          foreach ($arrIdEmpleado as $key => $value) { ?>
            <option value="<?= $value[0] ?>"> <?= $value[1] . " " . $value[2] ?> </option>
          <?php
          }
          ?>
        </select>

        <label for="idMetodoPagoID">MÉTODO DE PAGO</label>
        <!-- <input type="text" name="idMetodoPago" id="idMetodoPagoID" /> -->
        <select name="idMetodoPago" id="idMetodoPagoID">
          <?php
          $sqlQuery = "SELECT id, metodo FROM metodospago";
          $arrIdMetodoPago = $connection->myQueryCodeMultiple($sqlQuery, false);
          foreach ($arrIdMetodoPago as $key => $value) { ?>
            <option value="<?= $value[0] ?>"> <?= $value[1] ?> </option>
          <?php
          }
          ?>
        </select>
      </fieldset>

      <button type="submit" name="submitAlquiler" id="submitAlquilerID">Enviar Nuevo Alquiler</button>
    </form>

    <hr>

    <!-- Categorías -->
    <form action="./panel_gameclubdario.php" method="post" target="_self">
      <fieldset>
        <legend>CATEGORÍAS</legend>

        <label for="categoriaID">CATEGORÍA EMPLEADO</label>
        <input type="text" name="categoria" id="categoriaID" />

        <label for="rangoID">RANGO EMPLEADO</label>
        <input type="text" name="rango" id="rangoID" />
      </fieldset>

      <button type="submit" name="submitCategoria" id="submitCategoriaID">Enviar Nueva Categoría</button>
    </form>

    <hr>

    <!-- Clientes -->
    <form action="./panel_gameclubdario.php" method="post" target="_self">
      <fieldset>
        <legend>CLIENTES</legend>

        <label for="nombreClienteID">NOMBRE</label>
        <input type="text" name="nombre" id="nombreClienteID" />

        <label for="apellido1ClienteID">PRIMER APELLIDO</label>
        <input type="text" name="apellido1" id="apellido1ClienteID" />

        <label for="apellido2ClienteID">SEGUNDO APELLIDO</label>
        <input type="text" name="apellido2" id="apellido2ClienteID" />

        <label for="emailClienteID">E-MAIL</label>
        <input type="email" name="email" id="emailClienteID" />

        <label for="passwordID">PASSWORD</label>
        <input type="password" name="password" id="passwordID" />

        <label for="tlfClienteID">TELÉFONO</label>
        <input type="text" name="tlf" id="tlfClienteID" />

        <label for="direccionClienteID">DIRECCIÓN</label>
        <input type="text" name="direccion" id="direccionClienteID" />

        <label for="dniClienteID">DNI</label>
        <input type="text" name="dni" id="dniClienteID" />

        <label for="numTarjetaID">NÚMERO DE LA TARJETA</label>
        <input type="text" name="numTarjeta" id="numTarjetaID" />

        <label for="fechaNacimientoID">FECHA DE NACIMIENTO</label>
        <input type="date" name="fechaNacimiento" id="fechaNacimientoID" />

        <label>ES SOCIO¿?
          <input type="checkbox" name="isSocio" />
        </label>
      </fieldset>

      <button type="submit" name="submitCliente" id="submitClienteID">Enviar Nuevo Cliente</button>
    </form>

    <hr>

    <!-- Desarrolladores -->
    <form action="./panel_gameclubdario.php" method="post" target="_self">
      <fieldset>
        <legend>DESARROLLADORES</legend>

        <label for="nombreDesarrolladorID">NOMBRE</label>
        <input type="text" name="nombre" id="nombreDesarrolladorID" />

        <label for="indieID">INDIE</label>
        <input type="text" name="indie" id="indieID" />

        <label for="countryID">PAÍS</label>
        <input type="text" name="country" id="countryID" />

        <label for="ciudadID">CIUDAD</label>
        <input type="text" name="ciudad" id="ciudadID" />

        <label for="codPostalID">CÓDIGO POSTAL</label>
        <input type="text" name="codPostal" id="codPostalID" />

        <label for="emailDesarrolladorID">E-MAIL</label>
        <input type="email" name="email" id="emailDesarrolladorID" />
      </fieldset>

      <button type="submit" name="submitDesarrollador" id="submitDesarrolladorID">Enviar Nuevo Desarrollador</button>
    </form>

    <hr>

    <!-- Empleados -->
    <form action="./panel_gameclubdario.php" method="post" target="_self">
      <fieldset>
        <legend>EMPLEADOS</legend>

        <label for="nombreEmpleadoID">NOMBRE</label>
        <input type="text" name="nombre" id="nombreEmpleadoID" />

        <label for="apellidoEmpleado1ID">PRIMER APELLIDO</label>
        <input type="text" name="apellido1" id="apellido1EmpleadoID" />

        <label for="apellido2EmpleadoID">SEGUNDO APELLIDO</label>
        <input type="text" name="apellido2" id="apellido2EmpleadoID" />

        <label for="dniEmpleadoID">DNI</label>
        <input type="text" name="dni" id="dniEmpleadoID" />

        <label for="nSSID">NÚMERO SEG. SOCIAL</label>
        <input type="text" name="nSS" id="nSSID" />

        <label for="tlfEmpleadoID">TELÉFONO</label>
        <input type="text" name="tlf" id="tlfEmpleadoID" />

        <label for="direccionEmpleadoID">DIRECCIÓN</label>
        <input type="text" name="direccion" id="direccionEmpleadoID" />

        <label for="idCategoriaID">CATEGORÍA</label>
        <input type="text" name="idCategoria" id="idCategoriaID" />

        <label for="fechaAltaID">FECHA DE ALTA</label>
        <input type="date" name="fechaAlta" id="fechaAltaID" />
      </fieldset>

      <button type="submit" name="submitEmpleado" id="submitEmpleadoID">Enviar Nuevo Empleado</button>
    </form>

    <hr>

    <!-- Genero -->
    <form action="./panel_gameclubdario.php" method="post" target="_self">
      <fieldset>
        <legend>GÉNERO</legend>

        <label for="nombreGeneroID">TIPO</label>
        <input type="text" name="nombre" id="nombreGeneroID" />

        <label for="descripcionGeneroID">DESCRIPCIÓN</label>
        <textarea name="descripcion" id="descripcionGeneroID"></textarea>
      </fieldset>

      <button type="submit" name="submitGenero" id="submitGeneroID">Enviar Nuevo Género</button>
    </form>

    <hr>

    <!-- Métodos de Pago -->
    <form action="./panel_gameclubdario.php" method="post" target="_self">
      <fieldset>
        <legend>MÉTODOS DE PAGO</legend>

        <label for="metodoPagoID">MÉTODO DE PAGO</label>
        <input type="text" name="metodoPago" id="metodoPagoID" />
      </fieldset>

      <button type="submit" name="submitMetodoPago" id="submitMetodoPagoID">Enviar Nuevo Método de Pago</button>
    </form>

    <hr>

    <!-- Pegui -->
    <form action="./panel_gameclubdario.php" method="post" target="_self">
      <fieldset>
        <legend>PEGI</legend>

        <label for="peguiID">PEGI</label>
        <input type="text" name="pegui" id="peguiID" />

        <label for="descripcionPeguiID">DESCRIPCIÓN</label>
        <textarea name="descripcion" id="descripcionPeguiID"></textarea>
      </fieldset>

      <button type="submit" name="submitPegui" id="submitPeguiID">Enviar Nuevo Pegi</button>
    </form>

    <hr>

    <!-- Plataformas -->
    <form action="./panel_gameclubdario.php" method="post" target="_self">
      <fieldset>
        <legend>PLATAFORMAS</legend>

        <label for="nombrePlataformaID">NOMBRE</label>
        <input type="text" name="nombre" id="nombrePlataformaID" />

        <label for="empresaMatrizID">EMPRESA MATRIZ</label>
        <input type="text" name="empresaMatriz" id="empresaMatrizID" />

        <label for="tipoLectorID">TIPO DE LECTOR</label>
        <input type="text" name="tipoLector" id="tipoLectorID" />

        <label for="fechaLanzamientoID">FECHA DE LANZAMIENTO</label>
        <input type="text" name="fechaLanzamiento" id="fechaLanzamientoID" />

        <label>ES DE COLECCIONISTA¿?
          <input type="checkbox" name="isColeccionista" />
        </label>

        <label for="versionID">VERSIÓN</label>
        <input type="text" name="version" id="versionID" />
      </fieldset>

      <button type="submit" name="submitPlataforma" id="submitPlataformaID">Enviar Nueva Plataforma</button>
    </form>

    <hr>

    <!-- Tarifas -->
    <form action="./panel_gameclubdario.php" method="post" target="_self">
      <fieldset>
        <legend>TARIFAS</legend>

        <label for="tipoID">TIPO</label>
        <input type="text" name="tipo" id="tipoID" />

        <label for="costeID">COSTE</label>
        <input type="text" name="coste" id="costeID" />

        <label>ES TARIFA DE SOCIO¿?
          <input type="checkbox" name="paraSocios" />
        </label>

        <label>ESTÁ ACTIVA¿?
          <input type="checkbox" name="activa" />
        </label>

        <label for="descuentoSociosID">DESCUENTO APLICABLE</label>
        <input type="text" name="descuentoSocios" id="descuentoSociosID" />
      </fieldset>

      <button type="submit" name="submitTarifa" id="submitTarifaID">Enviar Nueva Tarifa</button>
    </form>

    <hr>

    <!-- Videojuegos -->
    <form action="./panel_gameclubdario.php" method="post" target="_self">
      <fieldset>
        <legend>VIDEOJUEGOS</legend>

        <label for="nombreVideojuegoID">NOMBRE</label>
        <input type="text" name="nombre" id="nombreVideojuegoID" />

        <label for="descripcionVideojuegoID">DESCRIPCIÓN</label>
        <textarea name="descripcion" id="descripcionVideojuegoID"></textarea>

        <label for="idGeneroID">GÉNERO</label>
        <!-- <input type="text" name="idGenero" id="idGeneroID" /> -->
        <select name="idGenero" id="idGeneroID">
          <?php
          $sqlQuery = "SELECT id, nombre FROM genero";
          $arrIdGenero = $connection->myQueryCodeMultiple($sqlQuery, false);
          foreach ($arrIdGenero as $key => $value) { ?>
            <option value="<?= $value[0] ?>"> <?= $value[1] ?> </option>
          <?php
          }
          ?>
        </select>

        <label for="idDesarrolladorID">DESARROLLADOR</label>
        <!-- <input type="text" name="idDesarrollador" id="idDesarrolladorID" /> -->
        <select name="idDesarrollador" id="idDesarrolladorID">
          <?php
          $sqlQuery = "SELECT id, nombre FROM desarrolladores";
          $arrIdDesarrolladores = $connection->myQueryCodeMultiple($sqlQuery, false);
          foreach ($arrIdDesarrolladores as $key => $value) { ?>
            <option value="<?= $value[0] ?>"> <?= $value[1] ?> </option>
          <?php
          }
          ?>
        </select>

        <label for="idPlataformaID">PLATAFORMA</label>
        <!-- <input type="text" name="idPlataforma" id="idPlataformaID" /> -->
        <select name="idPlataforma" id="idPlataformaID">
          <?php
          $sqlQuery = "SELECT id, nombre FROM plataformas";
          $arrIdPlataformas = $connection->myQueryCodeMultiple($sqlQuery, false);
          foreach ($arrIdPlataformas as $key => $value) { ?>
            <option value="<?= $value[0] ?>"> <?= $value[1] ?> </option>
          <?php
          }
          ?>
        </select>

        <label for="idPeguiID">PEGI</label>
        <!-- <input type="text" name="idPegui" id="idPeguiID" /> -->
        <select name="idPegui" id="idPeguiID">
          <?php
          $sqlQuery = "SELECT id, descripcion FROM pegui";
          $arrIdPegui = $connection->myQueryCodeMultiple($sqlQuery, false);
          foreach ($arrIdPegui as $key => $value) { ?>
            <option value="<?= $value[0] ?>"> <?= $value[1] ?> </option>
          <?php
          }
          ?>
        </select>

        <label for="fechaPublicacionID">FECHA PUBLICACIÓN</label>
        <input type="text" name="fechaPublicacion" id="fechaPublicacionID" />

        <label for="isoCodeID">CÓDIGO ISO</label>
        <input type="text" name="isoCode" id="isoCodeID" />
      </fieldset>

      <button type="submit" name="submitVideojuego" id="submitVideojuegoID">Enviar Nuevo Videojuego</button>
    </form>

    <hr>

  </main>
</body>

</html>

<?php

# Tabla alquileres
// Comprobar envío del formulario
if (isset($_POST["submitAlquiler"])) {

  // Variables formulario
  $fechaAlquiler = $_POST["fechaAlquiler"];
  $idCliente = intval($_POST["idCliente"]);
  $idVideojuego = intval($_POST["idVideojuego"]);
  $idTarifa = intval($_POST["idTarifa"]);
  $fechaDevo = $_POST["fechaDevo"];
  $idEmpleado = intval($_POST["idEmpleado"]);
  $idMetodoPago = intval($_POST["idMetodoPago"]);

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
  $isSocio = boolval($_POST["isSocio"]);

  $camposDB = ["nombre", "apellido1", "apellido2", "email", "password", "telefono", "direccion", "dni", "numTarjeta", "fechaNacimiento", "socio"];
  $dataDB = [$nombre, $apellido1, $apellido2, $email, $password, $telefono, $direccion, $dni, $numTarjeta, $fechaNacimiento, $isSocio];

  $connection->insertSingleRegister("clientes", $camposDB, $dataDB);

  header("Location: panel_gameclubdario.php");
}

# Tabla desarrolladores
if (isset($_POST["submitDesarrollador"])) {

  $nombre = $_POST["nombre"];
  $indie = $_POST["indie"];
  $pais = $_POST["pais"];
  $ciudad = $_POST["ciudad"];
  $codPostal = $_POST["codPostal"];
  $email = $_POST["email"];

  $camposDB = ["nombre", "indie", "pais", "ciudad", "zip", "direccion", "email"];
  $dataDB = [$nombre, $indie, $pais, $ciudad, $codPostal, $email];

  $connection->insertSingleRegister("desarrolladores", $camposDB, $dataDB);

  header("Location: panel_gameclubdario.php");
}

# Tabla empleados
if (isset($_POST["submitEmpleado"])) {

  $nombre = $_POST["nombre"];
  $apellido1 = $_POST["apellido1"];
  $apellido2 = $_POST["apellido2"];
  $dni = $_POST["dni"];
  $nSS = $_POST["nSS"];
  $tlf = $_POST["tlf"];
  $direccion = $_POST["direccion"];
  $idCategoria = intval($_POST["idCategoria"]);
  $fechaAlta = $_POST["fechaAlta"];

  $camposDB = ["nombre", "apellido1", "apellido2", "dni", "nSS", "telefono", "direccion", "id_categoria", "fechaAlta"];
  $dataDB = [$nombre, $apellido1, $apellido2, $nSS, $tlf, $direccion, $idCategoria, $fechaAlta];

  $connection->insertSingleRegister("empleados", $camposDB, $dataDB);

  header("Location: panel_gameclubdario.php");
}

# Tabla genero
if (isset($_POST["submitGenero"])) {

  $nombre = $_POST["nombre"];
  $descripcion = $_POST["descripcion"];

  $camposDB = ["nombre", "descripcion"];
  $dataDB = [$nombre, $descripcion];

  $connection->insertSingleRegister("genero", $camposDB, $dataDB);

  header("Location: panel_gameclubdario.php");
}

# Tabla metodospago
if (isset($_POST["submitMetodoPago"])) {

  $metodoPago = $_POST["metodoPago"];

  $camposDB = ["metodo"];
  $dataDB = [$metodoPago];

  $connection->insertSingleRegister("metodospago", $camposDB, $dataDB);

  header("Location: panel_gameclubdario.php");
}

# Tabla pegui
if (isset($_POST["submitPegui"])) {

  $pegui = $_POST["pegui"];
  $descripcion = $_POST["descripcion"];

  $camposDB = ["pegui", "descripcion"];
  $dataDB = [$pegui, $descripcion];

  $connection->insertSingleRegister("pegui", $camposDB, $dataDB);

  header("Location: panel_gameclubdario.php");
}

# Tabla plataformas
if (isset($_POST["submitPlataforma"])) {

  $nombre = $_POST["nombre"];
  $empresaMatriz = $_POST["empresaMatriz"];
  $tipoLector = $_POST["tipoLector"];
  $fechaLanzamiento = $_POST["fechaLanzamiento"];
  $isColeccionista = boolval($_POST["isColeccionista"]);
  $version = $_POST["version"];

  $camposDB = ["nombre", "empresaMatriz", "tipoLector", "fechaLanzamiento", "coleccionista", "version"];
  $dataDB = [$nombre, $empresaMatriz, $tipoLector, $fechaLanzamiento, $isColeccionista, $version];

  $connection->insertSingleRegister("plataformas", $camposDB, $dataDB);

  header("Location: panel_gameclubdario.php");
}

# Tabla tarifas
if (isset($_POST["submitTarifa"])) {

  $tipo = $_POST["tipo"];
  $coste = $_POST["coste"];
  $isParaSocios = intval($_POST["paraSocios"]);
  $isActiva = boolval($_POST["activa"]);
  $descuentoSocios = $_POST["descuentoSocios"];

  $camposDB = ["tipo", "coste", "paraSocios", "activa", "descuentoSocios"];
  $dataDB = [$tipo, $coste, $isParaSocios, $isActiva, $descuentoSocios];

  $connection->insertSingleRegister("tarifas", $camposDB, $dataDB);

  header("Location: panel_gameclubdario.php");
}

# Tabla videojuegos
if (isset($_POST["submitVideojuego"])) {

  $nombre = $_POST["nombre"];
  $descripcion = $_POST["descripcion"];
  $idGenero = intval($_POST["idGenero"]);
  $idDesarrollador = intval($_POST["idDesarrollador"]);
  $idPlataforma = intval($_POST["idPlataforma"]);
  $idPegui = intval($_POST["idPegui"]);
  $fechaPublicacion = $_POST["fechaPublicacion"];
  $isoCode = $_POST["isoCode"];

  $camposDB = ["nombre", "descripcion", "id_genero", "id_desarrollador", "id_plataforma", "id_pegui", "fechaPublicacion", "isoCode"];
  $dataDB = [$nombre, $descripcion, $idGenero, $idDesarrollador, $idPlataforma, $idPegui, $fechaPublicacion, $isoCode,];

  $connection->insertSingleRegister("videojuegos", $camposDB, $dataDB);

  header("Location: panel_gameclubdario.php");
}

?>
