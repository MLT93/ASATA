<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="ejercicio_form2.php" method="post" target="_self">
    <label for="numID">Número</label>
    <input type="number" id="numID" name="num">

    <label for="nameID">User</label>
    <input type="text" id="nameID" name="name">

    <label for="mailID">Email</label>
    <input type="email" id="mailID" name="mail">

    <label for="passwordID">Password</label>
    <input type="password" id="passwordID" name="pass">

    <button type="submit">Enviar</button>
  </form>

  <?php

  if (isset($_REQUEST["num"]) && isset($_REQUEST["name"]) && isset($_REQUEST["mail"]) && isset($_REQUEST["pass"])) {
    // Borro
    unset($num, $name, $email, $password);
    // Veo la información del formulario
    echo "<br/>";
    echo "<p><strong>Información general del formulario: </strong></p>";
    var_dump($_REQUEST);
    echo "<hr/>";
    // Escribo
    $num = $_REQUEST["num"];
    $name = $_REQUEST["name"];
    $email = $_REQUEST["mail"];
    $password = $_REQUEST["pass"];
    // Parsear
    $num = intval($num);

    // ? SACA LOS VALORES INTRODUCIDOS SEGÚN EL NÚMERO QUE SE INTRODUZCA EN EL INPUT type="number"

    for ($i = 0; $i <= $num; $i++) {
      echo "<strong>Index:</strong> $i";
      echo "<p><strong>Párrafo:</strong> Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Ha sido el texto de relleno estándar de las industrias desde el año 1500.</p>";
      echo "<p><strong>Nombre:</strong> $name</p>";
      echo "<p><strong>Password:</strong> $password</p>";
      echo "<p><strong>E-mail:</strong> $email</p>";
      echo "<hr/>";
    }
  }
  ?>
</body>

</html>
