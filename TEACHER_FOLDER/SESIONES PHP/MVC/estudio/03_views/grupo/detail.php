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
  // var_dump($detail);
  ?>

  <h1>DETALLE</h1>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/estudio/grupo/">VUELVE A LA LISTA</a></button>

  <table>
    <tr>
      <th>ID</th>
      <th>TAG GRUPO</th>
    </tr>
    <?php
    echo "<tr>";
    echo "<td>" . $detail[0]['id'] . "</td>";
    echo "<td>" . $detail[0]['tag'] . "</td>";
    echo "</tr>";
    ?>
  </table>

</body>

</html>
