<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataformas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

</head>
<!-- En views tendremos el HTML que vamos a ver -->

<body>
    <!-- 1º -->
    <!-- Vamos a sacar aquí la lista de videojuegos -->
    <h1>Lista de plataformas</h1>
    <ul>
        <!-- Hay que recorrer el array con los videojuegos: el $games generado en el modelo -->

        <?php
        // El controlador se encargará de enviar a esta vista la variable $games. Para mostrarla en forma de lista se necesita un bucle

        foreach ($plataformas as $plataforma) { ?>
            <!-- Como viene en forma de array asociativo obtengo los valores de esta forma: -->
            <li><?= $game['nombre'] ?> - <?= $game['empresaMatriz'] ?>- <?= $game['tipoLector'] ?></li>
        <?php
        }
        ?>

    </ul>

</body>

</html>