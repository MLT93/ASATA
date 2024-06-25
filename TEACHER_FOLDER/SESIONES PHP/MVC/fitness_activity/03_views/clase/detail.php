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

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/estudio/clase/">VUELVE A LA LISTA</a></button>

  <table>
    <tr>
      <th>ID</th>
      <th>NOMBRE CURSO</th>
      <th>HORARIOS CURSO</th>
      <th>NIVEL CURSO</th>
      <th>AULA</th>
      <th>PLANTA</th>
      <th>Nº AULA</th>
      <th>GRUPO ASIGNADO</th>
      <th>PROFESOR</th>
      <th>HORARIO</th>
      <th>AÑO CONVOCATORIA</th>
      <th>FECHA INICIO</th>
    </tr>
    <?php
    echo "<tr>";
    echo "<td>" . $detail[0]['id'] . "</td>";
    echo "<td>" . $detail[0]['nombreCurso'] . "</td>";
    echo "<td>" . $detail[0]['horas'] . "</td>";
    echo "<td>" . $detail[0]['nivel'] . "</td>";
    echo "<td>" . $detail[0]['aulaTag'] . "</td>";
    echo "<td>" . $detail[0]['planta'] . "</td>";
    echo "<td>" . $detail[0]['numeroAula'] . "</td>";
    echo "<td>" . $detail[0]['grupoTag'] . "</td>";
    echo "<td>" . $detail[0]['nombreProfesor'] . " " . $detail[0]['apellido1'] . " " . $detail[0]['apellido2'] . "</td>";
    echo "<td>" . $detail[0]['horario'] . "</td>";
    echo "<td>" . $detail[0]['anioConvocatoria'] . "</td>";
    echo "<td>" . $detail[0]['fechaInicio'] . "</td>";
    echo "</tr>";
    ?>
  </table>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/estudio/">VUELVE ATRÁS</a></button>

</body>

</html>
