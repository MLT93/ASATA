<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <title>REGISTRAR</title>
</head>

<body>

  <?php
  // var_dump($grupos);
  ?>

  <form action="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/estudio/alumno/store" method="post" target="_self">

    <label for="nombreID">NOMBRE</label>
    <input type="text" name="nombre" id="nombreID">

    <label for="apellido1ID">PRIMER APELLIDO</label>
    <input type="text" name="apellido1" id="apellido1ID">

    <label for="apellido2ID">SEGUNDO APELLIDO</label>
    <input type="text" name="apellido2" id="apellido2ID">

    <label for="dniID">DNI</label>
    <input type="text" name="dni" id="dniID" maxlength="10">

    <label for="grupoID">GRUPO</label>
    <select name="grupo" id="grupoID">
      <option value="0">Elige un grupo</option>
      <?php
      /* 
      1. El Controller (intermediario entre el Model y la View) Utiliza el Model (donde realiza la consulta a la DB) y envía la información (la variable) a la View (donde está lo que ve el usuario)
      2. Se encargará de enviar la variable `$grupos` (Matriz numérica con arrays asociativos que viene de la class `Controller`)
    */
      foreach ($grupos as $key => $value) { ?>
        <option value="<?= $value['id'] ?>"> <?= $value["tag"] ?> </option>
      <?php
      }
      ?>
    </select>

    <br />
    <input type="submit" name="registrar" value="REGISTRAR">

  </form>

</body>

</html>
