<!DOCTYPE html>
<html>
<head>
 <meta charset="utf8"/>
 <meta name="author" content="DMA"/>
 <meta name="description" content=""/>
 <meta name="keywords" content="cursos, formación, desarrollo software"/>
 <title>REG VIDEOJUEGO</title>     
 <link href="css/styles.css" rel="stylesheet" type="text/css" />
 
 <!-- esta 4 etiquetas evitan que trabaje con los archivos js y css en caché -->
 <meta http-equiv="Expires" content="0">
 <meta http-equiv="Last-Modified" content="0">
 <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
 <meta http-equiv="Pragma" content="no-cache">
</head>


<body>

<?php
//activar el almacenamiento en búfer de salida. Esto recoge toda la salida del script hasta que decidas enviarla al navegador, permitiendo modificar las cabeceras en cualquier momento del script. 
 ob_start();
 //inicio una sesion
 session_start();

 //cabecera y nav
 require_once("./html_modules/header.php");
 require_once("./html_modules/nav.php");

 require_once("./classes/db.php");
 require_once("./classes/UsuarioDB.php");


 require_once("./functions/authentication.php");
 require_once("./functions/multimedia.php");
 //incluir el autoloader del composer
 require_once("../vendor/autoload.php");

 use UserDB\Usuario as Usuario;
 use Database\Db as Db;
//  use DateTime;
 

 $dotenv = Dotenv\Dotenv::createImmutable("./"); // Busco el directorio del archivo `.env`
 $dotenv->load();

 if(isset($_COOKIE['jwt'])){


    if(estadoAcceso($_COOKIE['jwt'], $_ENV['SIGNATURE_KEY'], $_ENV['CIPHER_KEY'])){


        //EL CONTENIDO DE MI PÁGINA IRIA DENTRO DE ESTE IF  
        //INICIA AQUI
        require_once("./html_modules/form_reg_videojuego.php");

        if(isset($_REQUEST['reg_videojuego'])){

            $nombre = $_REQUEST['nombre'];
            $descripcion = $_REQUEST['descripcion'];
            $genero = intval($_REQUEST['genero']);
            $desarrollador = intval($_REQUEST['desarrollador']);
            $plataforma = intval($_REQUEST['plataforma']);
            $pegui = intval($_REQUEST['pegui']);
            $fecha = $_REQUEST['fechaPub'];
            $isocode = $_REQUEST['isocode'];

            //aqui elimino caracteres que no sean números o letras
            $nombre = limpiarCadena($nombre);
            $nombre = substr($nombre,0,35);

            //compruebo que la imagen se ha cargado correctamente
            if(isset($_FILES['imagen']) &&  $_FILES['imagen']['error'] == 0 ){
                $fileName = $_FILES['imagen']['name'];
                $fileName = limpiarCadena($fileName);

                $fileExtension = $_FILES['imagen']['type'];
                $fileExtension = substr($fileExtension, 6); 

                $rutaTemporal = $_FILES['imagen']['tmp_name'];
                $rutaDefinitiva = "./repo/img/videogames/".$nombre."_".date('Y.m.d.His').".".$fileExtension;

                redimensionarImagen($rutaTemporal, $rutaDefinitiva, 50, 50);
                copy($rutaTemporal, $rutaDefinitiva);

                $campos =['nombre','descripcion','id_genero','id_desarrollador','id_plataforma','id_pegui','fechaPublicacion','isoCode','imagen'];
                $datos = [$nombre, $descripcion, $genero,$desarrollador,$plataforma,$pegui,$fecha, $isocode, $rutaDefinitiva];
                $cnx->insertSingleRegister("videojuegos",$campos,$datos);

                header("Location: lista_videojuegos.php");

            }


        }


        //TERMINA AQUI

    }

 }else{
  http_response_code(401);//No autorizado.
  echo "<h2 class='card' >Acceso denegado. No se ha proporcionado un Token.</h2>";echo "<br/>";
 }
 require("./html_modules/footer.php");

 ?>
 
 </body>

</html>
