<!DOCTYPE html>
<html>
    <head>
        <title>Mi primer formulario</title>       
    </head>
    <body>
        <h2>FORMULARIO</h2>

        <form action="respuesta.php" method="post">  
            <!-- El action envia a esa pagina-->
            <!-- El post es el metodo de envio -->

            <label for="nombreid">NOMBRE</label>
            <input type="text" name="nombre" id="nombreid">

            <label for="apellido1id">APELLIDO 1</label>
            <input type="text" name="apellido1" id="apellido1id">            

            <label for="apellido2id">APELLIDO 2</label>
            <input type="text" name="apellido2" id="apellido2id">

            <input type="submit" name="enviar" value="Enviar">

        </form>

        </form>
    </body>
</html>