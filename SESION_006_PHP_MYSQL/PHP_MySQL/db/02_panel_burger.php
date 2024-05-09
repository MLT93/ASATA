<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="Marcos Lambir Torres" />
  <meta name="description" content="JavaScript" />
  <meta name="keywords" content="Curso, Formación, Examen" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css" />
  <title>Curso ASATA - MYSQL</title>
</head>

<body>
  <h1>FORMULARIO</h1>
  <form action="02_panel_burger.php" method="post" target="_self">
    <label for="ingredienteID">INGREDIENTE</label>
    <input type="text" name="ingrediente" id="ingredienteID" />

    <label for="stockID">STOCK</label>
    <input type="number" name="stock" id="stockID" />

    <label for="costeID">COSTE UNITARIO</label>
    <input type="number" name="coste" id="costeID" />

    <input type="submit" name="submitIngredient" id="submitIngredientID" value="send" />
  </form>
</body>

</html>

<?php
require_once("../class/db_class.php");

use Database\DB;

if (
  isset($_POST["ingrediente"]) &&
  isset($_POST["stock"]) &&
  isset($_POST["coste"]) &&
  isset($_POST["submitIngredient"])
) {
  $cnx = new DB("localhost", "root", "", "burger");

  $ingrediente = $_POST["ingrediente"];
  $stock = intval($_POST["stock"]);
  $coste = floatval($_POST["coste"]);

  $campos = ["nombreIngrediente", "stock", "costeUnitario"];
  $data = [$ingrediente, $stock, $coste];

  $cnx->insertSingleRegister("ingredientes", $campos, $data);

  header("Location: 02_panel_burger.php");
}
?>
