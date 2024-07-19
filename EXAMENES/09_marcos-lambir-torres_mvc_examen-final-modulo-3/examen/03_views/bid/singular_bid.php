<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <title>REGISTRAR</title>
</head>

<body>

  <?php
  // var_dump($thisBid);
  /* 
    auctionID
    description
    current_price
  */
  ?>

  <!-- RECUERDA ENVIAR EL FORM AL ARCHIVO CORRESPONDIENTE (esto se procesa en el controlador correspondiente, dentro de la función `store`) -->
  <form action="/PHP/MF0493/bid/bidById/update/" method="post" target="_self">

    <label for="thisUserID">USER</label>
    <input type="text" name="<?= $thisBid[0]['userID'] ?>" id="thisUserID" value="<?= strtoupper($thisBid[0]['username']) ?>">

    <label for="thisAuctionID">AUCTION</label>
    <input type="text" name="<?= $thisBid[0]['auctionID'] ?>" id="thisAuctionID" value="<?= strtoupper($thisBid[0]['title']) ?>">

    <label for="bid_amountID">BID AMOUNT</label>
    <input type="number" name="thisBidAmount" id="bid_amountID" step="0.01" required> <!-- `step="0.01"` permite escribir decimales -->

    <label for="bid_timeID">BID TIME</label>
    <input type="datetime-local" name="thisBidTime" id="bid_timeID">


    <br />
    <input type="submit" name="update" value="REALIZAR">

  </form>

  <br />
  <button><a href="/PHP/MF0493/bid/list/">VE A LA LISTA</a></button>

  <button><a href="/PHP/MF0493/home/">HOME</a></button>

</body>

</html>
