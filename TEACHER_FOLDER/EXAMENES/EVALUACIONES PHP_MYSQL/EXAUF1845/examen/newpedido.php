<!DOCTYPE html>
<html>
<head>
 <meta charset="utf8"/>
 <meta name="author" content="DMA"/>
 <meta name="description" content=""/>
 <meta name="keywords" content="cursos, formación, desarrollo software"/>
 <title>NUEVO PEDIDO</title>     
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

        require_once("./classes/db.php");
        
        $cnx = new Db("localhost","root","","restaurante");
        $sentenciaSQL = "SELECT * FROM productos";
        
        $lista= $cnx->myQueryMultiple($sentenciaSQL);
        ?>
        
        <form class='catalogo' action='newpedido.php' method='post'>
        
        <div id='galeria'>
        <?php
  
        // $value es un array de esa matriz, para accceder a los valores dentro del array uso los indices asociativos
        foreach($lista as $key => $value){
         ?>
         <div class='elementoGaleria'>
         <p class='nameGallery'><?=$value['nombre']?></p>
         <p><?=$value['precio']?> €</p>
         <p><input type='checkbox' name='<?=$value['id']?>' id='id<?=$value['id']?>' /></p>
         </div>
         <?php
        }
        ?>
        </div>
        <article>

        
            <input type="submit" name="pedido" value="PEDIR"/>
        </article>
        
        </form>
          <?php
        //TERMINA AQUI



        if(isset($_REQUEST['pedido'])){

         $cnx = new Db("localhost","root","","restaurante");
         $idUsuario = intval(Usuario::mostrarIdUsuario($_SESSION['usuario']));
         $now = new DateTime();
         $fecha = $now->format('Y-m-d  H:i:s');
         $sentencia = "INSERT INTO pedidos ( usuario_id, fecha, estado) VALUES ($idUsuario,'$fecha','En proceso')";
         $cnx->execute($sentencia);
         $sentenciaUltimoPedido = "SELECT id FROM pedidos WHERE pedidos.usuario_id = $idUsuario AND pedidos.estado = 'En proceso' ORDER BY pedidos.fecha DESC LIMIT 1 ";
         $regUltimoPedido = $cnx->myQuerySimple($sentenciaUltimoPedido);
         $idPedido = intval($regUltimoPedido['id']);

         foreach($_REQUEST as $key => $value){
          if($key!='pedido'){
           $sentenciaproducto = "SELECT productos.precio FROM productos WHERE productos.id = $key ";
           $producto = $cnx->myQuerySimple($sentenciaproducto);
           $precioProducto = floatval($producto['precio']);
           $sentenciaDetalle = "INSERT INTO detallespedido ( pedido_id, producto_id, cantidad, precio) VALUES ($idPedido,$key,1,$precioProducto)";
           $cnx->execute($sentenciaDetalle);
          }
         }
         echo "<h2 class='ok' >Pedido realizado</h2>";echo "<br/>";
        }
    }
       
       //TERMINA AQUI


 }else{
  http_response_code(401);//No autorizado.
  echo "<h2 class='card' >Acceso denegado. No se ha proporcionado un Token.</h2>";echo "<br/>";
 }


 ?>
 
 </body>

</html>
