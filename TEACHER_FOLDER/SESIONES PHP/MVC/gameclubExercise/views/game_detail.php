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
  // var_dump($arrDetailByPathVariable);
  ?>

  <h1>DETALLE</h1>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/gameclubExercise/index">VUELVE A LA LISTA</a></button>

  <table>
    <tr>
      <th>IMAGEN</th>
      <th>ID</th>
      <th>NOMBRE</th>
      <th>DESCRIPCION</th>
      <th>GÉNERO</th>
      <th>DESARROLLADOR</th>
      <th>PLATAFORMA</th>
      <th>PEGI</th>
      <th>FECHA DE PUBLICACIÓN</th>
      <th>ISO CODE</th>
      <th>TARIFA</th>
      <th>PRECIO</th>
    </tr>
    <?php
    echo "<tr>";
    echo "<td><img src='../../../SITIO_WEB/" . substr($arrDetailByPathVariable[0]['imagen'], 2) . "'" . " alt='Imagen de la base de datos'></td>"; // Esto obtengo de la base de datos => ./repo/img/videogames/Fifa2020_2024.05.21.201650-1276415.jpg // Así lo transformo para poder mostrarlo => "<td><img src='../../../SITIO_WEB/" . substr($value['imagen'], 2) . "'" . " alt='Imagen de la base de datos'></td>"
    echo "<td>" . $arrDetailByPathVariable[0]['id'] . "</td>";
    echo "<td>" . $arrDetailByPathVariable[0]['nombre'] . "</td>";
    echo "<td>" . $arrDetailByPathVariable[0]['descripcion'] . "</td>";
    echo "<td>" . $arrDetailByPathVariable[0]['genero'] . "</td>";
    echo "<td>" . $arrDetailByPathVariable[0]['desarrollador'] . "</td>";
    echo "<td>" . $arrDetailByPathVariable[0]['plataforma'] . "</td>";
    echo "<td>" . $arrDetailByPathVariable[0]['pegui'] . "</td>";
    echo "<td>" . $arrDetailByPathVariable[0]['fechaPublicacion'] . "</td>";
    echo "<td>" . $arrDetailByPathVariable[0]['isoCode'] . "</td>";
    echo "<td>" . $arrDetailByPathVariable[0]['tarifa'] . "</td>";
    echo "<td>" . $arrDetailByPathVariable[0]['precio'] . "</td>";
    echo "</tr>";
    ?>
  </table>

</body>

</html>
