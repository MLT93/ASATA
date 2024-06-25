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

  <table>
    <tr>
      <th>ID</th>
      <th>NOMBRE</th>
      <th>APELLIDO 1</th>
      <th>APELLIDO 2</th>
      <th>DNI</th>
      <th>ID_GRUPO</th>
      <th>TAG GRUPO</th>
    </tr>
    <?php
    echo "<tr>";
    echo "<td>" . $detail[0]['id'] . "</td>";
    echo "<td>" . $detail[0]['nombre'] . "</td>";
    echo "<td>" . $detail[0]['apellido1'] . "</td>";
    echo "<td>" . $detail[0]['apellido2'] . "</td>";
    echo "<td>" . $detail[0]['dni'] . "</td>";
    echo "<td>" . $detail[0]['id_grupo'] . "</td>";
    echo "<td>" . $detail[0]['tag'] . "</td>";
    echo "</tr>";
    ?>
  </table>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/estudio/">VUELVE ATRÁS</a></button>

</body>

</html>
