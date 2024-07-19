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
    auctionID
    title
    descripcion
    start_price
    current_price
    end_time
    userID
    userBidID
    username
  */
  ?>

  <h1>DETALLE</h1>

  <table>
    <tr>
      <th>ID</th>
      <th>TITLE</th>
      <th>DESCRIPTION</th>
      <th>START PRICE</th>
      <th>CURRENT PRICE</th>
      <th>END TIME</th>
      <th>USER</th>
      <th>ENLACE</th>
    </tr>
    <?php
    echo "<tr>";
    echo "<td>" . $detail[0]['auctionID'] . "</td>";
    echo "<td>" . $detail[0]['title'] . "</td>";
    echo "<td>" . $detail[0]['descripcion'] . "</td>";
    echo "<td>" . $detail[0]['start_price'] . "</td>";
    echo "<td>" . $detail[0]['current_price'] . "</td>";
    echo "<td>" . $detail[0]['end_time'] . "</td>";
    echo "<td>" . $detail[0]['username'] . "</td>";
    echo "<td><a href='/PHP/MF0493/bid/bidById?thisBidId=" . $detail[0]['auctionID'] . "&userId=" . $detail[0]['userID'] . "'" . ">Haz una puja</a></td>";
    echo "</tr>";
    ?>
  </table>

  <button><a href="/PHP/MF0493/auction/list/">VUELVE ATRÁS</a></button>

  <button><a href="/PHP/MF0493/home/">HOME</a></button>

</body>

</html>
