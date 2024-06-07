<?php

require_once("./classes/db.php");


use Database\Db as Db;

$cnx = new Db("localhost", "root", "", "concesionario");
$sentenciaSQL = "SELECT * FROM productos";

$listaCoches = $cnx->myQueryMultiple($sentenciaSQL); // Asociativa

// var_dump($listaCoches);
?>

<form class='catalogo' action='reg_factura.php' method='post'>

  <div id='galeria'>
    <?php
    //  listaCoches es un matriz (array de arrays)
    // $value es un array de esa matriz, para acceder a los valores dentro del array uso los indices asociativos
    foreach ($listaCoches as $key => $value) {
    ?>
      <!-- saco iterativamente todos los coches y los pinto -->
      <div class='elementoGaleria'>
        <img class='redondeado' src='<?= $value['imagen'] ?>' />
        <hr />
        <span><?= $value['nombre'] ?> <?= $value['precio'] ?>€</span>
        <input type="radio" name="<?= $value['id'] ?>" id="id<?= $value['id'] ?>" class='nameGallery'>
      </div>
    <?php
    }
    ?>
  </div>

  <div class="container_separator">
    <div class="container_separator_column">
      <label for="fechaID">Fecha de entrega del coche</label>
      <input type="date" name="fecha" id="fechaID">

      <label for="diasID">Número de días de alquiler</label>
      <input type="number" name="numDias" id="diasID">

    <input type="submit" name="coches" value="ALQUILA" />
    </div>
  </div>

</form>


<?php

?>
