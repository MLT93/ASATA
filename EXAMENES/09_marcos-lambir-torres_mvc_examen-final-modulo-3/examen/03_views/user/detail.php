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
  /* 
    id
    username
    pass
    email
    created_at
  */
  ?>

  <h1>DETALLE</h1>

  <table>
    <tr>
      <th>ID</th>
      <th>USERNAME</th>
      <th>PASSWORD</th>
      <th>EMAIL</th>
      <th>CREATED AT</th>
    </tr>
    <?php
    echo "<tr>";
    echo "<td>" . $detail[0]['id'] . "</td>";
    echo "<td>" . $detail[0]['username'] . "</td>";
    echo "<td>" . $detail[0]['pass'] . "</td>";
    echo "<td>" . $detail[0]['email'] . "</td>";
    echo "<td>" . $detail[0]['created_at'] . "</td>";
    echo "</tr>";
    ?>
  </table>

  <button><a href="/PHP/MF0493/user/list/">VUELVE ATRÁS</a></button>

</body>

</html>
