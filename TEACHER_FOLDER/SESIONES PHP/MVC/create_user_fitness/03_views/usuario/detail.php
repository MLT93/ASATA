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
      <th>APELLIDOS</th>
      <th>NICKNAME</th>
      <th>PASSWORD</th>
      <th>EMAIL</th>
      <th>FECHA DE NACIMIENTO</th>
      <th>PESO</th>
      <th>ALTURA</th>
    </tr>
    <?php
    echo "<tr>";
    echo "<td>" . $detail[0]['id'] . "</td>";
    echo "<td>" . $detail[0]['nombre'] . "</td>";
    echo "<td>" . $detail[0]['apellido'] . "</td>";
    echo "<td>" . $detail[0]['nickname'] . "</td>";
    echo "<td>" . $detail[0]['hashed_password'] . "</td>";
    echo "<td>" . $detail[0]['email'] . "</td>";
    echo "<td>" . $detail[0]['fecha_nacimiento'] . "</td>";
    echo "<td>" . $detail[0]['peso'] . "</td>";
    echo "<td>" . $detail[0]['altura'] . "</td>";
    echo "</tr>";
    ?>
  </table>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/create_user_fitness/list/">VUELVE ATRÁS</a></button>
  
  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/create_user_fitness/planning/">CREA UN PLANNING</a></button>

</body>

</html>
