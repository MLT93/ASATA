<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista detallada</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

</head>

<body>

    <h1>Lista detallada de videojuegos</h1>

    <ul>
        <?php
        // Suponemos que tengo la variable `games` con la matriz de todos los registros
        foreach ($gamesDetail as $game) { ?>
            <li><?= $game['nombre'] ?> <?= $game['descripcion'] ?> <?= $game['fechaPublicacion'] ?> </li>
        <?php
        }
        ?>
        <!-- Necesitaremos ahora métodos para que funcione -->
    </ul>

</body>

</html>
