<!DOCTYPE   html>
<html>
    <head>
        <title>Respuesta</title>
    </head>
    <body>

    <h2>NOMBRE REGISTRADO</h2>


    <?php

    $nombre    = $_REQUEST['nombre'];
    $apellido1 = $_REQUEST['apellido1'];
    $apellido2 = $_REQUEST['apellido2'];


    echo "El usuario registrado se llama $nombre $apellido1 $apellido2.";

    echo "<br/>";
    var_dump($_REQUEST);

    ?>


    </body>
</html>