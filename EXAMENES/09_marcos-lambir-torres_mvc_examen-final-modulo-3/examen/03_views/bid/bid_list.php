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
    auctionID
    descripcion
    start_price
    current_price
    end_time
    username
    bid_amount
    bid_time
  */
  ?>

  <h1>LISTA</h1>

  <table>
    <tr>
      <th>DESCRIPTION</th>
      <th>START PRICE</th>
      <th>CURRENT PRICE</th>
      <th>BID AMOUNT</th>
      <th>BID TIME</th>
      <th>END TIME</th>
      <th>ENLACE</th>
    </tr>
    <?php
    foreach ($lists as $key => $value) {
      echo "<tr>";
      echo "<td>" . $value['descripcion'] . "</td>";
      echo "<td>" . $value['start_price'] . "</td>";
      echo "<td>" . $value['current_price'] . "</td>";
      echo "<td>" . $value['bid_amount'] . "</td>";
      echo "<td>" . $value['bid_time'] . "</td>";
      echo "<td>" . $value['end_time'] . "</td>";
      // echo "<td><a href='/PHP/MF0493/bid/detail?id=" . $value['auctionID'] . "'" . ">Detalle</a></td>";
      echo "<td><a href='/PHP/MF0493/bid/detail/" . $value['auctionID'] . "'" . ">Detalle</a></td>";
      echo "</tr>";
    }

    ?>
  </table>

  <button><a href="/PHP/MF0493/home/">HOME</a></button>

  <button><a href="/PHP/MF0493/bid/register/">REGISTRAR UNA NUEVA PUJA</a></button>

</body>

</html>
