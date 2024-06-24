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
  // var_dump($grupos);
  ?>

  <h1>LISTA</h1>

  <!-- <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/estudio/grupo/create">REGISTRAR NUEVO</a></button> -->

  <table>
    <tr>
      <th>ID</th>
      <th>TAG</th>
      <th>ENLACE</th>
    </tr>
    <?php
    foreach ($grupos as $key => $value) {
      echo "<tr>";
      echo "<td>" . $value['id'] . "</td>";
      echo "<td>" . $value['tag'] . "</td>";
      echo "<td><a href='/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/estudio/grupo/detail?id=" . $value['id'] . "'" . ">Detalle</a></td>";
      echo "</tr>";
    }
    ?>
  </table>

</body>

</html>
