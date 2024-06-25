<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <title>DETALLE</title>
</head>

<body>

  <?php
  // var_dump($alumnosByGroupTag);
  ?>

  <h1>DETALLE</h1>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/estudio/grupo/">VUELVE A LA LISTA</a></button>

  <table>
    <tr>
      <th>ID</th>
      <th>TAG GRUPO</th>
    </tr>
    <?php
    foreach ($alumnosByGroupTag as $key => $value) {
      echo "<tr>";
      // echo "<td>" . $value['id'] . "</td>";
      echo "<td>" . $value['nombre'] . "</td>";
      echo "<td>" . $value['apellido1'] . "</td>";
      echo "<td>" . $value['apellido2'] . "</td>";
      echo "<td>" . $value['dni'] . "</td>";
      echo "<td>" . $value['id_grupo'] . "</td>";
      echo "<td>" . $value['tag'] . "</td>";
      echo "</tr>";
    }
    ?>
  </table>

</body>

</html>
