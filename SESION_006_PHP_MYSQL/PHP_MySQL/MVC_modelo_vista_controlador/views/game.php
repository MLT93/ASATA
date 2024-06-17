<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista detallada</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

</head>

<body>

  <h1>Nombre y Fecha de Publicación de videojuegos</h1>

  <ul>
    <?php
    // Esto será el registro correspondiente al ID
    $game; // Array asociativo

    echo "<p>Nombre: " . $game['nombre'] . "</p>";
    echo "<p>Fecha Publicación: " . $game['fechaPublicacion'] . "</p>";
    ?>
    <!-- Necesitaremos ahora métodos para que funcione -->
  </ul>

</body>

</html>
