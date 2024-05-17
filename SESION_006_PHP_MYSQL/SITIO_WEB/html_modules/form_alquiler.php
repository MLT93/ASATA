<form action="./reg_alquiler.php" method="post" target="_self">

  <div class="reg">
    <label for="idVideojuegoID">VIDEOJUEGO</label>
    <!-- <input type="text" name="idVideojuego" id="idVideojuegoID" /> -->
    <select name="idVideojuego" id="idVideojuegoID">
      <option value=""></option>
      <?php
      $sqlQuery = "SELECT videojuegos.id, videojuegos.nombre FROM videojuegos";
      $arrIdVideojuego = $cnx->myQueryMultiple($sqlQuery, false);
      foreach ($arrIdVideojuego as $key => $value) { ?>
        <option value="<?= $value[0] ?>"> <?= $value[1] ?> </option>
      <?php
      }
      ?>
    </select>
  </div>

  <div class="reg">
    <label for="idTarifaID">TARIFAS</label>
    <!-- <input type="text" name="idTarifa" id="idTarifaID" /> -->
    <select name="idTarifa" id="idTarifaID">
      <option value=""></option>
      <?php
      $sqlQuery = "SELECT tarifas.id, tarifas.tipo FROM tarifas";
      $arrIdTarifas = $cnx->myQueryMultiple($sqlQuery, false);
      foreach ($arrIdTarifas as $key => $value) { ?>
        <option value="<?= $value[0] ?>"> <?= $value[1] ?> </option>
      <?php
      }
      ?>
    </select>
  </div>

  <div class="reg">
    <label for="idMetodoPagoID">MÉTODO DE PAGO</label>
    <!-- <input type="text" name="idMetodoPago" id="idMetodoPagoID" /> -->
    <select name="idMetodoPago" id="idMetodoPagoID">
      <option value=""></option>
      <?php
      $sqlQuery = "SELECT id, metodo FROM metodospago";
      $arrIdMetodoPago = $cnx->myQueryMultiple($sqlQuery, false);
      foreach ($arrIdMetodoPago as $key => $value) { ?>
        <option value="<?= $value[0] ?>"> <?= $value[1] ?> </option>
      <?php
      }
      ?>
    </select>
  </div>

  <input type="submit" name="enviarAlquiler" id="enviarAlquilerID" value="ENVIAR NUEVO ALQUILER">
</form>
