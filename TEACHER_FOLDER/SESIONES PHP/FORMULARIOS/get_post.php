<!DOCTYPE html>
<html>
    <head>
        <title>ACCESO</title>       
    </head>
    <body>
        <h2>LOG</h2>

        <form action="resp_get_post.php" method="post">  


            <label for="nombreid">NOMBRE</label>
            <input type="text" name="nombre" id="nombreid">

            <label for="pass">PASSWORD</label>
            <input type="password" name="pass" id="pass">

            <label for="tipo">TIPO USUARIO</label>
            <input type="text" name="tipo" id="tipo">



            <input type="submit" name="enviar" value="Enviar">


            <!-- <a href="http://localhost/PHP/FORMULARIOS/resp_get_post.php?name=pedro&tipo=admin">Envio de información GET</a> -->

        </form>

        </form>
    </body>
</html>