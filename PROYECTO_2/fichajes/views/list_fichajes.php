<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <title>LISTA DE FICHAJES</title>
</head>

<body>

  <?php
  // var_dump($fichajes);
  ?>

  <h1>LISTA DE DE FICHAJES</h1>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/fichajes/create">REGISTRA UN NUEVO FICHAJE</a></button>

  <table>
    <tr>
      <th>ID</th>
      <th>NOMBRE</th>
      <th>DESCRIPCIÓN</th>
      <th>FECHA</th>
      <th>HORA DE ENTRADA</th>
      <th>HORA DE SALIDA</th>
      <th>ENLACE</th>
    </tr>
    <?php
    foreach ($fichajes as $key => $value) {
      echo "<tr>";
      echo "<td>" . $value['id'] . "</td>";
      echo "<td>" . $value['nombre'] . "</td>";
      echo "<td>" . $value['descripcion'] . "</td>";
      echo "<td>" . $value['fecha'] . "</td>";
      echo "<td>" . $value['hora_entrada'] . "</td>";
      echo "<td>" . $value['hora_salida'] . "</td>";
      echo "<td><a href='/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/fichajes/detail?id=" . $value['id'] . "'" . ">Detalle</a></td>";
      echo "</tr>";
    }
    ?>
  </table>

</body>

</html>
