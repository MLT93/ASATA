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
  // var_dump($lists);
  /* 
    id
    username
    pass
    email
    created_at
  */
  ?>

  <h1>LISTA</h1>

  <table>
    <tr>
      <th>USERNAME</th>
      <th>EMAIL</th>
      <th>ENLACE</th>
    </tr>
    <?php
    foreach ($lists as $key => $value) {
      echo "<tr>";
      echo "<td>" . $value['username'] . "</td>";
      echo "<td>" . $value['email'] . "</td>";
      // echo "<td><a href='/PHP/MF0493/user/detail?id=" . $value['id'] . "'" . ">Detalle</a></td>";
      echo "<td><a href='/PHP/MF0493/user/detail/" . $value['id'] . "'" . ">Detalle</a></td>";
      echo "</tr>";
    }

    ?>
  </table>

  <button><a href="/PHP/MF0493/">VUELVE ATRÁS</a></button>

</body>

</html>
