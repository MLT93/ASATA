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
  // var_dump($registers);
  /* 
    username
    pass
    email
    created_at
  */
  ?>

  <!-- RECUERDA ENVIAR EL FORM AL ARCHIVO CORRESPONDIENTE (esto se procesa en el controlador correspondiente, dentro de la función `store`) -->
  <form action="/PHP/MF0493/user/store/" method="post" target="_self">

    <label for="usernameID">USERNAME</label>
    <input type="text" name="username" id="usernameID" required>

    <label for="passID">PASSWORD</label>
    <input type="password" name="pass" id="passID">

    <label for="emailID">EMAIL</label>
    <input type="email" name="email" id="emailID" required>

    <label for="createdAtID">CREATED AT</label>
    <input type="datetime-local" name="createdAt" id="createdAtID"> <!-- Al tener en la DB una función que por defecto toma la fecha de registro, este input se utilizará si la fecha de inicio es distinta a la actual -->

    <br />
    <input type="submit" name="registrar" value="REGISTRAR">

  </form>

  <button><a href="/PHP/MF0493/user/list/">VE A LA LISTA</a></button>
  
  <button><a href="/PHP/MF0493/login/">VE AL LOGIN</a></button>

</body>

</html>
