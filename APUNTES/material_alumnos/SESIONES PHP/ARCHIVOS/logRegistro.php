
<html lang="es">

    <head>
        <title>Comentario</title>
        <meta charset="utf-8"/>
        <meta name="author" content="**"/>
        <meta name="description" content="*"/>
        <meta name="keywords" content="***"/>
    </head>

    <body>

        <form action="logRegistro.php" method="post" >


            <label for="nombreid">NOMBRE</label>
            <input type="text" name="nombre" id="nombreid">
            <br/>
            <label for="pass">CONTRASEÑA</label>
            <input type="password" name="pass" id="pass">
            <br/>
          
            <input type="submit" name="enviar" value="Enviar">

        </form>
    </body>

    <?php

    $usuarios = [
    ["pedropol36", "1234"],
    ["plopo36", "111"],
    ["marionel6", "1222"],
    ["luisunol", "1234"],
    ["ppaupon6", "1234"],
    ["pmuriol", "1234"],
    ];


    if(        isset($_REQUEST['nombre']) &&        isset($_REQUEST['pass'])     ){

     $encontrado = false;
     // Recorre cada usuario en la matriz
     foreach ($usuarios as $usuario) {
         // Comprueba si el valor en la posición 1 coincide con el valor buscado
         if ($usuario[0] == $_REQUEST['nombre'] && $usuario[1] == $_REQUEST['pass']) {
             $encontrado = true;
             break;  // Detiene el bucle si se encuentra una coincidencia
         }
     }
     
     $nombre = "Nombre: ".$_REQUEST['nombre']."\r\n";
     $pass  = "Contraseña: ".$_REQUEST['pass']."\r\n";
     $fecha = date("Y-m-d H:i:s\r\n");
     $separador = "-----------------------------------------------------------------\r\n";
     
     $registro = $nombre.$pass.$fecha.$separador;


     //DECIDO en que archivo escribo dependiendo si el LOG ha sido OK o KO

     if ($encontrado) {

      $fichero = fopen("logOK.txt","a+");
      fwrite($fichero, $registro);
      fclose($fichero);
      echo "<h2> CREDENCIALES CORRECTAS</h2>";



     }else{

      $filename = "logKO.txt";
      // Primero, vamos a asegurarnos de que el archivo existe y es escribible
      if (is_writable($filename)) {
       // Intenta abrir el archivo
       if ($file = fopen($filename, 'c+')) {
        // Lee el contenido existente
        $existingData = fread($file, filesize($filename));
        
        // Rebobina el archivo para escribir desde el principio
        rewind($file);
        // Escribe los nuevos datos seguidos del contenido existente
        if (fwrite($file, $registro . $existingData) === FALSE) {
         echo "No se pudo escribir en el archivo ($filename)";
         exit;
        }
        
        // echo "<h2> CREDENCIALES INCORRECTAS</h2>";
        // echo "Éxito al escribir en el archivo";
        // Cierra el archivo
        fclose($file);
       } else {
        echo "No se pudo abrir el archivo ($filename)";
       }
      } else {
       echo "El archivo $filename no es escribible";
      }
      
      }
    }
?>
