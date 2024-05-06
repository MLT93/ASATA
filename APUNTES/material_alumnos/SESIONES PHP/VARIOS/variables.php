<!DOCTYPE html>
<html lang="es">

    <head>

    </head>

    <body>
        <h1>Mi primera página PHP</h1>

        <?php
        // comillas dobles interpreta las etiquetas HTML
            echo "Esto es un texto <br/> dentro de PHP<br/>";
            // echo "Esto es un texto con 2 lineas:\r\n Esta es la segunda linea de código \r\n Esta es la tercera linea de código";
        //comilla simples
            echo 'Esto es un texto <br/> dentro de PHP<br/>';

        $nombrevariable = 1;    

        echo "El valor del id del usuario es $nombrevariable <br/>";

        echo 'El valor del id <br/> del usuario es $nombrevariable <br/>';
        echo 'El valor del id del usuario es '.$nombrevariable.'<br/>'
        ?>


        <h2>Variables dinamicas</h2>

        <?php

        $a="Hola";
        $$a="Mundo";
        // tengo dos Variables
        // $a ="Hola"
        // $Hola = "Mundo"


        // echo $a;
        // echo $Hola;
        echo $a.' '.$Hola.'<br/>';
        echo $a.' '.$$a.'<br/>';
        
        echo "$a ${$a}";

        ?>


        <h2>Otras variables númericas</h2>

        <?php
        $entero = 123;
        $enteroNeg = -123;
        $enteroMult = 8*5;
        $decimal = 3.141592;
        $numeroExp = 3.2e5;  // 320 000
        $numeroExp2 = 4E-8;  //  4 / 10^8   => 0.00000004
        $numeroExp3 = 3*4e-8; 


        echo "$entero<br/>";
        echo "$enteroNeg<br/>";
        echo "$enteroMult<br/>";
        echo "$decimal<br/>";
        echo "$numeroExp<br/>";

        echo "$numeroExp2<br/>";
        echo "$numeroExp3<br/>"


        ?>


        <h2>Mi primer array</h2>

       <?php
            $colores = array("blanco","amarillo","azul","rojo","verde");
            // echo $colores[1];

            for( $i=0 ; $i<5 ; $i++ ){
                echo $colores[$i]."<br/>";

            }

        ?>

        <h2>Variables booleanas</h2>

        <?php
            // $existe1 = true;
            // $existe2 = TRUE;
            $existe3 = false;
            $existe4 = FALSE;

            // echo $existe1;
            // echo $existe2;
            echo $existe3;
            echo $existe4;




        ?>



    </body>


</html>