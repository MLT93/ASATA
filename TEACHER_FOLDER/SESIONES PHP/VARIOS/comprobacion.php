<!DOCTYPE html>
<html>
    <head>
        <title>FORM NUM</title>       
    </head>
    <body>
        <h2>comprobacion</h2>

        <form action="comprobacion.php" method="post">  

            <label for="numero" >NUMERO</label>
            <input type="number" name="numero" id="numero">
            <input type="submit" name="enviar" value="Enviar">
        </form>




        <h2>RESPUESTA</h2>

        <?php

        // unset($_REQUEST['numero']);

        if(isset($_REQUEST['numero']) ){
            define("numero",$_REQUEST['numero']);
            echo "El numero es ".numero;
            echo "<br/>";
        }

        var_dump($_REQUEST);

        ?>

    </body>
</html>