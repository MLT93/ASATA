<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <title>REGISTRAR PRODUCTO</title>
</head>

<body>

  <?php
  // var_dump($arrProveedores);
  ?>

  <form action="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/proveedores/store" method="post" target="_self">

    <label for="nombreID">NOMBRE</label>
    <input type="text" name="nombre" id="nombreID">

    <label for="contactoID">CONTACTO</label>
    <input type="email" name="contacto" id="contactoID">

    <input type="submit" name="registrarProveedor" value="REGISTRAR">

  </form>

</body>

</html>
