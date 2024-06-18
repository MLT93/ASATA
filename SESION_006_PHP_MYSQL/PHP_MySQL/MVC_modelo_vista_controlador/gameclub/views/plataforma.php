<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista detallada</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

</head>

<body>

  <h1>Nombre, Empresa y Tipo de Lector de una plataforma</h1>

  <ul>
    <?php
    // Si no existe la variable `$plataformaID` (es la variable sin utilizar de la class `PlatformsController`) significa que no ha encontrado el ID
    if ($plataformaID !== null) {
      echo "<p>Nombre: " . $plataformaID['nombre'] . "</p>";
      echo "<p>Fecha Publicación: " . $plataformaID['empresaMatriz'] . "</p>";
      echo "<p>Fecha Publicación: " . $plataformaID['tipoLector'] . "</p>";
    } else {
      echo "<p>No existe un videojuego con ese ID</p>";
    }
    ?>
  </ul>

</body>

</html>
