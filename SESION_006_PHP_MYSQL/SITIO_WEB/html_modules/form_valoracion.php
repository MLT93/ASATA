<form action="./reg_valoracion.php" method="post" target="_self">

  <div class="reg">
    <label for="idAlquilerID">ULTIMO ALQUILER</label>
    <!-- <input type="text" name="idVideojuego" id="idVideojuegoID" /> -->
    <select name="idAlquiler" id="idAlquilerID" disabled>
      <?php
      require_once("./classes/BaseDatosUsuario.php");

      use BaseDatosUsuario\BaseDatosUsuario as Usuario;

      $idUsuario = Usuario::mostrarIdUsuario($_SESSION['usuario']);

      $sqlQuery = "SELECT alquileres.id, videojuegos.nombre FROM alquileres INNER JOIN videojuegos ON alquileres.id_videojuego = videojuegos.id WHERE alquileres.id_cliente = $idUsuario ORDER BY alquileres.id DESC LIMIT 0, 1";
      $arrIdVideojuego = $cnx->myQueryMultiple($sqlQuery, false);
      foreach ($arrIdVideojuego as $key => $value) { ?>
        <option value="<?= $value[0] ?>"> <?= strtoupper($value[1]) ?> </option>
      <?php
      }
      ?>
    </select>
  </div>

  <div class="reg">
    <label for="valoracionID">VALORACION</label>
    <select name="valoracion" id="valoracionID">
      <option value=""></option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
  </div>

  <input type="submit" name="enviarValoracion" id="enviarValoracionID" value="ENVIAR VALORACIÓN">
</form>
