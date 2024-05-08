<!DOCTYPE html>
<html>
    <head>
        <title>ENCUESTA</title>     
        <!-- <link href="./css/login.css" rel="stylesheet" type="text/css" /> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  
    </head>
    <body>
        <!-- <h2>LOG IN</h2> -->

        <form action="fin_encuesta.php" method="post">  


            <label for="nombreid">NOMBRE</label>
            <input type="text" name="nombre" id="nombreid">

            <label for="preg01">¿Que le gusta ver en tv?</label>
            <input type="text" name="preg01" id="preg01">

            <label for="preg02">¿Que le gusta escuchar en la radio?</label>
            <input type="text" name="preg02" id="preg02">

            <label for="preg03">¿Que contenido ve en internet más habitualmente?</label>
            <input type="text" name="preg03" id="preg03">

            <label for="preg04">Escriba sus 3 sitios web más visitados</label>
            <input type="text" name="preg04" id="preg04">

            <input type="submit" name="enviar" value="ENVIAR ENCUESTA">

        </form>

    </body>
</html>