<!DOCTYPE html>
<html lang="es">

    <head>

    </head>

    <body>
        <h1>Mi primera página PHP</h1>

        <?php
    
            $numeros = array(1,3,7,2,6,8,12,13,15,14,18);

            for($i = 0; $i< 11; $i++){
                echo $numeros[$i].", ";
            }

            echo "<p>*****************************</p>";
            for($i = 0; $i< 11; $i++){
                
                
                if($numeros[$i]%2 == 0 && $numeros[$i]%3 == 0){
                    $numeros[$i] =  $numeros[$i]/3;
                    echo $numeros[$i].", ";
                }
            }

        ?>






    </body>


</html>