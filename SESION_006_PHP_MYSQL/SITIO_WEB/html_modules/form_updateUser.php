<!-- El `enctype=""` lo necesito para utilizar el input de tipo file -->
<form action="actual_user.php" method="post" enctype="multipart/form-data">

  <label for="imagenId">NUEVA IMAGEN</label>
  <input type="file" name="imagen" id="imagenId" />

  <input type="submit" name="actualizarImg" value="ACTUALIZAR IMAGEN" />

</form>
