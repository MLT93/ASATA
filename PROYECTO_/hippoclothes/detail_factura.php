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

      // * GET by ID on database API PayPal
      // Si existe la Query Param, entro en el if
      if (isset($_GET['idFactura'])) {

        $idQueryParam = $_GET['idFactura']; // Esto es así porque lo recibo directamente de las Query Params
        // var_dump($idQueryParam);

        //Mostramos la info de la factura
        $URL_forShowInvoiceById = "https://api-m.sandbox.paypal.com/v2/invoicing/invoices/$idQueryParam";
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
        $res = $client->request('GET', $URL_forShowInvoiceById, $options);

        $data = json_decode($res->getBody());
        // var_dump($data);

        // echo $data;
        // * Controlo que al enviar el ID, me devuelva `$data->{'name'}` que corresponde al error de la API. Si no hay error, envío la tabla
        if (isset($data->{'id'})) {

          $invoice_id = $data->{'id'};
          $status = $data->{'status'};
          $invoice_number = $data->{'detail'}->{'invoice_number'};
          $memo = $data->{'detail'}->{'memo'};
          $create_time = $data->{'detail'}->{'metadata'}->{'create_time'};
          $last_update_time = $data->{'detail'}->{'metadata'}->{'last_update_time'};
          $currency_code = $data->{'amount'}->{'currency_code'};
          $value = $data->{'amount'}->{'value'};
          $contacto = $data->{'invoicer'}->{'email_address'};
          $nombreDelContacto = $data->{'invoicer'}->{'name'}->{'given_name'};
          $apellidoDelContacto = $data->{'invoicer'}->{'name'}->{'surname'};
          $address = $data->{'invoicer'}->{'address'}->{'address_line_1'};

          // Si no existe el dato en la database y es null, enviamos un mensaje diciendo que no existe ese dato
          $msg = "NO DATA";

          echo "<div class='container_separator'>";
          echo "<table>";
          echo "<tr>   <th>ID</th>   <th>Status</th>   <th>Número Factura</th>   <th>Fecha Creación</th>   <th>Fecha Actualización</th>   <th>Moneda</th>   <th>Total</th>   <th>Contacto</th>   <th>Cliente</th>   <th>Dirección</th>   <th>Descripcion</th>   </tr>";
          echo "<tr>    
          <td>" . $invoice_id . "</td>   
          <td>" . $status . "</td>   
          <td>" . $invoice_number . "</td>   
          <td>" . $create_time . "</td>   
          <td>" . $last_update_time . "</td>   
          <td>" . $currency_code . "</td>   
          <td>" . (isset($value) && $value != null ? $value : $msg) . "</td>   
          <td>" . (isset($contacto) && $contacto != null ? $contacto : $msg) . "</td>   
          <td>" . (isset($nombreDelContacto) && $nombreDelContacto != null ? $nombreDelContacto : $msg) . " " . (isset($apellidoDelContacto) && $apellidoDelContacto != null ? $apellidoDelContacto : $msg) . "</td>   
          <td>" . (isset($address) && $address != null ? $address : $msg) . "</td>   
          <td>" . (isset($memo) && $memo != null ? $memo : $msg) . "</td>   </tr>";
          echo "</table>";
          echo "</div>";
        } else {
          // http_response_code(404); // Not Found
          echo "<h3 class='card' >El ID de la factura no se encuentra el la base de datos de PayPal.</h3>" . "<br/>";
        }
      }

      // * DELETE by ID on database API PayPal


      // Envío msg al cliente
      // $msgFooter = "Factura borrada con éxito"; //=> Conexión con el footer
    }
  } else {
    http_response_code(401); // No autorizado
    echo "<h3 class='card' >Acceso denegado. No se ha proporcionado un Token JWT.</h3>" . "<br/>";
  }


  require("./html_modules/footer.php");
  ?>

</body>

</html>
