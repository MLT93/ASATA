<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <title>REGISTRAR VIDEOJUEGO</title>
</head>

<body>

  <?php
  // var_dump($arrGames);
  ?>

  <form action="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/gameclubExercise/store" method="post" target="_self" enctype="multipart/form-data">

    <label for="nombreID">NOMBRE</label>
    <input type="text" name="nombre" id="nombreID">

    <label for="descripcionID">DESCRIPCIÓN</label>
    <textarea name="descripcion" id="descripcionID"></textarea>

    <label for="genero">GENERO</label>
    <select name="genero" id="generoID">
      <option value="0">Elige un género</option>
      <?php
      /* 
      1. El Controller (intermediario entre el Model y la View) Utiliza el Model (donde realiza la consulta a la DB) y envía la información (la variable) a la View (donde está lo que ve el usuario)
      2. Se encargará de enviar la variable `$arrTrabajadores` (array asociativo que viene de la class `Controller`)
    */
      foreach ($arrGeneros as $key => $value) { ?>
        <option value="<?= $value['id'] ?>"> <?= $value["nombre"] ?> </option>
      <?php
      }
      ?>
    </select>

    <label for="desarrolladorID">DESARROLLADOR</label>
    <select name="desarrollador" id="desarrolladorID">
      <option value="0">Elige un desarrollador</option>
      <?php
      /* 
      1. El Controller (intermediario entre el Model y la View) Utiliza el Model (donde realiza la consulta a la DB) y envía la información (la variable) a la View (donde está lo que ve el usuario)
      2. Se encargará de enviar la variable `$arrTrabajadores` (array asociativo que viene de la class `Controller`)
    */
      foreach ($arrDesarrolladores as $key => $value) { ?>
        <option value="<?= $value['id'] ?>"> <?= $value["nombre"] ?> </option>
      <?php
      }
      ?>
    </select>

    <label for="plataformaID">PLATAFORMA</label>
    <select name="plataforma" id="plataformaID">
      <option value="0">Elige una plataforma</option>
      <?php
      /* 
      1. El Controller (intermediario entre el Model y la View) Utiliza el Model (donde realiza la consulta a la DB) y envía la información (la variable) a la View (donde está lo que ve el usuario)
      2. Se encargará de enviar la variable `$arrTrabajadores` (array asociativo que viene de la class `Controller`)
    */
      foreach ($arrPlataformas as $key => $value) { ?>
        <option value="<?= $value['id'] ?>"> <?= $value["nombre"] ?> </option>
      <?php
      }
      ?>
    </select>

    <label for="peguiID">PEGI</label>
    <select name="pegui" id="peguiID">
      <option value="0">Elige una PEGI</option>
      <?php
      /* 
      1. El Controller (intermediario entre el Model y la View) Utiliza el Model (donde realiza la consulta a la DB) y envía la información (la variable) a la View (donde está lo que ve el usuario)
      2. Se encargará de enviar la variable `$arrTrabajadores` (array asociativo que viene de la class `Controller`)
    */
      foreach ($arrPeguis as $key => $value) { ?>
        <option value="<?= $value['id'] ?>"> <?= $value["descripcion"] ?> </option>
      <?php
      }
      ?>
    </select>

    <label for="fechaPublicacionID">FECHA DE PUBLICACIÓN</label>
    <input type="date" name="fechaPublicacion" id="fechaPublicacionID">

    <label for="isoCodeID">CÓDIGO ISO</label>
    <input type="text" name="isoCode" id="isoCodeID">

    <label for="imagenID">IMAGEN</label>
    <input type="file" name="imagen" id="imagenID">

    <label for="tarifaID">TARIFA</label>
    <select name="tarifa" id="tarifaID">
      <option value="0">Elige una tarifa</option>
      <?php
      /* 
      1. El Controller (intermediario entre el Model y la View) Utiliza el Model (donde realiza la consulta a la DB) y envía la información (la variable) a la View (donde está lo que ve el usuario)
      2. Se encargará de enviar la variable `$arrTrabajadores` (array asociativo que viene de la class `Controller`)
    */
      foreach ($arrTarifas as $key => $value) { ?>
        <option value="<?= $value['id'] ?>"> <?= $value["tipo"] ?> </option>
      <?php
      }
      ?>
    </select>

    <label for="precioID">PRECIO</label>
    <input type="number" name="precio" id="precioID" step="0.01"> <!-- `step="0.01"` permite escribir decimales -->

    <input type="submit" name="registrarVideojuego" value="REGISTRAR">

  </form>

</body>

</html>
