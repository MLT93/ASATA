<!DOCTYPE html>
<html>
<head>
 <meta charset="utf8"/>
 <meta name="author" content="DMA"/>
 <meta name="description" content=""/>
 <meta name="keywords" content="cursos, formación, desarrollo software"/>
 <title>LISTA FACTURAS</title>     
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
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api-m.sandbox.paypal.com/v2/invoicing/invoices?page_size=100',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$_ENV['ACCESS_TOKEN_PAYPAL']
          ),
        ));
        
        $response = curl_exec($curl);
        $response = json_decode($response,true);

        echo "<table>
        <tr>
        <th>ID</th>
        <th>FECHA</th>
        <th>Nº FACTURA</th>
        <th>ESTADO</th> 
        <th>TOTAL</th> 
        <th>MONEDA</th>  
        <th>EMISOR EMAIL</th> 
        <th>DESTINATARIO</th>
        </tr>";
        // if( isset($response['items']) ){
          foreach($response['items'] as $clave => $factura){ //aqui recorro cada una de las facturas
           
           // curl_setopt_array($curl, array(
           //   CURLOPT_URL => 'https://api-m.sandbox.paypal.com/v2/invoicing/invoices/'.$factura["id"],
           //   CURLOPT_RETURNTRANSFER => true,
           //   CURLOPT_ENCODING => '',
           //   CURLOPT_MAXREDIRS => 10,
           //   CURLOPT_TIMEOUT => 0,
           //   CURLOPT_FOLLOWLOCATION => true,
           //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
           //   CURLOPT_CUSTOMREQUEST => 'GET',
           //   CURLOPT_HTTPHEADER => array(
           //     'Authorization: Bearer '.$_ENV['ACCESS_TOKEN_PAYPAL']
           //   ),
           // ));
           // $responseDetail = curl_exec($curl);
           // $responseDetail = json_decode($responseDetail,true);
           // curl_close($curl);

           if(
             isset($factura["invoicer"]) &&
             isset($factura["primary_recipients"])  && 
             $factura["invoicer"]["email_address"]=="contacto@concesionariocars.com" && 
             $factura["primary_recipients"][0]["billing_info"]["email_address"] == $_SESSION['usuario']
           ){
 
             echo "<tr>";
             echo "<td>".$factura["id"]."</td>";
             echo "<td>".$factura["detail"]['metadata']['create_time']."</td>";
             echo "<td>".$factura["detail"]['invoice_number']."</td>";
             echo "<td>".$factura["status"]."</td>";
             // echo "<td></td>";
             // echo "<td>".$responseDetail["items"][0]['name']."</td>";
             echo "<td>".$factura["amount"]['value']."</td>";
             echo "<td>".$factura["amount"]["currency_code"]."</td>";
             echo "<td>".$factura["invoicer"]["email_address"]."</td>";
             echo "<td>".$factura["primary_recipients"][0]["billing_info"]["email_address"]."</td>";
             echo "</tr>";
           }
          // }
          //TERMINA AQUI
        }
        echo "</table>";
    }

 }else{
  http_response_code(401);//No autorizado.
  echo "<h2 class='card' >Acceso denegado. No se ha proporcionado un Token.</h2>";echo "<br/>";
 }


 ?>
 
 </body>

</html>