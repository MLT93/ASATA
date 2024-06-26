<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <title>LISTA</title>
</head>

<body>

  <?php
  // var_dump($plannings);
  ?>

  <h1>LISTA</h1>

  <table>
    <tr>
      <th>ID</th>
      <th>ACTIVIDAD</th>
      <th>OBJETIVO</th>
      <th>USUARIO</th>
      <th>FECHA PREVISTA</th>
      <th>ESTADO</th>
    </tr>
    <?php
    foreach ($plannings as $key => $value) {
      echo "<tr>";
      echo "<td>" . $value['id'] . "</td>";
      echo "<td>" . $value['descripcionActividad'] . "</td>";
      echo "<td>" . $value['objetivoActividad'] . "</td>";
      echo "<td>" . $value['nombreUsuario'] . "</td>";
      echo "<td>" . $value['fecha_prevista'] . "</td>";
      echo "<td>" . $value['estado'] . "</td>";
      // echo "<td><a href='/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/create_user_fitness/planning/list/detail?id=" . $value['id'] . "'" . ">Detalle</a></td>";
      echo "<td><a href='/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/create_user_fitness/planning/list/detail/" . $value['id'] . "'" . ">Detalle</a></td>";
      echo "</tr>";
    }

    ?>
  </table>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/create_user_fitness/planning/">VUELVE ATRÁS</a></button>

</body>

</html>
