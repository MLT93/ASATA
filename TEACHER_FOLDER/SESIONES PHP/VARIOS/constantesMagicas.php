<!DOCTYPE html>
<html>
    <head>
        <title>CONSTANTES MAGICAS</title>       
    </head>
    <body>

        <h2>CONSTANTES MAGICAS</h2>

        <?php

        echo "La versión de PHP de esta aplicación es ".PHP_VERSION."<br/>";
        echo "La versión del sistema operativo del servidor es ".PHP_OS."<br/>";
        echo  "La ruta donde se alamacenan las librerias es ".PHP_LIBDIR."<br/>";
        


        echo "Esta es la linea de código número: ".__LINE__."<br/>";
        echo "Esta linea esta dentro del archivo: ".__FILE__."<br/>";


        function cuadrado($numero){
            echo "Estoy dentro de la función: ".__FUNCTION__."<br/>";
            return $numero*$numero;
        }


        echo cuadrado(6);


        ?>

        <h2>OPERADORES</h2>


        <?php
        
        $producto1 = 120;
        $producto2 = 150;
        
        // <!-- DADO EL VALOR DE DOS PRECIOS SI AMBOS SON MAYORES DE 100. HACER UN DESCUENTO DEL 20% A CADA PRODUCTO-->
        if($producto1>100 and $producto2>100){
            $producto1 = $producto1*0.8;
            $producto2 = $producto2*0.8;
            echo "los productos SI tienen descuento y valen respectivamente ".$producto1." y ".$producto2."<br/>";
        }else{
            echo "los productos NO tienen descuento y valen respectivamente ".$producto1." y ".$producto2."<br/>";
        }

        // <!-- DADO EL VALOR DE DOS PRECIOS SI uno DE ELLOS ES MULTIPLO DE 10. HACER UN DESCUENTO DEL 20% AL TOTAL -->

                
        $pro1 = 120;
        $pro2 = 153;

        if($pro1%10 == 0 xor $pro2%10 == 0){
            echo "el coste total del pedido tiene descuento y el coste total es ".($pro1 + $pro2)*0.8."<br/>";
        }else{
            echo "el coste total del pedido es ".($pro1 + $pro2)."<br/>";
        }




        ?>

    </body>
</html>