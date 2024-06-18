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
        // El controlador se encargará de enviar a esta view la variable `$games`
        // donde esta la lista de todos los registros de videojuegos
        // por lo cual la tendré disponible con toda su información

        // La variable `$games` es una matriz asociativa que viene de la class `VideogamesController`
        foreach ($games as $game) { ?>
            <li>
                <!-- Este enlace nos lleva directamente al ID del juego específico. Recuerda añadir la ruta entera para agregar el Endpoint o Query Param -->
                <a href="http://localhost/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/gameclub/?url=game/<?= $game['id'] ?>">
                    <img src="../../SITIO_WEB/<?= substr($game['imagen'], 2) ?>" alt="Imagen De la base de datos">
                    <?= $game['nombre'] ?> <?= $game['descripcion'] ?> <?= $game['nombre'] ?> <?= $game['platnombre'] ?>
                </a>
            </li> <!-- Al tener varios campos con el mismo nombre hemos asignado un pseudónimo a esos campos para obtener la información dentro de la consulta SQL -->
        <?php
        }
        ?>
    </ul>

</body>

</html>
