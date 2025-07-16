<!DOCTYPE html>
<html>
    <head>
        <title>FORM NUM</title>       
    </head>
    <body>
        <h2>FORMULARIO</h2>

        <form action="form_numerico.php" method="post">  
            <label for="nombre" >NOMBRE</label>
            <input type="text" name="nombre" id="nombre">

            <label for="precio" >PRECIO</label>
            <input type="number" name="precio" id="precio">
            <input type="submit" name="enviar" value="Enviar">
        </form>

        <h2>PRECIOS</h2>

        <?php

        // unset($_REQUEST['precio']);

        if(isset($_REQUEST['precio']) && isset($_REQUEST['nombre'])){

            if($_REQUEST['nombre']=="pedro"){

                $precio          = $_REQUEST['precio'];
                $precioDescuento = $precio*0.75;
                $precioIVA       = $precio*1.21;
                
                echo "El precio de $precio con un 25% de descuento es $precioDescuento.";
                echo "<br/>";
                echo "El precio de $precio con IVA del 21% sera de $precioIVA.";
            }
        }


        ?>

    </body>
</html>