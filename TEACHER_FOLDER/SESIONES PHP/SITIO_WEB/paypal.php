<!DOCTYPE html>
<html>
<head>
 <meta charset="utf8"/>
 <meta name="author" content="DMA"/>
 <meta name="description" content="LOGIN "/>
 <meta name="keywords" content="cursos, formación, desarrollo software"/>
 <title>PAYPAL</title>     
 <link href="css/styles.css" rel="stylesheet" type="text/css" />
 
 <!-- esta 4 etiquetas evitan que trabaje con los archivos js y css en caché -->
 <meta http-equiv="Expires" content="0">
 <meta http-equiv="Last-Modified" content="0">
 <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
 <meta http-equiv="Pragma" content="no-cache">

 <!-- https://www.paypal.com/sdk/js?client-id= -->
 <script src="https://www.paypal.com/sdk/js?client-id=AbFHCNnvdFQfEdDFNfJzDR5cuRs8GxohetYfPLAy17Hh1bgR_xgRUY7xw6fzCysQuKJt6vbosJPWQldQ"> </script>

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

        $infoUsuario = Usuario::mostrarUsuario($_SESSION['usuario']);
        $idUsuario = $infoUsuario['id'];

        //obtenemos el coste dle ultimo alquiler que ha hecho ese usuario 
        $sentenciaSQL = "SELECT tarifas.coste FROM videojuegos LEFT JOIN tarifas ON videojuegos.id_tarifa = tarifas.id ORDER BY videojuegos.id DESC LIMIT 1";

        $cnx = new Db("localhost","root","","gameclub");
        //aqui obtengo un registro
        $data = $cnx->myQuerySimple($sentenciaSQL);
        $costeUltimoAlquiler = $data['coste'];
        ?>

        <!-- aqui guardo la información que le pasaré a la pasarela de pago -->
        <div id="userInfo" data-coste="<?=$costeUltimoAlquiler?>"></div>
        <!-- aqui renderizo el botón de Paypal que me genera la pasarela de pago -->
        <div id="paypal-button-container"></div>

        <?php
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


  paypal.Buttons({

    createOrder: function(data, actions) {
      return actions.order.create({

        purchase_units: [{
          amount: {
            value: coste
          }
        }]

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
