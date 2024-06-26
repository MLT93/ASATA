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
  // var_dump($entrenamientos); // id, fecha_inicio, duracion, nickname, email, fecha_nacimiento, descripcion, consumo_Kcal_hora, fecha_prevista, estado
  // var_dump($actividades);
  // var_dump($plannings);
  // var_dump($usuarios);
  ?>

  <form action="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/fitness_activity/store/" method="post" target="_self">

    <label for="usuarioID">USUARIOS</label>
    <select name="usuario" id="usuarioID">
      <option value="0">Elige un usuario</option>
      <?php
      /* 
      1. El Controller (intermediario entre el Model y la View) Utiliza el Model (donde realiza la consulta a la DB) y envía la información (la variable) a la View (donde está lo que ve el usuario)
      2. Se encargará de enviar la variable `$grupos` (Matriz numérica con arrays asociativos que viene de la class `Controller`)
    */
      foreach ($usuarios as $key => $value) { ?>
        <option value="<?= $value['id'] ?>"> <?= $value["nickname"] ?> </option>
      <?php
      }
      ?>
    </select>

    <label for="actividadID">ACTIVIDADES</label>
    <select name="actividad" id="actividadID">
      <option value="0">Elige una actividad</option>
      <?php
      /* 
      1. El Controller (intermediario entre el Model y la View) Utiliza el Model (donde realiza la consulta a la DB) y envía la información (la variable) a la View (donde está lo que ve el usuario)
      2. Se encargará de enviar la variable `$grupos` (Matriz numérica con arrays asociativos que viene de la class `Controller`)
    */
      foreach ($actividades as $key => $value) { ?>
        <option value="<?= $value['id'] ?>"> <?= $value["descripcion"] ?> </option>
      <?php
      }
      ?>
    </select>

    <label for="planningID">FECHA DE PLANNING</label>
    <select name="planning" id="planningID">
      <option value="0">Elige una fecha</option>
      <?php
      /* 
      1. El Controller (intermediario entre el Model y la View) Utiliza el Model (donde realiza la consulta a la DB) y envía la información (la variable) a la View (donde está lo que ve el usuario)
      2. Se encargará de enviar la variable `$grupos` (Matriz numérica con arrays asociativos que viene de la class `Controller`)
    */
      foreach ($plannings as $key => $value) { ?>
        <option value="<?= $value['id'] ?>"> <?= $value["fecha_prevista"] ?> </option>
      <?php
      }
      ?>
    </select>


    <label for="duracionID">DURACIÓN EN MINUTOS</label>
    <input type="number" name="duracion" id="duracionID" maxlength="10" max="120">

    <label for="fechaInicioID">FECHA DE INICIO</label>
    <input type="datetime-local" name="fechaInicio" id="fechaInicioID"> <!-- Fecha y hora -->

    <br />
    <input type="submit" name="registrar" value="REGISTRAR">

  </form>

  <br />
  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/fitness_activity/list/">VE A LA LISTA</a></button>

</body>

</html>
