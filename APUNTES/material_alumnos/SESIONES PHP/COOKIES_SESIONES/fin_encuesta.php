<!DOCTYPE html>
<html>
    <head>
        <title>RESULTADO</title>     
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    </head>

    <body>
        <?php

            if(isset($_REQUEST['nombre'])&&
            isset($_REQUEST['preg01'])&&
            isset($_REQUEST['preg02'])&&
            isset($_REQUEST['preg03'])&&
            isset($_REQUEST['preg04'])&&
            isset($_REQUEST['enviar'])
            ){

                setcookie("preg01",$_REQUEST['preg01'],time()+(3600),"/");
                setcookie("preg02",$_REQUEST['preg02'],time()+(3600),"/");
                setcookie("preg03",$_REQUEST['preg03'],time()+(3600),"/");
                setcookie("preg04",$_REQUEST['preg04'],time()+(3600),"/");
                echo "<h1>LA ENCUESTA HA SIDO REALIZADA CORRECTAMENTE</h1>";

            }


        ?>
    </body>

</html>