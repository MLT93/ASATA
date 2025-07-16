<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <meta name="keywords" content="Curso, Formación, Examen" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css" />
    <title>AÑADIR INGREDIENTES</title>
  </head>

  <body>

    <h1>FORMULARIO</h1>

    <form action="panelBurguer.php" method="post" >

      <label for="ingrediente">INGREDIENTE</label>
      <input type="text" name="ingrediente" id="ingrediente" />

      <label for="stock">STOCK</label>
      <input type="number" name="stock" id="stock" />


      <label for="costeU">COSTE UNITARIO</label>
      <input type="number" name="costeU" id="costeU" />


      <input type="submit" name="incluir" id="submit" value="send" />
    </form>
  </body>
</html>


<?php

require_once("../CLASES/bd.php");

use Database\Db as Db;

if (
isset($_REQUEST["ingrediente"]) &&
isset($_REQUEST["stock"]) &&
isset($_REQUEST["costeU"]) &&
isset($_REQUEST["incluir"])
){

$cnx = new Db("localhost","root","","burger");

$campos = ["nombreIngrediente","stock","costeUnitario"];


$ingrediente = $_REQUEST['ingrediente'];
$stock = intval($_REQUEST['stock']);
$coste = floatval($_REQUEST['costeU']);



$data = [
    [$ingrediente, $stock, $coste]
];

$cnx->insertData("ingredientes",$campos,$data);

header("Location: panelBurguer.php");

}



?>