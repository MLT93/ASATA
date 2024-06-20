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
  // var_dump($arrGames);
  ?>

  <h1>LISTA</h1>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/gameclubExercise/create">AGREGAR</a></button>

  <table>
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
    <th>ENLACE</th>
    </tr>
    <?php
    foreach ($arrGames as $key => $value) {
      echo "<tr>";
      echo "<td><img src='../../SITIO_WEB/" . substr($value['imagen'], 2) . "'" . " alt='Imagen de la base de datos'></td>"; // Esto obtengo de la base de datos => ./repo/img/videogames/Fifa2020_2024.05.21.201650-1276415.jpg // Así lo transformo para poder mostrarlo => "<td><img src='../../SITIO_WEB/" . substr($value['imagen'], 2) . "'" . " alt='Imagen de la base de datos'></td>"
      echo "<td>" . $value['id'] . "</td>";
      echo "<td>" . $value['nombre'] . "</td>";
      echo "<td>" . $value['descripcion'] . "</td>";
      echo "<td>" . $value['genero'] . "</td>";
      echo "<td>" . $value['desarrollador'] . "</td>";
      echo "<td>" . $value['plataforma'] . "</td>";
      echo "<td>" . $value['pegui'] . "</td>";
      echo "<td>" . $value['fechaPublicacion'] . "</td>";
      echo "<td>" . $value['isoCode'] . "</td>";
      echo "<td>" . $value['tarifa'] . "</td>";
      echo "<td>" . $value['precio'] . "</td>";
      echo "<td><a href='/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/gameclubExercise/detail/" . $value['id'] . "'" . ">Detalle</a></td>";
      echo "</tr>";
    }
    ?>
  </table>

</body>

</html>
