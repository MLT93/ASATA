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
  // var_dump($entrenamientos); // id, fecha_inicio, duracion, nickname, email, fecha_nacimiento, descripcion, consumo_Kcal_hora, fecha_prevista, estado 
  ?>

  <h1>LISTA</h1>

  <table>
    <tr>
      <th>ID</th>
      <th>FECHA DE INICIO</th>
      <th>DURACIÓN</th>
      <th>NICKNAME DEL USUARIO</th>
      <th>EMAIL</th>
      <th>FECHA DE NACIMIENTO</th>
      <th>DESCRIPCIÓN</th>
      <th>CONSUMO KCAL POR HORA</th>
      <th>FECHA PREVISTA</th>
      <th>ESTADO</th>
      <th>ENLACE</th>
    </tr>
    <?php
    // $totKcalEntrenamiento = array_sum(array_column($entrenamientos, 'consumo_Kcal_hora'));
    $totKcalEntrenamiento = 0;
    $cantidadEntrenamientos = count($entrenamientos);
    foreach ($entrenamientos as $key => $value) {
      echo "<tr>";
      echo "<td>" . $value['id'] . "</td>";
      echo "<td>" . $value['fecha_inicio'] . "</td>";
      echo "<td>" . $value['duracion'] . "</td>";
      echo "<td>" . $value['nickname'] . "</td>";
      echo "<td>" . $value['email'] . "</td>";
      echo "<td>" . $value['fecha_nacimiento'] . "</td>";
      echo "<td>" . $value['descripcion'] . "</td>";
      echo "<td>" . $value['consumo_Kcal_hora'] . "</td>";
      echo "<td>" . $value['fecha_prevista'] . "</td>";
      echo "<td>" . $value['estado'] . "</td>";
      // echo "<td><a href='/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/fitness_activity/alumno/detail?id=" . $value['id'] . "'" . ">Detalle</a></td>";
      echo "<td><a href='/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/fitness_activity/list/detail/" . $value['id'] . "'" . ">Detalle</a></td>";
      echo "</tr>";

      $totKcalEntrenamiento += $value['consumo_Kcal_hora'];
      // $mediaKcalEntrenamiento = $totKcalEntrenamiento / count($entrenamientos[0]['consumo_Kcal_hora']);
    }

    ?>
  </table>

  <?php
  echo "<h3>TOTAL KCAL DE LOS ENTRENAMIENTOS: " . $totKcalEntrenamiento . "kcal</h3>";
  echo "<h3>MEDIA KCAL DE LOS ENTRENAMIENTOS: " . round($totKcalEntrenamiento / $cantidadEntrenamientos, 2) . "kcal</h3>";
  ?>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/fitness_activity/">VUELVE ATRÁS</a></button>
  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/fitness_activity/list/mediaKcalMes/">VUELVE ATRÁS</a></button>

</body>

</html>
