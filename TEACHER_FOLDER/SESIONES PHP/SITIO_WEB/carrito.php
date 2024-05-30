<!DOCTYPE html>
<html>
<head>
 <meta charset="utf8"/>
 <meta name="author" content="DMA"/>
 <meta name="description" content="LOGIN "/>
 <meta name="keywords" content="cursos, formación, desarrollo software"/>
 <title>CARRITO</title>     
 <link href="css/styles.css" rel="stylesheet" type="text/css" />
 
 <!-- esta 4 etiquetas evitan que trabaje con los archivos js y css en caché -->
 <meta http-equiv="Expires" content="0">
 <meta http-equiv="Last-Modified" content="0">
 <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
 <meta http-equiv="Pragma" content="no-cache">

 <script src="https://www.paypal.com/sdk/js?client-id=AbFHCNnvdFQfEdDFNfJzDR5cuRs8GxohetYfPLAy17Hh1bgR_xgRUY7xw6fzCysQuKJt6vbosJPWQldQ&currency=EUR"> </script>

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

 $dotenv = Dotenv\Dotenv::createImmutable("./"); // Busco el directorio del archivo `.env`
 $dotenv->load();

 if(isset($_COOKIE['jwt'])){
    if(estadoAcceso($_COOKIE['jwt'], $_ENV['SIGNATURE_KEY'], $_ENV['CIPHER_KEY'])){


        //EL CONTENIDO DE MI PÁGINA IRIA DENTRO DE ESTE IF  
        //INICIA AQUI

        if(isset($_REQUEST['catalogo'])){

          $cnx = new Db("localhost","root","","gameclub");

          $emailUsuario = $_SESSION['usuario'];
          $costeTotal = 0;
          echo "<table>";
          echo "<tr><th>TIPO</th><th>TITULO</th><th>TARIFA</th><th>COSTE</th><th>MONEDA</th></tr>";

          // var_dump($_REQUEST);
          foreach($_REQUEST as $key => $value){
            //obtener lo videojuegos
            if( $key!= "mpago" && $key!= "catalogo"){ 
              $idVideojuego = intval($key);//el valor del id del videojuego esta en la key
              $sentencia = "SELECT videojuegos.nombre, videojuegos.precio, tarifas.tipo, tarifas.coste FROM videojuegos LEFT JOIN tarifas ON videojuegos.id_tarifa =tarifas.id WHERE videojuegos.id = $idVideojuego";
              $registro = $cnx->myQuerySimple($sentencia);

              if($value == "comprar"){
                $costeTotal = $costeTotal + floatval($registro['precio']);
                echo "<tr>  
                <td>Compra</td>  
                <td>".$registro['nombre']."</td>  
                <td> NA </td>  
                <td>".$registro['precio']."</td>  
                <td> € </td> 
                </tr>";
              }
              if($value == "alquilar"){
                $costeTotal = $costeTotal + floatval($registro['coste']);
                echo "<tr>  
                <td>Alquiler</td>  
                <td>".$registro['nombre']."</td>  
                <td>".$registro['tipo']."</td>  
                <td>".$registro['coste']."</td>  
                <td> € </td> 
                </tr>";
              }
            }
            //obtengo el método de pago
            if($key == "mpago"){ 
              $sentenciaSQL = "SELECT metodospago.metodo FROM metodospago WHERE metodospago.id = $value";
              $registro = $cnx->myQuerySimple($sentenciaSQL);
              if(intval($value) == 0){
                echo "<h2 class='card'> NO he escogido un método de pago </h2>";
              }else{
                echo "<tr id='total'>
                <td>TOTAL</td>
                <td></td>
                <td></td>
                <td>$costeTotal</td>
                <td>€</td>
                </tr>";
              }
              echo "</table>";
              echo "<h3>El método elegido es ".$registro['metodo']."</h3>";
              
              if(intval($value)==1){//solo si es método de pago paypal
                ?>
                  <div id="userInfo" data-coste="<?=$costeTotal?>"  data-email="<?=$emailUsuario?>" ></div>
                  <div id="paypal-button-container"></div>
                <?php
              }
              
            }
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

 <script>

 var userInfoDiv = document.getElementById("userInfo");
 const coste = parseFloat(  userInfoDiv.getAttribute('data-coste')    );
 const mail  = userInfoDiv.getAttribute('data-email');

  paypal.Buttons({

    style:{
      layout: 'vertical', //horizontal   / vertical
      color: 'gold', //gold, silver, blue, black, white
      shape:  'pill' , // rect,  pill,
      label: 'paypal' //pay, 
    },

    createOrder: function(data, actions) {
      return actions.order.create({

        purchase_units: [{
          amount: {
            value: coste,
            currency_code: 'EUR'
          }
        }],
        payer:{
          email_address: mail
        }

      });
    },
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {
        alert('Transaction completed by ' + details.payer.name.given_name);
      });
    }

  }).render('#paypal-button-container');


 </script>
 
 </body>

</html>
