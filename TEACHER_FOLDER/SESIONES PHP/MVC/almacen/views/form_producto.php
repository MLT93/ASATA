<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <title>REGISTRAR PRODUCTO</title>
</head>

<body>

  <label for="">NOMBRE</label>
  <input type="text" name="" id="">

  <label for="">CATEGORÍA</label>
  <select name="" id="">
    <option value=""></option>
    <?php
    /* 
      1. El Controller (intermediario entre el Model y la View) Utiliza el Model (donde realiza la consulta a la DB) y envía la información (la variable) a la View (donde está lo que ve el usuario)
      2. Se encargará de enviar la variable `$categorias` (array asociativo que viene de la class `CategoriaController`)
    */
    foreach ($categorias as $key => $value) { ?>
      <option value="<?= $value[0] ?>"> <?= $value[1] ?> <?= $value[2] ?>€</option>
    <?php
    }
    ?>
  </select>

  <label for="">PROVEEDOR</label>
  <select name="" id="">
    <option value=""></option>
    <?php
    /* 
      1. El Controller (intermediario entre el Model y la View) Utiliza el Model (donde realiza la consulta a la DB) y envía la información (la variable) a la View (donde está lo que ve el usuario)
      2. Se encargará de enviar la variable `$proveedores` (array asociativo que viene de la class `ProveedorController`)
    */
    foreach ($proveedores as $key => $value) { ?>
      <option value="<?= $value[0] ?>"> <?= $value[1] ?> <?= $value[2] ?>€</option>
    <?php
    }
    ?>
  </select>

  <label for="">PRECIO</label>
  <input type="number" name="" id="" step="0.01"> <!-- `step="0.01"` permite escribir decimales -->

  <label for="">STOCK</label>
  <input type="number" name="" id="">

</body>

</html>
