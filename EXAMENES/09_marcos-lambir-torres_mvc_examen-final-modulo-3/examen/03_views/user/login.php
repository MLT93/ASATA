<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <title>LOGIN</title>
</head>

<body>

  <?php
  // var_dump($logins);
  /* 
    username
    pass
  */
  ?>

  <!-- RECUERDA ENVIAR EL FORM AL ARCHIVO CORRESPONDIENTE (esto se procesa en el controlador correspondiente, dentro de la función `checkUser`) -->
  <form action="/PHP/MF0493/checkUser/" method="post" target="_self">

    <label for="usernameID">USERNAME</label>
    <input type="text" name="username" id="usernameID" required>

    <label for="passID">PASSWORD</label>
    <input type="password" name="pass" id="passID">

    <br />
    <input type="submit" name="login" value="LOG IN">

  </form>

  <button><a href="/PHP/MF0493/">VUELVE ATRÁS</a></button>

</body>

</html>
