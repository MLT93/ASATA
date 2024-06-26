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
  // var_dump($usuarios);
  // var_dump($actividades);
  ?>

  <form action="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/create_user_fitness/planning/store/" method="post" target="_self">

    <label for="nDiasPorSemanaID">Nº DÍAS POR SEMANA</label>
    <input type="number" name="nDiasPorSemana" id="nDiasPorSemanaID">

    <label for="kcalMedPerSessionID">KCAL A CONSUMIR POR ENTRENAMIENTO</label>
    <input type="number" name="kcalMedPerSession" id="kcalMedPerSessionID" min="300" max="700" maxlength="3">

    <label for="minPerSessionID">MINUTOS DEL ENTRENAMIENTO</label>
    <input type="number" name="minPerSession" id="minPerSessionID" min="45" max="120" maxlength="3">

    <label for="actividadID">ACTIVIDAD</label>
    <select name="actividad" id="actividadID">
      <option value="">Elige una actividad</option>
      <?php
      /* 
      1. El Controller (intermediario entre el Model y la View) Utiliza el Model (donde realiza la consulta a la DB) y envía la información (la variable) a la View (donde está lo que ve el usuario)
      2. Se encargará de enviar la variable que no se usa en el Controller
    */
      foreach ($actividades as $key => $value) { ?>
        <option value="<?= $value['id'] ?>"> <?= $value["nombre"] ?> </option>
      <?php
      }
      ?>
    </select>


    <label for="userID">USUARIO</label>
    <select name="user" id="userID">
      <option value="">Elige un usuario</option>
      <?php
      /* 
      1. El Controller (intermediario entre el Model y la View) Utiliza el Model (donde realiza la consulta a la DB) y envía la información (la variable) a la View (donde está lo que ve el usuario)
      2. Se encargará de enviar la variable que no se usa en el Controller
    */
      foreach ($usuarios as $key => $value) { ?>
        <option value="<?= $value['id'] ?>"> <?= $value["nombre"] ?> </option>
      <?php
      }
      ?>
    </select>

    <br />
    <input type="submit" name="registrar" value="REGISTRAR">

  </form>

  <br />
  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/create_user_fitness/planning/list/">VE A LA LISTA</a></button>

</body>

</html>
