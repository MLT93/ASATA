<!DOCTYPE html>
<html>

<head>
  <meta charset="utf8" />
  <meta name="author" content="DMA" />
  <meta name="description" content="LISTA FACTURAS" />
  <meta name="keywords" content="cursos, formación, desarrollo software" />
  <title>LISTA FACTURAS</title>
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

      // * Conexión a la base de datos
      $cnx = new Db("localhost", "root", "", "gameclub");

      // * SHOW info database
      // $consultaSQL = "SELECT * FROM facturas;";
      // $registro = $cnx->myQueryMultiple($consultaSQL);

      // var_dump($registro);

      // * SHOW info database API PayPal
      $URL_forShowInvoices = "https://api-m.sandbox.paypal.com/v2/invoicing/invoices";
      $client = new Client();

      // Tomo la variable de sesión con el token para realizar la petición
      $access_token = $_COOKIE['token'];
      // var_dump($access_token);

      $headers = [
        'Content-Type' => 'application/json', // Al utilizar `json` hay que pasar la información en formato JSON a través del body
        'Authorization' => "Bearer " . $access_token
      ];

      $options = [
        'headers' => $headers,
      ];

      // Utilizando los métodos de la clase Client
      $res = $client->request('GET', $URL_forShowInvoices, $options);

      $data = json_decode($res->getBody());
      // var_dump($data);

      $items = $data->{'items'};
      // print_r($items[0]);

      // $invoice_id = $items[0]->{'id'};
      // $status = $items[0]->{'status'};
      // $invoice_number = $items[0]->{'detail'}->{'invoice_number'};
      // $invoice_date = $items[0]->{'detail'}->{'invoice_date'};
      // $currency_code = $items[0]->{'amount'}->{'currency_code'};
      // $amount = $items[0]->{'amount'}->{'value'};
      // $contacto = $items[0]->{'invoicer'}->{'email_address'};

      echo "<div class='container_separator'>";
      echo "<table>";
      echo "<tr>   <th>🔍</th>   <th>ID</th>   <th>Status</th>   <th>Número Factura</th>   <th>Fecha</th>   <th>Moneda</th>   <th>Total</th>   <th>Contacto</th>   <th>❌</th>   </tr>";
      foreach ($items as $key => $value) {

        echo "<tr>   
        <td><a href='detail_factura.php?idFactura=" . $value->{'id'} . "'>🔍</a></td>   " ./* Envío el cliente al detalle de la factura */ "
        <td>" . $value->{'id'} . "</td>   
        <td>" . $value->{'status'} . "</td>   
        <td>" . $value->{'detail'}->{'invoice_number'} . "</td>   
        <td>" . $value->{'detail'}->{'invoice_date'} . "</td>   
        <td>" . $value->{'amount'}->{'currency_code'} . "</td>   
        <td>" . $value->{'amount'}->{'value'} . "</td>   
        <td>" . $value->{'invoicer'}->{'email_address'} . "</td>   
        <td><a href='delete_factura.php?idFactura=" . $value->{'id'} . "'>❌</a></td>   </tr>"; /* Le agrego el ID de la factura como Query Params para que me envíe a la página de borrado y poder borrar la factura por ID (así como lo pide la API PayPal) */
      }
      echo "</table>";
      echo "</div>";
    }
  } else {
    http_response_code(401); // No autorizado
    echo "<h3 class='card' >Acceso denegado. No se ha proporcionado un Token JWT.</h3>" . "<br/>";
  }


  require("./html_modules/footer.php");
  ?>

</body>

</html>
