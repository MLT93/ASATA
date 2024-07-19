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
    auctionsID
    title
    descripcion
    start_price
    current_price
    end_time
    username
  */
  ?>

  <h1>LISTA</h1>

  <table>
    <tr>
      <th>TITLE</th>
      <th>DESCRIPTION</th>
      <th>END TIME</th>
      <th>ENLACE</th>
    </tr>
    <?php
    foreach ($lists as $key => $value) {
      echo "<tr>";
      echo "<td>" . $value['title'] . "</td>";
      echo "<td>" . $value['descripcion'] . "</td>";
      echo "<td>" . $value['end_time'] . "</td>";
      // echo "<td><a href='/PHP/MF0493/auction/detail?id=" . $value['auctionsID'] . "'" . ">Detalle</a></td>";
      echo "<td><a href='/PHP/MF0493/auction/detail/" . $value['auctionsID'] . "'" . ">Detalle</a></td>";
      echo "</tr>";
    }

    ?>
  </table>

  <button><a href="/PHP/MF0493/auction/register/">REGISTRAR UNA SUBASTA</a></button>

  <button><a href="/PHP/MF0493/home/">HOME</a></button>

</body>

</html>
