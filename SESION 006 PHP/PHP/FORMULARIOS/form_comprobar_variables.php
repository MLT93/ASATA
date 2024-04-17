<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario</title>
</head>

<body>
  <h1>COMPROBAR VARIABLES</h1>

  <!-- El `action=""` envía los datos a esa página -->
  <!-- El `method=""` es el método que realiza la operación -->
  <form action="form_comprobar_variables.php" method="post" target="_self">
    <label for="num">INTRODUCE UN NÚMERO</label>
    <input type="number" id="num" name="num">

    <button type="submit" id="enviar" name="enviar">ENVIAR</button>
  </form>

  <?php
  // Compruebo existencia
  if (isset($_REQUEST["num"])) {
    unset($num); // Primero borro
    $num = $_REQUEST["num"]; // Luego escribo
    define("numOfForm", $num);
    echo "<br/>";
    echo "La variable guardada es 'numOfForm' y vale: " . numOfForm;
    echo "<br/>";
  }
  // Recibo toda la información del formulario
  var_dump($_REQUEST);
  echo "<br/>";
  ?>

</body>

</html>