<!DOCTYPE html>
<html>
<head>
 <meta charset="utf8"/>
 <meta name="author" content="DMA"/>
 <meta name="description" content=""/>
 <meta name="keywords" content="cursos, formación, desarrollo software"/>
 <title>GARAJE</title>     
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
    
    $cnx = new Db("localhost","root","","concesionario");
    $sentenciaSQL = "SELECT * FROM productos";
    
    $lista= $cnx->myQueryMultiple($sentenciaSQL);
    ?>
    
    <form class='catalogo' action='reg_factura.php' method='post'>
    
      <div id='galeria'>
      <?php
        foreach($lista as $key => $value){
      ?>
        <div class='elementoGaleria'>
          <img class='redondeado' src='<?=$value['imagen']?>' />
          <span><input type='radio' name='alquiler' value='<?=$value['id']?>' id='id<?=$value['id']?>' /> <?=$value['nombre']?> </span>
          <br/>
          <span><?=$value['precio']?> € / día</span>

        </div>
      <?php
        }
      ?>
      <label for="fechaIni">INICIO ALQUILER</label>
      <input type="date" name="fechaIni" id="fechaIni">
      
      <label for="ndias">NUMERO DE DIAS</label>
      <input type="number" name="ndias" id="ndias">
      
      <input type="submit" name="pedido" value="ALQUILAR"/>

    </form>
    <?php
    //TERMINA AQUI

  }


 }else{
  http_response_code(401);//No autorizado.
  echo "<h2 class='card' >Acceso denegado. No se ha proporcionado un Token.</h2>";echo "<br/>";
 }
?>
 
 </body>

</html>