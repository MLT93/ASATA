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
// Requerir la ruta del archivo
require_once("../../../class/db_class.php");
// Uso los paquetes en el archivo llamando primero el namespace y después la clase a usar
use Database\DB;
// Permite modificar las cabeceras en cualquier momento
ob_start();
// Creo una conexión a una base de datos con la clase que creé
$connection = new DB("localhost", "root", "", "burger");
?>

<header>
  <h1>FORMULARIO</h1>
</header>

<body>
  <main>

    <!-- Ingredientes -->
    <form action="./panel_burger.php" method="post" target="_self">
      <label for="ingredienteID">INGREDIENTE</label>
      <input type="text" name="ingrediente" id="ingredienteID" />

      <label for="stockID">STOCK</label>
      <input type="number" name="stock" id="stockID" />

      <label for="costeID">COSTE UNITARIO</label>
      <input type="number" name="coste" id="costeID" step="0.10" />

      <input type="submit" name="submitIngredient" id="submitIngredientID" value="ingrediente" />
    </form>

    <hr>

    <!-- Empleados -->
    <form action="./panel_burger.php" method="post" target="_self">
      <label for="nombreEmpleadoID">NOMBRE EMPLEADO</label>
      <input type="text" name="nombreEmpleado" id="nombreEmpleadoID">

      <label for="apellido1ID">APELLIDO 1</label>
      <input type="text" name="apellido1" id="apellido1ID">

      <label for="apellido2ID">APELLIDO 2</label>
      <input type="text" name="apellido2" id="apellido2ID">

      <label for="rolID">ROL</label>
      <input type="text" name="rol" id="rolID">

      <label for="fechaContrataID">FECHA CONTRATACIÓN</label>
      <input type="date" name="fechaContrata" id="fechaContrataID">

      <label for="salarioID">SALARIO</label>
      <input type="number" name="salario" id="salarioID">

      <input type="submit" name="submitEmpleado" id="submitEmpleadoID" value="empleado">
    </form>

    <hr>

    <!-- Categorías menú -->
    <form action="./panel_burger.php" method="post" target="_self">
      <label for="nombreCategoriaID">NOMBRE CATEGORÍA</label>
      <!-- <input type="text" name="nombreCategoria" id="nombreCategoriaID"> -->
      <select name="nombreCategoria" id="nombreCategoriaID">
        <?php
        $sqlQuery = "SELECT id, nombreCategoria FROM categoriasmenu";
        $listaEmpleados = $connection->myQueryCodeMultiple($sqlQuery, false);

        foreach ($listaEmpleados as $key => $value) { ?>
          <option value="<?= $value[0] ?>"><?= $value[1] ?></option>
        <?php
        }
        ?>
      </select>

      <label for="descripcionID">DESCRIPCIÓN</label>
      <input type="text" name="descripcion" id="descripcionID">

      <input type="submit" name="submitCategoria" id="submitCategoriaID" value="categoria">
    </form>

    <hr>

    <!-- Items menú -->
    <form action="./panel_burger.php" method="post" target="_self">
      <label for="categoriaIdID">CATEGORÍA ID</label>
      <input type="num" name="categoriaId" id="categoriaIdID">

      <label for="nombreItemID">NOMBRE ITEM</label>
      <!-- <input type="text" name="nombreItem" id="nombreItemID"> -->
      <select name="nombreItem" id="nombreItemID">
        <?php
        $connection = new DB("localhost", "root", "", "burger");
        $sqlQuery = "SELECT id, nombre FROM itemsmenu";
        $listaEmpleados = $connection->myQueryCodeMultiple($sqlQuery, false);

        foreach ($listaEmpleados as $key => $value) { ?>
          <option value="<?= $value[0] ?>"><?= $value[1] ?></option>
        <?php
        }
        ?>
      </select>

      <label for="precioID">PRECIO</label>
      <input type="number" name="precio" id="precioID">

      <label for="descripcionID">DESCRIPCIÓN</label>
      <input type="text" name="descripcion" id="descripcionID">

      <label for="disponibleID">DISPONIBLE</label>
      <input type="checkbox" name="disponible" id="disponibleID" checked>

      <input type="submit" name="submitItem" id="submitItemID" value="item">
    </form>

    <hr>

    <!-- Pedidos -->
    <form action="./panel_burger.php" method="post" target="_self">
      <label for="empleadoIdID">EMPLEADO ID</label>
      <!-- <input type="num" name="empleadoId" id="empleadoIdID"> -->
      <select name="empleadoId" id="empleadoIdID">
        <?php
        $connection = new DB("localhost", "root", "", "burger");
        $sqlQuery = "SELECT nombre FROM empleados";
        $listaEmpleados = $connection->myQueryCodeMultiple($sqlQuery, false);

        foreach ($listaEmpleados as $key => $value) { ?>
          <option value="<?= intval($key) + 1 ?>"><?= $value[0] ?></option>
        <?php
        }
        ?>
      </select>

      <label for="fechaPedidoID">FECHA PEDIDO</label>
      <input type="date" name="fechaPedido" id="fechaPedidoID">

      <label for="totalID">PRECIO</label>
      <input type="text" name="total" id="totalID">

      <input type="submit" name="submitPedido" id="submitPedidoID" value="pedido">
    </form>

    <hr>

    <!-- Recetas -->
    <form action="./panel_burger.php" method="post" target="_self">
      <label for="itemIdID">ITEM ID</label>
      <!-- <input type="num" name="itemId" id="itemIdID"> -->
      <select name="itemId" id="itemIdID">
        <?php
        $sqlQuery = "SELECT item_id FROM recetas";
        $listaEmpleados = $connection->myQueryCodeMultiple($sqlQuery, false);

        foreach ($listaEmpleados as $key => $value) { ?>
          <option value="<?= intval($key) + 1 ?>"><?= $value[0] ?></option>
        <?php
        }
        ?>
      </select>

      <label for="ingredienteIdID">INGREDIENTE ID</label>
      <!-- <input type="text" name="ingredienteId" id="ingredienteIdID"> -->
      <select name="ingredienteId" id="ingredienteIdID">
        <?php
        $sqlQuery = "SELECT ingrediente_id FROM recetas";
        $listaEmpleados = $connection->myQueryCodeMultiple($sqlQuery, false);

        foreach ($listaEmpleados as $key => $value) { ?>
          <option value="<?= intval($key) + 1 ?>"><?= $value[0] ?></option>
        <?php
        }
        ?>
      </select>

      <label for="cantidadID">CANTIDAD USADA</label>
      <input type="text" name="cantidad" id="cantidadID">

      <input type="submit" name="submitReceta" id="submitRecetaID" value="receta">
    </form>
  </main>
</body>

</html>

<?php
// Ingredientes
if (
  isset($_POST["ingrediente"]) &&
  isset($_POST["stock"]) &&
  isset($_POST["coste"]) &&
  isset($_POST["submitIngredient"])
) {
  $ingrediente = $_POST["ingrediente"];
  $stock = intval($_POST["stock"]);
  $coste = floatval($_POST["coste"]);

  $campos = ["nombreIngrediente", "stock", "costeUnitario"];
  $data = [$ingrediente, $stock, $coste];

  $connection->insertSingleRegister("ingredientes", $campos, $data);

  header("Location: panel_burger.php");
}

// Empleados
if (
  isset($_POST["nombreEmpleado"])  &&
  isset($_POST["apellido1"])  &&
  isset($_POST["apellido2"]) &&
  isset($_POST["rol"]) &&
  isset($_POST["fechaContrata"]) &&
  isset($_POST["salario"]) &&
  isset($_POST["submitEmpleado"])
) {
  $nombre = $_POST["nombreEmpleado"];
  $apellido1 = $_POST["apellido1"];
  $apellido2 = $_POST["apellido2"];
  $rol = $_POST["rol"];
  $fechaContrata = $_POST["fechaContrata"];
  $salario = $_POST["salario"];

  $campos = ["nombre", "apellido1", "apellido2", "rol", "fechaContratacion", "salario"];
  $data = [$nombre, $apellido1, $apellido2, $rol, $fechaContrata, $salario];

  $connection->insertSingleRegister("ingredientes", $campos, $data);

  header("Location: panel_burger.php");
}

// Categorías menú
if (
  isset($_POST["nombreCategoria"])  &&
  isset($_POST["descripcion"])  &&
  isset($_POST["submitCategoria"])
) {
  $nombreCategory = $_POST["nombreCategoria"];
  $description = $_POST["descripcion"];

  $campos = ["nombreCategoria", "descripcion"];
  $data = [$nombreCategory, $description];

  $connection->insertSingleRegister("ingredientes", $campos, $data);

  header("Location: panel_burger.php");
}

// Items menú
if (
  isset($_POST["categoriaId"])  &&
  isset($_POST["nombreItem"])  &&
  isset($_POST["precio"])  &&
  isset($_POST["descripcion"]) &&
  isset($_POST["disponible"]) &&
  isset($_POST["submitItem"])
) {
  $categoriaId = $_POST["categoriaId"];
  $nombreItem = $_POST["nombreItem"];
  $precio = intval($_POST["precio"]);
  $descriptionItem = $_POST["descripcion"];
  $isDisponible = $_POST["disponible"];

  $campos = ["category_id", "nombre", "precio", "descripcion", "disponible"];
  $data = [$categoriaId, $nombreItem, $precio, $descriptionItem, $isDisponible];

  $connection->insertSingleRegister("ingredientes", $campos, $data);

  header("Location: panel_burger.php");
}

// Pedidos
if (
  isset($_POST["empleadoId"])  &&
  isset($_POST["fechaPedido"])  &&
  isset($_POST["total"])  &&
  isset($_POST["submitPedido"])
) {
  $empleadoId = $_POST["empleadoId"];
  $fechaPedido = $_POST["fechaPedido"];
  $total = $_POST["total"];

  $campos = ["empleado_id", "fechaPedido", "total"];
  $data = [$empleadoId, $fechaPedido, $total];

  $connection->insertSingleRegister("ingredientes", $campos, $data);

  header("Location: panel_burger.php");
}

// Recetas
if (
  isset($_POST["itemId"])  &&
  isset($_POST["ingredienteId"])  &&
  isset($_POST["cantidad"])  &&
  isset($_POST["submitReceta"])
) {
  $itemId = $_POST["itemId"];
  $ingredienteId = $_POST["ingredienteId"];
  $cantidad = $_POST["cantidad"];

  $campos = ["item_id", "ingrediente_id", "cantidadUsada"];
  $data = [$itemId, $ingredienteId, $cantidad];

  $connection->insertSingleRegister("ingredientes", $campos, $data);

  header("Location: panel_burger.php");
}

?>
