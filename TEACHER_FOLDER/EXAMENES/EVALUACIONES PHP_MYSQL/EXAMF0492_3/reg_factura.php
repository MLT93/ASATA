<!DOCTYPE html>
<html>
<head>
 <meta charset="utf8"/>
 <meta name="author" content="DMA"/>
 <meta name="description" content=""/>
 <meta name="keywords" content="cursos, formación, desarrollo software"/>
 <title>REG FACTURA</title>     
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




        if(
         isset($_REQUEST['alquiler']) &&
         isset($_REQUEST['fechaIni']) &&
         isset($_REQUEST['ndias']) &&
         isset($_REQUEST['pedido'])
         ){

         $cnx = new Db("localhost","root","","concesionario");
         $idUsuario = intval(Usuario::mostrarIdUsuario($_SESSION['usuario']));
         $now = new DateTime();
         $fecha = $now->format('Y-m-d  H:i:s');
         $sentencia = "INSERT INTO alquileres ( usuario_id, fecha, estado) VALUES ($idUsuario,'$fecha','En proceso')";
         $registro = $cnx->execute($sentencia);
         $sentenciaUltimoPedido = "SELECT id FROM alquileres WHERE alquileres.usuario_id = $idUsuario AND alquileres.estado = 'En proceso' ORDER BY alquileres.fecha DESC LIMIT 1 ";
         $regUltimoPedido = $cnx->myQuerySimple($sentenciaUltimoPedido);
         $idPedido = intval($regUltimoPedido['id']);


         $coche = $_REQUEST['alquiler'];

         $sentenciaproducto = "SELECT * FROM productos 
         INNER JOIN detallesalquileres ON detallesalquileres.producto_id = productos.id 
         WHERE productos.id = $coche ";
         $producto = $cnx->myQuerySimple($sentenciaproducto);
  
         $subtotalProducto = intval($_REQUEST['ndias']) * floatval($producto['precio']);
         $total = $subtotalProducto ;

         $ndias = $_REQUEST['ndias'];
         $nombre = $producto['nombre'];
         $descripcion = $producto['descripcion'];
         $cantidad = intval($_REQUEST['ndias']);
         $precioProducto = $producto['precio'];

         $fechaEntrega = $_REQUEST['fechaIni'];
         $fechaDevolucion = $_REQUEST['fechaIni'];

         $coche = $_REQUEST['alquiler'];

         $sentenciaDetalle = "INSERT INTO detallesalquileres ( alquiler_id, producto_id, cantidad, subtotal, fechaEntrega, fechaDevolucion) VALUES ($idPedido,$coche,$cantidad,$subtotalProducto,'$fechaEntrega', '$fechaDevolucion')";
         $registroDetalle = $cnx->execute($sentenciaDetalle);
         $items = '{
          "name": "'.$nombre.'",
          "description": "'.$descripcion.'",
          "quantity": "'.$ndias.'",
          "unit_amount": {
           "currency_code": "EUR",
           "value": "'.$precioProducto .'"
          },
          "unit_of_measure": "QUANTITY"
         }';


         $infousuario = Usuario::mostrarUsuario($_SESSION['usuario']);
         $now = new DateTime();
         $fecha = $now->format('Y-m-d');
         $fechahora = $now->format('Y-m-d  H:i:s');
         $randomNumber = rand(1, 10000);

         $curl = curl_init();
         
         curl_setopt_array($curl, array(
         CURLOPT_URL => 'https://api-m.sandbox.paypal.com/v2/invoicing/invoices',
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => '',
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 0,
         CURLOPT_FOLLOWLOCATION => true,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => 'POST',
         CURLOPT_POSTFIELDS =>'{
          "detail": {
               "currency_code": "EUR",
              "invoice_number": "'.$randomNumber.'",
              "reference": "deal-ref",
              "invoice_date": "'.$fecha.'",
               "note": "Gracias por su alquiler.Buen viaje."
             },
             "invoicer": {
               "name": {
                 "given_name": "concesionario Cars"
               },
               "address": {
                 "address_line_1": "Calle Mayor 10"
               },
               "email_address": "contacto@concesionariocars.com"
             },
            "primary_recipients": [
              {
                "billing_info": {
                  "name": {
                    "given_name": "'.$infousuario['nickname'].'"
                  },
                  "address": {
                    "address_line_1": "'.$infousuario['direccion'].'"
                  },
                  "email_address": "'.$infousuario['email'].'",
                  "additional_info_value": "add-info"
                }
              }
            ],
            "items": ['.$items.'
            ]
          }',
         CURLOPT_HTTPHEADER => array(
           'Content-Type: application/json',
           'Authorization: Bearer '.$_ENV['ACCESS_TOKEN_PAYPAL']
         ),
         ));
         
         //aqui ejecuto la petición htttp
         $response = curl_exec($curl);

         //aqui formateo la respuesta a un string de json
         $response = json_decode($response);

         var_dump($response);
         curl_close($curl);
         header("Location: lista_alquileres.php");
        }else{
           echo "<h2 class='card' >Falta algún campo por rellenar.</h2>";echo "<br/>";

        }
        //TERMINA AQUI

    }

 }else{
  http_response_code(401);//No autorizado.
  echo "<h2 class='card' >Acceso denegado. No se ha proporcionado un Token.</h2>";echo "<br/>";
 }


 ?>
 
 </body>

</html>