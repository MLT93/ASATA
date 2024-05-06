<html lang="es">

    <head>
        <title>Comentario</title>
        <meta charset="utf-8"/>
        <meta name="author" content="**"/>
        <meta name="description" content="*"/>
        <meta name="keywords" content="***"/>
    </head>

    <body>

        <form action="comentarioRegistro.php" method="post" >


            <label for="nombreid">NOMBRE</label>
            <input type="text" name="nombre" id="nombreid">
            <br/>
            <label for="email">CORREO ELECTRONICO</label>
            <input type="mail" name="email" id="email">
            <br/>
            <textarea name="comentario" id="comentario" cols="50" rows="20"></textarea><br/>

            <input type="submit" name="enviar" value="Enviar">

        </form>
    </body>

    <?php

    if(
        isset($_REQUEST['nombre']) &&
        isset($_REQUEST['email']) &&
        isset($_REQUEST['comentario'])
    ){

        $fichero = fopen("logComentarios.txt","a+");

        $nombre = "Nombre: ".$_REQUEST['nombre']."\r\n";
        $email  = "Email: ".$_REQUEST['email']."\r\n";
        $comentario = "Comentario: ".$_REQUEST['comentario']."\r\n";
        $fecha = date("Y-m-d H:i:s\r\n");
        $separador = "-----------------------------------------------------------------\r\n";

        $registro = $nombre.$email.$comentario.$fecha.$separador;

        fwrite($fichero, $registro);
        fclose($fichero);
        echo "<h2> COMENTARIO REGISTRADO</h2>";


    }


    ?>



</html>