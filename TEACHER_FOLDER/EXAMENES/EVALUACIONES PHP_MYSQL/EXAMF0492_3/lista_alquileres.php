<!DOCTYPE html>
<html>
<head>
 <meta charset="utf8"/>
 <meta name="author" content="DMA"/>
 <meta name="description" content=""/>
 <meta name="keywords" content="cursos, formación, desarrollo software"/>
 <title>LISTA ALQUILERES</title>     
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
 require_once("./classes/UsuarioDB.php");
 require_once("./classes/db.php");

 require_once("./functions/authentication.php");
 //incluir el autoloader del composer
 require_once("../vendor/autoload.php");

 use UserDB\Usuario as Usuario;
 use Database\Db as Db;

 $dotenv = Dotenv\Dotenv::createImmutable("./");
 $dotenv->load();

 if(isset($_COOKIE['jwt'])){


    if(estadoAcceso($_COOKIE['jwt'], $_ENV['SIGNATURE_KEY'], $_ENV['CIPHER_KEY'])){


        //EL CONTENIDO DE MI PÁGINA IRIA DENTRO DE ESTE IF  
        //INICIA AQUI

        $cnx = new Db("localhost","root","","concesionario");
        $idUsuario = intval(Usuario::mostrarIdUsuario($_SESSION['usuario']));
        $sentenciaAlquileres = "SELECT * FROM alquileres WHERE alquileres.usuario_id = $idUsuario ";
        $regAlquileres = $cnx->myQueryMultiple($sentenciaAlquileres);


        echo "<table>
        <tr>
        <th>Nº PEDIDO</th>
        <th>FECHA</th>
        <th>PRODUCTO</th>
        <th>DIAS</th>
        <th>SUBTOTAL</th>
        <th>MONEDA</th>  
        </tr>";

        foreach($regAlquileres as $key => $value){

         $idAlquiler = $regAlquileres[$key]['id'];
         $sentenciaDetallesAlquileres = "SELECT * FROM detallesalquileres 
         INNER JOIN productos ON detallesalquileres.producto_id = productos.id 
         INNER JOIN alquileres ON detallesalquileres.alquiler_id = alquileres.id 
         WHERE detallesalquileres.alquiler_id = $idAlquiler  ORDER BY detallesalquileres.id DESC";
         $regDetallesAlquileres = $cnx->myQueryMultiple($sentenciaDetallesAlquileres);


         foreach($regDetallesAlquileres as $clave => $valor){
          echo "<tr>";
           echo "<td>".$regDetallesAlquileres[$clave]['alquiler_id']."</td>";
           echo "<td>".$regDetallesAlquileres[$clave]['fecha']."</td>";
           echo "<td>".$regDetallesAlquileres[$clave]['nombre']."</td>";
           echo "<td>".$regDetallesAlquileres[$clave]['cantidad']."</td>";
           echo "<td>".$regDetallesAlquileres[$clave]['subtotal']."</td>";
           echo "<td>EUR</td>";
           echo "</tr>";

         }
        }
        echo "</table>";

        //TERMINA AQUI

    }

 }else{
  http_response_code(401);//No autorizado.
  echo "<h2 class='card' >Acceso denegado. No se ha proporcionado un Token.</h2>";echo "<br/>";
 }


 ?>
 
 </body>

</html>