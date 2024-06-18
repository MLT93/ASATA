<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista detallada</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

</head>

<body>

  <h1>Nombre y Fecha de Publicación del videojuego</h1>

  <ul>
    <?php
    // Si no existe la variable `$gameID` (es la variable sin utilizar de la class `VideogamesController`) significa que no ha encontrado el ID
    if ($gameID !== null) {
      echo "<p>Nombre: " . $gameID['nombre'] . "</p>";
      echo "<p>Fecha Publicación: " . $gameID['fechaPublicacion'] . "</p>";
    } else {
      echo "<p>No existe un videojuego con ese ID</p>";
    }
    ?>
  </ul>

</body>

</html>
