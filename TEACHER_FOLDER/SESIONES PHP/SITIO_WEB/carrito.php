<!DOCTYPE html>
<html>

<head>
  <meta charset="utf8" />
  <meta name="author" content="DMA" />
  <meta name="description" content="LOGIN " />
  <meta name="keywords" content="cursos, formación, desarrollo software" />
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

  // Llamo `Client` de Guzzle para hacer las peticiones HTTP (este se llama siempre)
  // `Request` es otra forma de realizar peticiones a través de otra clase de Guzzle (se apoya en `Client` igualmente)
  use GuzzleHttp\Client;
  use GuzzleHttp\Psr7\Request;

  if (isset($_COOKIE['jwt'])) {
    if (estadoAcceso($_COOKIE['jwt'], $_ENV['SIGNATURE_KEY'], $_ENV['CIPHER_KEY'])) {


      //EL CONTENIDO DE MI PÁGINA IRIA DENTRO DE ESTE IF  
      //INICIA AQUI

      if (isset($_REQUEST['catalogo'])) {

        $cnx = new Db("localhost", "root", "", "gameclub");

        $emailUsuario = $_SESSION['usuario'];
        $costeTotal = 0;

        echo "<div class='container_separator'>";
        echo "<table>";
        echo "<tr><th>TIPO</th><th>TITULO</th><th>TARIFA</th><th>COSTE</th><th>MONEDA</th></tr>";

        // var_dump($_REQUEST);
        foreach ($_REQUEST as $key => $value) {
          // * Obtener lo videojuegos
          if ($key != "mpago" && $key != "catalogo") {
            $idVideojuego = intval($key); //el valor del id del videojuego esta en la key
            $sentencia = "SELECT videojuegos.nombre, videojuegos.precio, tarifas.tipo, tarifas.coste FROM videojuegos LEFT JOIN tarifas ON videojuegos.id_tarifa =tarifas.id WHERE videojuegos.id = $idVideojuego";
            $registro = $cnx->myQuerySimple($sentencia);

            if ($value == "comprar") {
              $costeTotal = $costeTotal + floatval($registro['precio']);
              echo "<tr>  
                <td>Compra</td>  
                <td>" . $registro['nombre'] . "</td>  
                <td> NA </td>  
                <td>" . $registro['precio'] . "</td>  
                <td> € </td> 
                </tr>";
            }
            if ($value == "alquilar") {
              $costeTotal = $costeTotal + floatval($registro['coste']);
              echo "<tr>  
                <td>Alquiler</td>  
                <td>" . $registro['nombre'] . "</td>  
                <td>" . $registro['tipo'] . "</td>  
                <td>" . $registro['coste'] . "</td>  
                <td> € </td> 
                </tr>";
            }
          }
          // * Obtengo el método de pago
          if ($key == "mpago") {
            $sentenciaSQL = "SELECT metodospago.metodo FROM metodospago WHERE metodospago.id = $value";
            $registro = $cnx->myQuerySimple($sentenciaSQL);
            if (intval($value) == 0) {
              echo "<h2 class='card'> NO he escogido un método de pago </h2>";
            } else {
              echo "<tr id='total'>
                <td>TOTAL</td>
                <td></td>
                <td></td>
                <td>$costeTotal</td>
                <td>€</td>
                </tr>";
            }
            echo "</table>";
            echo "</div>";

            echo "<h3>El método elegido es " . $registro['metodo'] . "</h3>";

            if (intval($value) == 1) { //solo si es método de pago paypal
  ?>
              <div id="userInfo" data-coste="<?= $costeTotal ?>" data-email="<?= $emailUsuario ?>"></div>
              <div id="paypal-button-container"></div>
  <?php
            }
          }
        }

        // * Creo registro en mi Database
        $cnx = new Db("localhost", "root", "", "gameclub");
        $infoUsuario = Usuario::mostrarUsuario($_SESSION['usuario']);
        $id = intval($infoUsuario['id']);
        $intent = "CAPTURE"; // Puede ser CAPTURE o AUTHORIZE
        $currencycode = "EUR"; // El código ISO de la moneda (EUR, USD, ...)
        $value = floatval($costeTotal);
        $fechaOrden = date("Y-m-d H:i:s", intval(strtotime("now")));
        $estado = "GENERADA"; // Puede ser GENERADA, EN PROCESO o COMPLETADA
        $consultaSQL = "INSERT INTO ordenespago (id_usuario, intent, currencycode, value, fechaOrden, estado) VALUES 
          ($id, '$intent', '$currencycode', $value, '$fechaOrden', '$estado');";
        $cnx->execute($consultaSQL);

        // * Realizo petición a la API paypal para generar el access_token a través del user y password de la API. Esta info es enviada a través del Header con Basic Auth
        $client = new Client();

        $clientID = 'AQ7BC8zbNCFXpLpmWON0D5ZYv6RzVFTHi9RL-jtSs_YIsEElMOIlTI1Nl8PCB7uTBRMYewSWvgJedkJ6';
        $clientSECRET = 'EHY1TneczlNLTwSQpLvV3HIW0fK6oJF4xXn37LN8Qv-oD2Nj8Qh3YgeZ0LC77izd6ljG_aQG07nOzuLm';

        // Aplico la estructura para codificar las credenciales para mandarlas como Basic Authentication
        // Codifico las credenciales en base64
        $credentials = $clientID . ":" . $clientSECRET;
        $encodeCredentials = base64_encode($credentials);

        // Definir Headers en un array
        $headers = [
          'Content-Type' => 'application/x-www-form-urlencode', // Al utilizar `x-www-form-urlencode` hay que pasar en el array `options` el `form_params => []` 
          'Authorization' => 'Basic ' . $encodeCredentials,
        ];

        // Juntar todo (si hubiese también un Body, lo juntaríamos en `$options`)
        $options = [
          'form_params' => [
            'grant_type' => 'client_credentials',
            'ignoreCache' => 'true'
          ],
          'headers' => $headers
        ];

        $URL_forAuth = 'https://api-m.sandbox.paypal.com/v1/oauth2/token';

        // Genero la petición
        $response = $client->request('POST', $URL_forAuth, $options);

        $data = $response->getBody();

        $data = json_decode($data);

        $access_token = $data->{'access_token'};

        // echo $access_token;

        // * Ahora envío la orden de pago
        $URL_forOrder = "https://api-m.sandbox.paypal.com/v2/checkout/orders";
        $client = new Client();

        $headers = [
          'Content-Type' => 'application/json', // Al utilizar `json` hay que pasar la información en formato JSON a través del body
          'Authorization' => "Bearer " . $access_token
        ];

        $body = '
        {
          "intent": "CAPTURE",
          "purchase_units": [
            {
              "amount": {
                "currency_code": "' . $currencycode . '",
                "value": "' . $value . '"
              }
            }
          ]
        }';

        $options = [
          'headers' => $headers,
          'body' => $body
        ];

        // Utilizando los métodos de la clase Client
        $res = $client->request('POST', $URL_forOrder, $options);

        $data = json_decode($res->getBody());

        $idPago = $data->{'id'}; // Saco el ID de la orden de pago

        // Utilizando la clase Request
        // $req = new Request('POST', 'https://api-m.sandbox.paypal.com/v2/checkout/orders', $headers, $body);
        // $res = $client->sendAsync($req)->wait();
        // echo $res->getBody();

        // Utilizando CURL
        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //   CURLOPT_URL => 'https://api-m.sandbox.paypal.com/v2/checkout/orders',
        //   CURLOPT_RETURNTRANSFER => true,
        //   CURLOPT_ENCODING => '',
        //   CURLOPT_MAXREDIRS => 10,
        //   CURLOPT_TIMEOUT => 0,
        //   CURLOPT_FOLLOWLOCATION => true,
        //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //   CURLOPT_CUSTOMREQUEST => 'POST',
        //   CURLOPT_POSTFIELDS =>'{
        //   "intent": "CAPTURE",
        //   "purchase_units": [
        //     {
        //       "amount": {
        //         "currency_code": "USD",
        //         "value": "100.00"
        //       }
        //     }
        //   ]
        // }',
        //   CURLOPT_HTTPHEADER => array(
        //     'Content-Type: application/json',
        //     'Authorization: Bearer A21AAJa0gRpsE7ajaSmzzDO_D1pAkclQfHz1ATjQGPGTuOua5s81hlQ9KSKnfhdt6QxpTm4elBxvHQ1owm2c1Fw7MucA1GSng'
        //   ),
        // ));

        // $response = curl_exec($curl);

        // curl_close($curl);
        // echo $response;

        // * Muestro los detalles del pago utilizando el ID de pago
        $URL_forDetailsOrder = "https://api-m.sandbox.paypal.com/v2/checkout/orders/$idPago"; // Este endpoint figura de la siguiente forma en Postman: 'https://api-m.sandbox.paypal.com/v2/checkout/orders/:order_id' donde ':order_id' es una variable de enrutamiento (patch variable). Se reconoce en las páginas porque se escribe así: 'https://api-m.sandbox.paypal.com/v2/checkout/orders/{id}'
        $client = new Client();

        $headers = [
          'Content-Type' => 'application/json', // Al utilizar `json` hay que pasar la información en formato JSON a través del body
          'Authorization' => "Bearer " . $access_token
        ];

        $options = [
          'headers' => $headers,
        ];

        // Utilizando los métodos de la clase Client
        $res = $client->request('GET', $URL_forDetailsOrder, $options);

        $data = json_decode($res->getBody());

        $purchaseUnits = $data->{'purchase_units'};

        // print_r($purchaseUnits[0]->{'amount'});

        $currency = $purchaseUnits[0]->{'amount'}->{'currency_code'};
        $price = $purchaseUnits[0]->{'amount'}->{'value'};

        echo "<table>";
        echo "<tr>   <th>ID</th>   <th>Moneda</th>   <th>Precio</th>   </tr>";
        echo "<tr>   <td>$idPago</td>   <td>$currency</td>   <td>$price</td>   </tr>";
        echo "</table>";
      }
      //TERMINA AQUI

    }
  } else {
    http_response_code(401); //No autorizado.
    echo "<h2 class='card' >Acceso denegado. No se ha proporcionado un Token.</h2>";
    echo "<br/>";
  }
  require("./html_modules/footer.php");
  ?>

  <script>
    var userInfoDiv = document.getElementById("userInfo");
    const coste = parseFloat(userInfoDiv.getAttribute('data-coste'));
    const mail = userInfoDiv.getAttribute('data-email');

    paypal.Buttons({

      style: {
        layout: 'vertical', //horizontal   / vertical
        color: 'gold', //gold, silver, blue, black, white
        shape: 'pill', // rect,  pill,
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
          payer: {
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
