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
  // var_dump($clases);
  ?>

  <h1>LISTA</h1>

  <!-- <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/estudio/clase/create">REGISTRAR NUEVO</a></button> -->

  <table>
    <tr>
      <!-- <th>ID</th> -->
      <th>NOMBRE CURSO</th>
      <th>HORARIOS CURSO</th>
      <th>NIVEL CURSO</th>
      <th>GRUPO ASIGNADO</th>
      <th>PROFESOR</th>
      <th>HORARIO</th>
      <th>FECHA INICIO</th>
      <th>ENLACE</th>
    </tr>
    <?php
    foreach ($clases as $key => $value) {
      echo "<tr>";
      // echo "<td>" . $value['id'] . "</td>";
      echo "<td>" . $value['nombreCurso'] . "</td>";
      echo "<td>" . $value['horas'] . "</td>";
      echo "<td>" . $value['nivel'] . "</td>";
      echo "<td>" . $value['grupoTag'] . "</td>";
      echo "<td>" . $value['nombreProfesor'] . "</td>";
      echo "<td>" . $value['horario'] . "</td>";
      echo "<td>" . $value['fechaInicio'] . "</td>";
      // echo "<td><a href='/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/estudio/clase/detail?id=" . $value['id'] . "'" . ">Detalle</a></td>";
      echo "<td><a href='/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/estudio/clase/detail/" . $value['id'] . "'" . ">Detalle</a></td>";
      echo "</tr>";
    }
    ?>
  </table>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/estudio/">VUELVE ATRÁS</a></button>

</body>

</html>
