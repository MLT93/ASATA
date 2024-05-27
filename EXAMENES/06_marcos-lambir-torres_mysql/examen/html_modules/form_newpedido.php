<?php
require_once("./classes/db.php");

use Database\Db as Db;

$cnx = new Db("localhost", "root", "", "restaurante");
?>


<form class="form_justificado" action="newpedido.php" method="post">


  <label for="producto">PRODUCTO</label>
  <select name="producto" id="producto">
    <option value='0'>Escoge un producto</option>
    <?php
    $consultaSQL = "SELECT * FROM productos;";
    $arrProductos = $cnx->myQueryMultiple($consultaSQL, false);

    foreach ($arrProductos as $key => $value) { ?>
      <option value="<?= $value[0] ?>"> <?= $value[1] ?> <?= $value[2] ?>€</option>
    <?php
    }
    ?>
  </select>

  <input type="submit" name="newpedido" value="REALIZAR PEDIDO">

</form>
