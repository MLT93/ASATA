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
  // var_dump($auctions);
  // var_dump($users);
  /* 
    auctionsID
    username
    bid_amount
    bid_time
  */
  ?>

  <!-- RECUERDA ENVIAR EL FORM AL ARCHIVO CORRESPONDIENTE (esto se procesa en el controlador correspondiente, dentro de la función `store`) -->
  <form action="/PHP/MF0493/bid/store/" method="post" target="_self">

    <label for="userID">USER</label>
    <select name="user" id="userID" required>
      <option value="0">Elige un usuario</option>
      <?php
      /* 
      1. El Controller (intermediario entre el Model y la View) Utiliza el Model (donde realiza la consulta a la DB) y envía la información (la variable) a la View (donde está lo que ve el usuario)
      2. Se encargará de enviar la variable que no se usa en el Controller
    */
      foreach ($users as $key => $value) { ?>
        <option value="<?= $value['id'] ?>"> <?= $value["username"] ?> </option>
      <?php
      }
      ?>
    </select>

    <label for="auctionID">AUCTION</label>
    <select name="auction" id="auctionID" required>
      <option value="0">Elige una subasta</option>
      <?php
      /* 
      1. El Controller (intermediario entre el Model y la View) Utiliza el Model (donde realiza la consulta a la DB) y envía la información (la variable) a la View (donde está lo que ve el usuario)
      2. Se encargará de enviar la variable que no se usa en el Controller
    */
      foreach ($auctions as $key => $value) { ?>
        <option value="<?= $value['auctionsID'] ?>"> <?= $value["title"] ?> </option>
      <?php
      }
      ?>
    </select>

    <label for="bid_amountID">BID AMOUNT</label>
    <input type="number" name="bid_amount" id="bid_amountID" step="0.01" required> <!-- `step="0.01"` permite escribir decimales -->

    <label for="bid_timeID">BID TIME</label>
    <input type="datetime-local" name="bid_time" id="bid_timeID">


    <br />
    <input type="submit" name="registrar" value="REGISTRAR">

  </form>

  <br />
  <button><a href="/PHP/MF0493/bid/list/">VE A LA LISTA</a></button>

  <button><a href="/PHP/MF0493/home/">HOME</a></button>

</body>

</html>
