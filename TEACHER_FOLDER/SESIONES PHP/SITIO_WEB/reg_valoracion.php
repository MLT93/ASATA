<!DOCTYPE html>
<html>
<head>
 <meta charset="utf8"/>
 <meta name="author" content="DMA"/>
 <meta name="description" content=""/>
 <meta name="keywords" content="cursos, formación, desarrollo software"/>
 <title>REG VALORACION</title>     
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
 //incluir el autoloader del composer
 require_once("../vendor/autoload.php");

 use UserDB\Usuario as Usuario;
 use Database\Db as Db;
//  use DateTime;
 

 $dotenv = Dotenv\Dotenv::createImmutable("./");
 $dotenv->load();

 if(isset($_COOKIE['jwt'])){


    if(estadoAcceso($_COOKIE['jwt'], $_ENV['SIGNATURE_KEY'], $_ENV['CIPHER_KEY'])){


        //EL CONTENIDO DE MI PÁGINA IRIA DENTRO DE ESTE IF  
        //INICIA AQUI

        //aqui obtenemos el ultimo alquiler del usuario logueado
        $id = Usuario::mostrarIdUsuario($_SESSION['usuario']);
        $sentenciaSQL = "SELECT alquileres.id, videojuegos.nombre FROM alquileres INNER JOIN videojuegos ON alquileres.id_videojuego = videojuegos.id WHERE alquileres.id_usuario = $id ORDER BY alquileres.id DESC LIMIT 1";
        $cnx = new Db("localhost","root","","gameclub");
        $ultimoAlquiler = $cnx->myQuerySimple($sentenciaSQL);
        
        if(isset($ultimoAlquiler['id'])){
            //aqui obtenemos si existe una valoracion para ese utlimo alquiler de ese usuario
            $senSQL = "SELECT COUNT(*) FROM valoraciones WHERE valoraciones.id_alquiler = ".$ultimoAlquiler['id'];
            $existeValoracion = $cnx->myQuerySimple($senSQL);
            
            
            //CONDICIONAL para tratar si existe valoracion o no
            if(  $existeValoracion["COUNT(*)"] <1){
                
                //MUESTRO POR PANTALLA EL ULTIMO ALQUILER DE ESE CLIENTE
                echo "<h2> Su ultimo alquiler ha sido: ". $ultimoAlquiler['nombre']."</h2>";
                require_once("./html_modules/form_valoracion.php");
                
                if(isset($_REQUEST['valorar'])){
                    $campos = ['valoracion','id_alquiler'];
                    $data = [  intval($_REQUEST['valoracion'])  , $ultimoAlquiler["id"] ];
                    $cnx->insertSingleRegister("valoraciones",$campos, $data);
                    
                    header("Location: lista_valoraciones.php");
                }
                
            }else{
                echo "<h2 class='ok'> Ahora mismo no tiene ningún videojuego pendiente de valoración</h2>";
            }
            
        }else{
            echo "<h2  class='ok'> No ha hecho aún ningún alquiler para valorar.</h2>";
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