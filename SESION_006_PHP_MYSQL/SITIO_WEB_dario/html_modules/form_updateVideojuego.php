<?php

// Conexión a la base de datos importando clase
require_once("./classes/db.php");

use Database\Db as Db;

$cnx = new Db("localhost", "root", "", "gameclubdario");


// PARTE 2.1: tomo el formulario oculto al cliente `hidden` escrito en `lista_videojuegos.php` después de cargar este archivo en `actual_videojuego`
if (isset($_POST['actualizarVideojuego'])) {

  // Aquí recibo la información enviada a través del formulario `lista_videojuegos.php` después de cargar este archivo en `actual_videojuego` porque el formulario realmente envía la información a `actual_videojuego`
  $idVideojuego = intval($_POST['videojuegoId']);
  $nameVideojuego = $_POST['videojuegoName'];
  $descripcionVideojuego = $_POST['videojuegoDescripcion'];
  $fechaPubVideojuego = $_POST['videojuegoFechaPub'];
  $isoCodeVideojuego = $_POST['videojuegoIsoCode'];
  $idGenero = intval($_POST['videojuegoGenero']);
  $idDesarrollador = intval($_POST['videojuegoDesarrollador']);
  $idPlataforma = intval($_POST['videojuegoPlataforma']);
  $idPegui = intval($_POST['videojuegoPegui']);

  //compruebo si la información está llegando
  // echo $idVideojuego;
  // echo $nameVideojuego;
}
?>

<?php // PARTE 2.2: envío la nueva información para actualizar la BD al archivo `actual_videojuego.php` 
?>
<!-- el enctype lo necesito para que escoja el input de tipo file -->
<form action="actual_videojuego.php" method="post" enctype="multipart/form-data">

  <label for="imagen">NUEVA IMAGEN</label>
  <input type="file" name="imagen" />

  <input type="hidden" id="videojuegoId" name="videojuegoId" value="<?= $idVideojuego ?>" />

  <label for="videojuegoName">NOMBRE</label>
  <input type="text" id="videojuegoName" name="videojuegoName" value="<?= strtoupper($nameVideojuego) ?>" />

  <label for="videojuegoFechaPub">FECHA</label>
  <input type="date" id="videojuegoFechaPub" name="videojuegoFechaPub" value="<?= $fechaPubVideojuego ?>" />

  <label for="videojuegoIsoCode">ISO Code</label>
  <input type="text" id="videojuegoIsoCode" name="videojuegoIsoCode" value="<?= $isoCodeVideojuego ?>" />

  <label>GENERO
    <select name="genero">
      <?php
      $sentenciaSQL = "SELECT generos.id, generos.nombre FROM generos";
      $itemsLista = $cnx->myQueryMultiple($sentenciaSQL, false);
      ?>
      <option value="0">Escoge un género</option>
      <?php
      foreach ($itemsLista as $key => $value) {
        if ($value[0] == $idGenero) { ?>
          <option value="<?= $value[0] ?>" selected><?= $value[1] ?></option>
        <?php
        } else {
        ?>
          <option value="<?= $value[0] ?>"><?= $value[1] ?></option>
      <?php
        }
      }
      ?>
    </select>
  </label>

  <label>DESARROLLADOR
    <select name="desarrollador">
      <?php
      $sentenciaSQL = "SELECT desarrolladores.id, desarrolladores.nombre FROM desarrolladores";
      $itemsLista = $cnx->myQueryMultiple($sentenciaSQL, false);
      ?>
      <option value="0">Escoge un desarrollador</option>
      <?php
      foreach ($itemsLista as $key => $value) {
        if ($value[0] == $idDesarrollador) { ?>
          <option value="<?= $value[0] ?>" selected><?= $value[1] ?></option>
        <?php
        } else {
        ?>
          <option value="<?= $value[0] ?>"><?= $value[1] ?></option>
      <?php
        }
      }
      ?>
    </select>
  </label>

  <label>PLATAFORMA
    <select name="plataforma">
      <?php
      $sentenciaSQL = "SELECT plataformas.id, plataformas.nombre FROM plataformas";
      $itemsLista = $cnx->myQueryMultiple($sentenciaSQL, false);
      ?>
      <option value="0">Escoge una plataforma</option>
      <?php
      foreach ($itemsLista as $key => $value) {
        if ($value[0] == $idPlataforma) { ?>
          <option value="<?= $value[0] ?>" selected><?= $value[1] ?></option>
        <?php
        } else {
        ?>
          <option value="<?= $value[0] ?>"><?= $value[1] ?></option>
      <?php
        }
      }
      ?>
    </select>
  </label>

  <label>PEGI
    <select name="pegui">
      <?php
      $sentenciaSQL = "SELECT pegui.id, pegui.descripcion FROM pegui";
      $itemsLista = $cnx->myQueryMultiple($sentenciaSQL, false);
      ?>
      <option value="0">Escoge una PEGI</option>
      <?php
      foreach ($itemsLista as $key => $value) {
        if ($value[0] == $idPegui) { ?>
          <option value="<?= $value[0] ?>" selected><?= $value[1] ?></option>
        <?php
        } else {
        ?>
          <option value="<?= $value[0] ?>"><?= $value[1] ?></option>
      <?php
        }
      }
      ?>
    </select>
  </label>

  <label>DESCRIPCIÓN
    <textarea name="videojuegoDescripcion"><?= $descripcionVideojuego ?></textarea>
  </label>
  <br />
  <input type="submit" name="actualizar_videojuego" value="ACTUALIZAR VIDEOJUEGO" />

</form>

<?php



?>
