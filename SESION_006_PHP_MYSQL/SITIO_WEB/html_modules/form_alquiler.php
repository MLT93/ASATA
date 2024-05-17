<form action="./reg_alquiler.php" method="post" target="_self">

  <div class="reg_alquiler">
    <label for="fechaAlquilerID">FECHA ALQUILER</label>
    <input type="date" name="fechaAlquiler" id="fechaAlquilerID" />
  </div>

  <div class="reg_alquiler">
    <label for="idClienteID">CLIENTE</label>
    <!-- <input type="text" name="idCliente" id="idClienteID" /> -->
    <select name="idCliente" id="idClienteID">
      <option value=""></option>
      <?php
      $sqlQuery = "SELECT clientes.id, clientes.nombre FROM clientes;";
      $arrIdCliente = $cnx->myQueryMultiple($sqlQuery, false);
      foreach ($arrIdCliente as $key => $value) { ?>
        <option value="<?= $value[0] ?>"> <?= $value[1] ?> </option>
      <?php
      }
      ?>
    </select>
  </div>

  <div class="reg_alquiler">
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

  <div class="reg_alquiler">
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

  <div class="reg_alquiler">
    <label for="fechaDevoID">FECHA DEVOLUCIÓN</label>
    <input type="date" name="fechaDevo" id="fechaDevoID" />
  </div>

  <div class="reg_alquiler">
    <label for="idEmpleadoID">EMPLEADO</label>
    <!-- <input type="text" name="idEmpleado" id="idEmpleadoID" /> -->
    <select name="idEmpleado" id="idEmpleadoID">
      <option value=""></option>
      <?php
      $sqlQuery = "SELECT empleados.id, empleados.nombre, empleados.apellido1 FROM empleados";
      $arrIdEmpleado = $cnx->myQueryMultiple($sqlQuery, false);
      foreach ($arrIdEmpleado as $key => $value) { ?>
        <option value="<?= $value[0] ?>"> <?= $value[1] . " " . $value[2] ?> </option>
      <?php
      }
      ?>
    </select>
  </div>

  <div class="reg_alquiler">
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
