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

                <li><?= $game['nombre'] ?> <?= $game['descripcion'] ?> <?= $game['gennombre'] ?></li>

        <?php
        }
        ?>
    </ul>


</body>

</html>
