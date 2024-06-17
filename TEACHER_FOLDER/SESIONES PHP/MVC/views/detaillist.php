<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista detallada</title>
</head>

<body>


    <h1>Lista detallada de videojuegos</h1>

    <ul>
        <?php
        // La variable `$gamesDetail` es una matriz asociativa que viene de la class `VideogamesController`
        foreach ($gamesDetail as $game) { ?>
            <!-- Este enlace nos lleva directamente al ID de la plataforma específica. Recuerda añadir la ruta entera para agregar el Endpoint -->
            <li><?= $game['nombre'], $game['descripcion'], $game['fechaPublicacion'] ?></li>
        <?php
        }
        ?>
    </ul>


</body>

</html>
