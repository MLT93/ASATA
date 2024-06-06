<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8" />
    <meta name="author" content="DMA" />
    <meta name="description" content="" />
    <meta name="keywords" content="cursos, formación, desarrollo software" />
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
    use GuzzleHttp\Client;

    $dotenv = Dotenv\Dotenv::createImmutable("./");
    $dotenv->load();

    if (isset($_COOKIE['jwt'])) {


        if (estadoAcceso($_COOKIE['jwt'], $_ENV['SIGNATURE_KEY'], $_ENV['CIPHER_KEY'])) {


            //EL CONTENIDO DE MI PÁGINA IRIA DENTRO DE ESTE IF  
            //INICIA AQUI


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

            echo "<table>";
            echo "<tr>   <th>ID</th>   <th>FECHA</th>   <th>Nº FACTURA</th>   <th>STATUS</th>   <th>TOTAL</th>   <th>MONEDA</th>   <th>EMISOR EMAIL</th>   <th>DESTINATARIO</th>   </tr>";
            foreach ($items as $key => $value) {

                $infoUsuario = Usuario::mostrarUsuario($_SESSION['usuario']);
                $emailUsuario = $infoUsuario['email'];

                $email_address = [];
                $emailEmisorFactura = "";
                isset($value->{'invoicer'}) ? array_push($email_address, $value->{'invoicer'}) : null;
                foreach ($email_address as $key => $value2) {

                    $element = $value2->{'email_address'};

                    if ($element = "contacto@restaurantefamily.com") {
                        $emailEmisorFactura = $element;
                    }
                }
                // var_dump($emailEmisorFactura);

                $primaryRecipients = [];
                isset($value->{'primary_recipients'}) ? $primaryRecipients = $value->{'primary_recipients'} : null;
                $emailDestinatarioFactura = "";
                foreach ($primaryRecipients as $key => $value3) {
                    $element = $value3->{'billing_info'}->{'email_address'};

                    if ($element = $emailUsuario) {
                        $emailDestinatarioFactura = $element;
                    }
                }
                // var_dump($emailDestinatarioFactura);

                // Si no existe el dato en la database y es null, enviamos un mensaje diciendo que no existe ese dato
                $errMsg = "NO DATA";

                echo "<tr>   
                    <td>" . $value->{'id'} . "</td>   
                    <td>" . $value->{'detail'}->{'invoice_date'} . "</td>   
                    <td>" . $value->{'detail'}->{'invoice_number'} . "</td>   
                    <td>" . $value->{'status'} . "</td>   
                    <td>" . $value->{'amount'}->{'value'} . "</td>   
                    <td>" . $value->{'amount'}->{'currency_code'} . "</td>   
                    <td>" . (isset($emailEmisorFactura) && $emailEmisorFactura != null ? $emailEmisorFactura : $errMsg) . "</td>   
                    <td>" . (isset($emailDestinatarioFactura) && $emailDestinatarioFactura != null ? $emailDestinatarioFactura : $errMsg) . "</td>   </tr>";
            }
            echo "</table>";


            //TERMINA AQUI

        }
    } else {
        http_response_code(401); //No autorizado.
        echo "<h2 class='card' >Acceso denegado. No se ha proporcionado un Token.</h2>";
        echo "<br/>";
    }


    ?>

</body>

</html>
