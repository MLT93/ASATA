<!DOCTYPE   html>
<html>
    <head>
        <title>Respuesta</title>
    </head>
    <body>

    <h2>PRECIOS</h2>


    <?php

    $precio          = $_REQUEST['precio'];
    $precioDescuento = $precio*0.75;
    $precioIVA       = $precio*1.21;

    echo "El precio de $precio con un 25% de descuento es $precioDescuento.";
    echo "<br/>";
    echo "El precio de $precio con IVA del 21% sera de $precioIVA.";


    ?>


    </body>
</html>