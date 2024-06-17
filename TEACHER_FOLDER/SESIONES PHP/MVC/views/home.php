<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>HOME</title>
</head>

<body>
    <h1>Lista de videojuegos</h1>

    <ul>
        <?php
        // El controlador se encargará de enviar a la vista la variable `$games`
        // donde esta la lista de todos los registros de videojuegos
        // por lo cual la tendré disponible con toda su información

        // La variable `$games` es una matriz asociativa que viene de la class `VideogamesController`
        foreach ($games as $game) { ?>
            <li>
                <img src="../SITIO_WEB/<?= substr($game['imagen'], 2) ?>" alt="Imagen De la base de datos">
                <?= $game['imagen'], $game['nombre'], $game['descripcion'], $game['nombre'], $game['nombre'] ?>
            </li> <!-- Al tener varios campos con el mismo nombre hemos asignado un pseudónimo a esos campos para obtener la información dentro de la consulta SQL -->
        <?php
        }
        ?>
    </ul>

</body>

</html>
