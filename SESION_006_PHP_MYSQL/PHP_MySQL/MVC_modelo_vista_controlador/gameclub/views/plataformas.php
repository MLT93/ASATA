<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista plataformas</title>
</head>

<body>


    <h1>Lista de plataformas</h1>

    <ul>
        <?php
        // La variable `$plataformas` es una matriz asociativa que viene de la class `PlatformsController`
        foreach ($plataformas as $plataforma) { ?>

            <!-- Este enlace nos lleva directamente al ID de la plataforma específica. Recuerda añadir la ruta entera para agregar el Endpoint o Query Param -->
            <a href="http://localhost/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/gameclub/?url=plataforma/<?= $plataforma['id'] ?>">

                <li><?= $plataforma['nombre'] ?> - <?= $plataforma['empresaMatriz'] ?> - <?= $plataforma['tipoLector'] ?></li>
            </a>
        <?php
        }
        ?>
    </ul>


</body>

</html>
