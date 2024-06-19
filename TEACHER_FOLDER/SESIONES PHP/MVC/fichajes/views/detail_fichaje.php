<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <title>DETALLE FICHAJE</title>
</head>

<body>

  <?php
  // var_dump($detail);
  ?>

  <h1>DETALLE FICHAJE</h1>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/fichajes/">VUELVE A LA LISTA</a></button>

  <table>
    <tr>
      <th>ID</th>
      <th>NOMBRE</th>
      <th>DESCRIPCION</th>
      <th>FECHA</th>
      <th>HORA DE ENTRADA</th>
      <th>HORA DE SALIDA</th>
    </tr>
    <?php
    echo "<tr>";
    echo "<td>" . $detail[0]['id'] . "</td>";
    echo "<td>" . $detail[0]['nombre'] . "</td>";
    echo "<td>" . $detail[0]['descripcion'] . "</td>";
    echo "<td>" . $detail[0]['fecha'] . "</td>";
    echo "<td>" . $detail[0]['hora_entrada'] . "</td>";
    echo "<td>" . $detail[0]['hora_salida'] . "</td>";
    echo "</tr>";
    ?>
  </table>

</body>

</html>
