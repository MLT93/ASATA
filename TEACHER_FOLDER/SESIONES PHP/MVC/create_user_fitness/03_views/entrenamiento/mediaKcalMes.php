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
  // var_dump($medias);
  ?>

  <h1>LISTA</h1>

  <table>
    <tr>
      <th>MEDIA</th>
    </tr>
    <?php
    foreach ($medias as $key => $value) {
      echo "<tr>";
      echo "<td>" . $value['kcalPerMonth'] . "</td>";
      echo "</tr>";
    }

    ?>
  </table>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/fitness_activity/detail/<? $value['id'] ?>">VUELVE ATRÁS</a></button>

</body>

</html>
