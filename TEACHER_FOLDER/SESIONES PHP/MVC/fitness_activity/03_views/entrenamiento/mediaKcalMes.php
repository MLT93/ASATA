<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <title>KCAL MES</title>
</head>

<body>

  <?php
  var_dump($medias); // En este caso será una Matriz numérica, con arrays asociativos
  /* => $medias
  array(2) { 
    [0]=> array(10) { 
      ["id"]=> string(1) "4" 
      ["fecha_inicio"]=> string(19) "2025-03-05 09:00:00" 
      ["duracion"]=> string(2) "90" 
      ["nickname"]=> string(6) "Cas_23" 
      ["email"]=> string(14) "user1@mail.com" 
      ["fecha_nacimiento"]=> string(10) "1990-05-06" 
      ["descripcion"]=> string(17) "Realizar triatlon" 
      ["consumo_Kcal_hora"]=> string(3) "630" 
      ["fecha_prevista"]=> string(10) "2024-06-30" 
      ["estado"]=> string(10) "A Realizar" 
      } 
    [1]=> string(6) "493.33" 
  } */
  ?>

  <h1>KCAL MES</h1>

  <table>
    <tr>
      <th>MEDIA</th>
    </tr>
    <?php
    foreach ($medias as $key => $value) {
      echo "<tr>";
      echo "<td>" . $value[1] . "</td>";
      echo "</tr>";
    }

    ?>
  </table>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/fitness_activity/detail/<? $value['id'] ?>">VUELVE ATRÁS</a></button>

</body>

</html>
