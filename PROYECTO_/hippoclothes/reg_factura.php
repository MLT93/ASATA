<!DOCTYPE html>
<html>

<head>
  <meta charset="utf8" />
  <meta name="author" content="DMA" />
  <meta name="description" content="REGISTRO FACTURA" />
  <meta name="keywords" content="cursos, formación, desarrollo software" />
  <title>REG FACTURA</title>
  <link rel="stylesheet" href="./css/styles.css">

  <!-- Estas 4 etiquetas 'meta' evitan que se guarden en la memoria Caché los archivos JS y CSS. De este modo nos aseguramos que al realizar cambios, los busque y actualice la información -->
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">
</head>


<body>

  <?php
  // Activar almacenamiento en el búfer de salida. Esto recoge toda la salida del script hasta que decidas enviarla al navegador, permitiendo modificar las cabeceras en cualquier momento del script
  // Permite modificar las cabeceras en cualquier momento
  ob_start();

  // Inicio una sesión para poder trabajar con la información de la super-variable `$_SESSION`
  // Inicio una sesión. Siempre iniciar una sesión en las páginas que reciben o manejan información del usuario
  session_start(); //=> Hace falta iniciar sesión para trabajar con la info del usuario

  // Cabecera, nav
  require_once("./html_modules/header.php");
  require_once("./html_modules/nav.php");

  // Añado los archivos de las clases
  require_once("./classes/db.php");
  require_once("./classes/UsuarioDB.php");

  // Incluir funciones
  require_once("./functions/authentication.php");

  // Llamo a las clases
  // Primer  elemento es el namespace
  // Segundo elemento es la clase 
  // Tercer  elemento el pseudonimo de la clase
  use Database\Db as Db;
  use UserDB\Usuario as Usuario;
  use GuzzleHttp\Client;

  // Esto lo cargo para utilizar las variables de entorno en el archivo `.env`
  // Es necesario el `autoload` del `vendor` para cargar y encontrar estos paquetes. También se puede cargar el directorio en otro archivo e importar este en él
  // La función estática en el namespace `Dotenv` recibe 1 parámetro
  // 1 El directorio donde encontrar el archivo `.env`. No hace falta poner el nombre del archivo oculto, solo ponemos el directorio donde está porque lo busca automáticamente
  require_once("../vendor/autoload.php");

  use Dotenv\Dotenv;

  $dotenv = Dotenv::createImmutable("./"); // Busco el directorio del archivo `.env`
  $dotenv->load();

  // * Compruebo la existencia de credenciales en el la cookie del token JWT y si coincide con la información del usuario en la variable de sesión `PHPSESSID` 
  if ($_COOKIE['jwt']) {

    $jwt = $_COOKIE['jwt'];
    $secretKey = $_ENV['SIGNATURE_KEY'];
    $cipherKey = $_ENV['CIPHER_KEY'];
    if (estadoAcceso($jwt, $secretKey, $cipherKey)) {

      // TODO: MODIFICAR EL BODY DE LA PETICIÓN PARA PONER BIEN EL EMISOR DE LA FACTURA. QUIEN EMITE LA FACTURA ES LA EMPRESA, NO EL USUARIO. UTILIZA LA SIGUIENTE ESTRUCTURA:
      /* 
      {
                    "detail": {
                        "currency_code": "EUR",
                        "invoice_number": "' . $n_factura . '",
                        "reference": "deal-ref",
                        "invoice_date": "' . $fecha . '",
                        "note": "Gracias por su pedido."
                    },
                    "invoicer": {
                        "name": {
                            "given_name": "Restaurante Family"
                        },
                        "address": {
                            "address_line_1": "Calle Mayor 10"
                        },
                        "email_address": "contacto@restaurantefamily.com"
                    },
                    "primary_recipients": [
                        {
                            "billing_info": {
                                "name": {
                                    "given_name": "' . $nickname . '"
                                },
                                "address": {
                                    "address_line_1": "' . $direccion . '"
                                },
                                "email_address": "' . $email . '",
                                "additional_info_value": "add-info"
                            }
                        }
                    ],
                    "items": [
                        {
                            "name": "' . $nameProducto . '",
                            "description": "' . $descripcionProducto . '",
                            "quantity": "1",
                            "unit_amount": {
                                "currency_code": "EUR",
                                "value": "' . $valueProducto . '"
                            },
                            "unit_of_measure": "QUANTITY"
                        },
                        {
                            "name": "' . $nameProducto . '",
                            "description": "' . $descripcionProducto . '",
                            "quantity": "1",
                            "unit_amount": {
                                "currency_code": "EUR",
                                "value": "' . $valueProducto . '"
                            },
                            "unit_of_measure": "QUANTITY"
                        }
                    ]
                }
      
      */

      // * Conexión a la base de datos
      $cnx = new Db("localhost", "root", "", "gameclub");

      // * Cargo el formulario después de realizar la conexión a la base de datos para que el código PHP que se ejecuta en el formulario funcione
      require_once("./html_modules/form_factura.php");

      // * REGISTRAR datos del formulario
      if (isset($_POST['facturar'])) {

        // Variables del usuario que están dentro de las variables de sesión y se comprueba el usuario en la base de datos
        $infoUsuario = Usuario::mostrarUsuario($_SESSION['usuario']);
        $apellido1 = $infoUsuario["apellido1"];

        // Variables formulario
        $emisor = $_POST["emisor"];
        $email = $_POST["email"];
        $monedaDePago = $_POST["currency"];
        $total = floatval($_POST['total']);

        // Variables adicionales
        // $caracteresUsados = "01234567890123456789";
        // $longitud = 4;
        // $textoAleatorio = substr(str_shuffle($caracteresUsados), 0, $longitud); // Cadena aleatoria
        // $n_factura = "#" . $textoAleatorio; // Proviene de la API PayPal
        $n_factura = "#" . rand(1, 10000);
        // var_dump($n_factura);

        $estado = "DRAFT"; // Para la API PayPal

        $fechaCreacionFactura = date("Y-m-d", intval(strtotime("now"))); // Fechas en timestamp

        $fechaActualizacionFactura = ""; // Cuando cambia el estado de la factura
        if ($estado == "DRAFT") { // Esto lo devuelve la API
          $fechaActualizacionFactura = date("Y-m-d", intval(strtotime($fechaCreacionFactura . "+30 second")));
        } else {
          $fechaActualizacionFactura = date("Y-m-d", intval(strtotime($fechaCreacionFactura . "+1 week")));
        }

        $fechaExpiracionFactura = date("Y-m-d", intval(strtotime($fechaCreacionFactura . "+1 month")));

        // * Realizo petición a la API paypal para generar el access_token a través del user y password de la API. Esta info es enviada a través del Header con Basic Auth
        $client = new Client();

        // Guardo la info del Token en para poderla utilizar en más páginas
        // if (!isset($_SESSION['token'])) {
        // $_SESSION['token'] = $access_token;

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

        setcookie('token', $access_token, time() + 3600, "/"); // Duración de 1h (igual que la del usuario)
        // }

        // * Ahora envío la factura a través de la API paypal
        $URL_invoice = "https://api-m.sandbox.paypal.com/v2/invoicing/invoices";
        $client = new Client();

        $headers = [
          'Content-Type' => 'application/json', // Al utilizar `json` hay que pasar la información en formato JSON a través del body
          'Authorization' => "Bearer " . $access_token
        ];

        $body =
          /*
        {
            "detail": {
                "currency_code": "USD",
                "invoice_number": "",
                "reference": "deal-ref",
                "invoice_date": "2018-11-12",
                "note": "Thank you for your business.",
                "term": "No refunds after 30 days.",
                "memo": "This is a long contract",
                "payment_term": {
                    "term_type": "NET_10",
                    "due_date": "2018-11-22"
                }
            },
            "invoicer": {
                "name": {
                    "given_name": "nombre",
                    "surname": "apellido"
                },
                "address": {
                    "address_line_1": "1234 Anyway",
                    "address_line_2": "337673 Example",
                    "admin_area_2": "Anytown",
                    "admin_area_1": "CA",
                    "postal_code": "98765",
                    "country_code": "EU"
                },
                "email_address": "email@example.com"
            }
        }
        */
          '{
            "detail": {
                "currency_code": "' . $monedaDePago . '",
                "invoice_number": "' . $n_factura . '",
                "reference": "deal-ref",
                "invoice_date": "' . $fechaCreacionFactura . '",
                "note": "Thank you for your business.",
                "term": "No refunds after 30 days.",
                "memo": "This is a long contract"
            },
            "invoicer": {
                "name": {
                    "given_name": "' . $emisor . '",
                    "surname": "' . $apellido1 . '"
                },
                "address": {
                    "address_line_1": "1234 Anyway",
                    "address_line_2": "337673 Example",
                    "admin_area_2": "Anytown",
                    "admin_area_1": "CA",
                    "postal_code": "98765",
                    "country_code": "EU"
                },
                "email_address": "' . $email . '"
            },
            "amount": {
                "breakdown": {
                    "custom": {
                        "label": "Packing Charges",
                        "amount": {
                            "currency_code": "' . $monedaDePago . '",
                            "value": "' . $total . '"
                        }
                    },
                    "shipping": {},
                    "discount": {}
                }
            }
        }';

        $options = [
          'headers' => $headers,
          'body' => $body
        ];

        $res = $client->request('POST', $URL_invoice, $options);

        $data = json_decode($res->getBody());

        // var_dump($data);

        // var_dump($data['href']);
        // Ejemplo de lo que devuelve: ["href"]=> string(77) "https://api.sandbox.paypal.com/v2/invoicing/invoices/INV2-T9NB-ZNJC-DZT3-2XRH"
        $longInicial = strlen($data->{'href'}) - 24;
        $longFinal = strlen($data->{'href'});
        $idInvoice = substr($data->{'href'}, $longInicial, $longFinal);
        // var_dump($idInvoice);

        // * Creo registro en mi Database
        // Variables para mi Database
        $fechaCreacionFactura = date("Y-m-d H:i:s", intval(strtotime("now"))); // Fechas en timestamp

        $fechaActualizacionFactura = ""; // Cuando cambia el estado de la factura
        if ($estado == "DRAFT") { // Esto lo devuelve la API
          $fechaActualizacionFactura = date("Y-m-d H:i:s", intval(strtotime($fechaCreacionFactura . "+30 second")));
        } else {
          $fechaActualizacionFactura = date("Y-m-d H:i:s", intval(strtotime($fechaCreacionFactura . "+1 week")));
        }

        // Realizo consulta SQL
        $consultaSQL = "INSERT INTO facturas (n_factura, fechaCreacion, fechaActualizacion, estado, total, emisor) VALUES
        ('$idInvoice', '$fechaCreacionFactura', '$fechaActualizacionFactura', 'DRAFT', $total, '$emisor');";

        // Ejecuto consulta SQL
        $cnx->execute($consultaSQL);

        // Envío msg al cliente
        $msgFooter = "Factura realizada con éxito"; //=> Conexión con el footer

        // Envío el cliente a otra página o la recargo
        header("Location: lista_facturas.php");
      }
    }
  } else {
    http_response_code(401); // No autorizado
    echo "<h3 class='card' >Acceso denegado. No se ha proporcionado un Token JWT.</h3>" . "<br/>";
  }


  require("./html_modules/footer.php");
  ?>

</body>

</html>
