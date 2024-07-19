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
  // var_dump($usuarios);
  ?>

  <h1>LISTA</h1>

  <table>
    <tr>
      <th>ID</th>
      <th>NOMBRE</th>
      <th>APELLIDO</th>
      <th>NICKNAME</th>
      <th>EMAIL</th>
      <th>FECHA DE NACIMIENTO</th>
      <th>PESO</th>
      <th>ALTURA</th>
      <th>ENLACE</th>
    </tr>
    <?php
    foreach ($usuarios as $key => $value) {
      echo "<tr>";
      echo "<td>" . $value['id'] . "</td>";
      echo "<td>" . $value['nombre'] . "</td>";
      echo "<td>" . $value['apellido'] . "</td>";
      echo "<td>" . $value['nickname'] . "</td>";
      echo "<td>" . $value['email'] . "</td>";
      echo "<td>" . $value['fecha_nacimiento'] . "</td>";
      echo "<td>" . $value['peso'] . "</td>";
      echo "<td>" . $value['altura'] . "</td>";
      // echo "<td><a href='/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/create_user_fitness/list/detail?id=" . $value['id'] . "'" . ">Detalle</a></td>";
      echo "<td><a href='/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/create_user_fitness/list/detail/" . $value['id'] . "'" . ">Detalle</a></td>";
      echo "</tr>";
    }

    ?>
  </table>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/create_user_fitness/">VUELVE ATRÁS</a></button>

</body>

</html>
