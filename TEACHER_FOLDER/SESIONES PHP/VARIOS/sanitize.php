
<html lang="es">

    <head>
        <title>Comentario</title>
        <meta charset="utf-8"/>
        <meta name="author" content="**"/>
        <meta name="description" content="*"/>
        <meta name="keywords" content="***"/>
    </head>

    <body>

        <form action="sanitize.php" method="post" >


            <label for="nombreid">NOMBRE</label>
            <input type="text" name="nombre" id="nombreid">
            <br/>
            <label for="edad">EDAD</label>
            <input type="text" name="edad" id="edad">
            <br/>
            <label for="pass">CONTRASEÑA</label>
            <input type="password" name="pass" id="pass">
            <br/>
          
            <input type="submit" name="enviar" value="Enviar">

        </form>
    </body>

<?php
if(isset($_REQUEST['nombre']) && isset($_POST['edad']) && isset($_POST['pass'])  ){

    
    echo  filter_var($_REQUEST['edad'], FILTER_SANITIZE_NUMBER_INT);
    
}

?>



 </html>