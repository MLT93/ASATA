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
  // var_dump($arrTrabajadores);
  // var_dump($arrTiposJornada);
  ?>

  <form action="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/fichajes/store" method="post" target="_self">

    <label for="trabajadorID">TRABAJADOR</label>
    <select name="trabajador" id="trabajadorID">
      <option value="">Elige un trabajador</option>
      <?php
      /* 
      1. El Controller (intermediario entre el Model y la View) Utiliza el Model (donde realiza la consulta a la DB) y envía la información (la variable) a la View (donde está lo que ve el usuario)
      2. Se encargará de enviar la variable `$arrTrabajadores` (array asociativo que viene de la class `Controller`)
    */
      foreach ($arrTrabajadores as $key => $value) { ?>
        <option value="<?= $value['id'] ?>"> <?= $value["nombre"] ?> </option>
      <?php
      }
      ?>
    </select>

    <label for="tipoJornadaID">TIPO JORNADA</label>
    <select name="tipoJornada" id="tipoJornadaID">
      <option value="0">Elige un tipo de jornada</option>
      <?php
      /* 
      1. El Controller (intermediario entre el Model y la View) Utiliza el Model (donde realiza la consulta a la DB) y envía la información (la variable) a la View (donde está lo que ve el usuario)
      2. Se encargará de enviar la variable `$arrTiposJornada` (array asociativo que viene de la class `Controller`)
    */
      foreach ($arrTiposJornada as $key => $value) { ?>
        <option value="<?= $value['id'] ?>"> <?= $value["descripcion"] ?> </option>
      <?php
      }
      ?>
    </select>

    <label for="fechaID">FECHA</label>
    <input type="date" name="fecha" id="fechaID">

    <label for="horaEntradaID">HORA ENTRADA</label>
    <input type="datetime" name="horaEntrada" id="horaEntradaID">

    <label for="horaSalidaID">HORA ENTRADA</label>
    <input type="datetime" name="horaSalida" id="horaSalidaID">

    <input type="submit" name="registrar" value="REGISTRAR">

  </form>

</body>

</html>
