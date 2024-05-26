<!-- el atributo de form `enctype="multipart/form-data"`, lo necesito para enviar imágenes -->
<form action="success_upload.php" method="post" enctype="multipart/form-data">

  <label for="usuario">USUARIO</label>
  <input type="text" name="usuario">

  <label for="descripcion">DESCRIPCION</label>
  <input type="text" name="descripcion">

  <label for="archivo"></label>
  <input type="file" name="archivo">

  <input type="submit" name="subir" value="subir imagen">

</form>
