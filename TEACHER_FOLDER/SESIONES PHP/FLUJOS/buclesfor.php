<!DOCTYPE Html>


<html lang="es">

    <head>
        <title>bucle FOR</title>
        <meta charset="utf-8"/>
    </head>

    <body>

        <form action="buclesfor.php" method="post">
      
            <!-- <label for="numero">NUMERO</label>
            <input type="number" name="numero" > -->
      
            <label for="nombre">NOMBRE</label>
            <input type="text" name="nombre" >
      
            <label for="email">E MAIL</label>
            <input type="email" name="email" >
      
            <label for="password">PASSWORD</label>
            <input type="password" name="password" >

            <input type="submit" name="enviar" >

        </form>

        <?php
        
            $usuarios = array(
                array("pedro","mailpedro@gmail.com","33333"),
                array("antonio","mailant@gmail.com","33333"),
                array("juan","juanj@gmail.com","33333"),
                array("martin","martin@gmail.com","33333"),
                array("lucia","lulilucia@gmail.com","33333"),
            );



            // $miarrayejemplo = array("blanco", "azul", "negro");
            // in_array("verde",$miarrayejemplo);


          

            if ( isset($_REQUEST['enviar']) && isset($_REQUEST['nombre']) && isset($_REQUEST['email']) && isset($_REQUEST['password'])  ){

                // var_dump($_REQUEST);
                $usuario  = $_REQUEST['nombre'];
                $email    = $_REQUEST['email'];
                $password = $_REQUEST['password'];
                $existe   = false;

                //recorro el array donde esta la información de mis usuarios
                for ($i=0; $i < count($usuarios) ; $i++) { 
    
                    // if( ($usuario == $usuarios[$i][0]) and ($email == $usuarios[$i][1]) and ($password == $usuarios[$i][2])     ){
                    // // $existe= true;
                    // }

                    if(   (($usuario == $usuarios[$i][0]) or ($email == $usuarios[$i][1]))   and  ($password == $usuarios[$i][2]) ){
                        $existe= true;
                    }
         
                }

                if($existe){
                    echo "<p> El usuario $usuario se ha logueado con éxito.</p>";
                }
                else{
                    echo "<p> El usuario no esta registrado.</p>";
                }
            }




            // if (isset($_REQUEST['enviar']) && isset($_REQUEST['nombre']) && isset($_REQUEST['email']) && isset($_REQUEST['password'])){

            //     $numero=$_REQUEST['numero'];
            //     $usuario = $_REQUEST['nombre'];
            //     $email = $_REQUEST['email'];
            //     $password = $_REQUEST['password'];

            //     for ($i=1; $i <=$numero; $i++) { 
            //         echo "<p> Esta es la linea $i  y este el usuario es $usuario su email es y su password es $password</p>";
            //     }
            // }

        ?>

    </body>

</html>