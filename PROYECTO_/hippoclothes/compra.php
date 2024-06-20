<!DOCTYPE html>
<html>
<head>
 <meta charset="utf8"/>
 <meta name="author" content="DMA"/>
 <meta name="description" content=""/>
 <meta name="keywords" content="cursos, formación, desarrollo software"/>
 <title>REG COMPRA</title>     
 <link href="css/styles.css" rel="stylesheet" type="text/css" />
 
 <!-- esta 4 etiquetas evitan que trabaje con los archivos js y css en caché -->
 <meta http-equiv="Expires" content="0">
 <meta http-equiv="Last-Modified" content="0">
 <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
 <meta http-equiv="Pragma" content="no-cache">
 
 <!-- <script src="https://www.paypal.com/sdk/js?client-id=AXeihtzYXsJuQ7OixXB9JBVHsckwpCmg_oBrq1A5QU3CssXJuPzDOiBny7T3rOs3pTOfO42cR63gepCz>d"></script> -->
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

 
 if(isset($_COOKIE['jwt'])){


    if(estadoAcceso($_COOKIE['jwt'], $_ENV['SIGNATURE_KEY'], $_ENV['CIPHER_KEY'])){


        //EL CONTENIDO DE MI PÁGINA IRIA DENTRO DE ESTE IF  
        //INICIA AQUI

        $cnx = new Db("localhost","root","","gameclub");
        $sentenciaSQL = "SELECT * FROM videojuegos";
        $listaVideojuegos = $cnx->myQueryMultiple($sentenciaSQL);

        echo "<form action='carrito.php' method='post'>";
        echo "<div id='galeria'>";
        foreach($listaVideojuegos as $key=>$value){
            echo "<div class='elementoGaleria' >";
            echo "<img src='".$value["imagen"]."'/>";
            echo "<br/>";
            echo "<input type='checkbox' name='".$value['id']."' id='id".$value['id']."'/>";
            echo "<span>".$value["nombre"]."</span>";
            echo "<p> Precio: ".$value["precio"]."</p>";
            echo "</div>";
        }
        echo "</div>";

        echo "<label for='mpago'>METODO PAGO</label>";
        ?>
        <select name="mpago">
        <?php
        $sentenciaSQLMpago = "SELECT metodospago.id, metodospago.metodo FROM metodospago ";
        $itemsListaMpago = $cnx->myQueryMultiple($sentenciaSQLMpago, false);
        ?>
        <option value="0">Escoge un método de pago</option>
        <?php
        foreach($itemsListaMpago as $key => $value){
            ?>
            <option value='<?=$value[0]?>'><?=$value[1]?></option>
            <?php
        }
        ?>
        </select>
        <?php
        echo "<input type='submit'  name='pedidoCompra' id='pedidoCompra' value='COMPRAR'/>";
        echo "</form>";

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