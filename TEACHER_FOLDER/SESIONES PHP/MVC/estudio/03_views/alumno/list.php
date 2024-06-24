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
  // var_dump($alumnos);
  ?>

  <h1>LISTA DE</h1>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/estudio/alumno/create">REGISTRAR NUEVO</a></button>

  <table>
    <tr>
      <th>ID</th>
      <th>NOMBRE</th>
      <th>APELLIDO 1</th>
      <th>APELLIDO 2</th>
      <th>DNI</th>
      <th>ID_GRUPO</th>
      <th>TAG GRUPO</th>
      <th>ENLACE</th>
    </tr>
    <?php
    foreach ($alumnos as $key => $value) {
      echo "<tr>";
      echo "<td>" . $value['id'] . "</td>";
      echo "<td>" . $value['nombre'] . "</td>";
      echo "<td>" . $value['apellido1'] . "</td>";
      echo "<td>" . $value['apellido2'] . "</td>";
      echo "<td>" . $value['dni'] . "</td>";
      echo "<td>" . $value['id_grupo'] . "</td>";
      echo "<td>" . $value['tag'] . "</td>";
      echo "<td><a href='/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/estudio/alumno/detail?id=" . $value['id'] . "'" . ">Detalle</a></td>";
      echo "</tr>";
    }
    ?>
  </table>

</body>

</html>
