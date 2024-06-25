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
      <th>FECHA DE INICIO</th>
      <th>DURACIÓN</th>
      <th>NICKNAME DEL USUARIO</th>
      <th>EMAIL</th>
      <th>FECHA DE NACIMIENTO</th>
      <th>DESCRIPCIÓN</th>
      <th>CONSUMO KCAL POR HORA</th>
      <th>FECHA PREVISTA</th>
      <th>ESTADO</th>
    </tr>
    <?php
    echo "<tr>";
    echo "<td>" . $detail[0]['id'] . "</td>";
    echo "<td>" . $detail[0]['fecha_inicio'] . "</td>";
    echo "<td>" . $detail[0]['duracion'] . "</td>";
    echo "<td>" . $detail[0]['nickname'] . "</td>";
    echo "<td>" . $detail[0]['email'] . "</td>";
    echo "<td>" . $detail[0]['fecha_nacimiento'] . "</td>";
    echo "<td>" . $detail[0]['descripcion'] . "</td>";
    echo "<td>" . $detail[0]['consumo_Kcal_hora'] . "</td>";
    echo "<td>" . $detail[0]['fecha_prevista'] . "</td>";
    echo "<td>" . $detail[0]['estado'] . "</td>";
    echo "</tr>";
    ?>
  </table>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/fitness_activity/">VUELVE ATRÁS</a></button>

</body>

</html>
