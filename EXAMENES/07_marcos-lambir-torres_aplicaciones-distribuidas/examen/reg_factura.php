<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8" />
    <meta name="author" content="DMA" />
    <meta name="description" content="" />
    <meta name="keywords" content="cursos, formación, desarrollo software" />
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
    use GuzzleHttp\Client;

    $dotenv = Dotenv\Dotenv::createImmutable("./");
    $dotenv->load();

    if (isset($_COOKIE['jwt'])) {


        if (estadoAcceso($_COOKIE['jwt'], $_ENV['SIGNATURE_KEY'], $_ENV['CIPHER_KEY'])) {


            //EL CONTENIDO DE MI PÁGINA IRIA DENTRO DE ESTE IF  
            //INICIA AQUI

            // * Tomo la info enviada por el formulario
            if (isset($_POST['pedido'])) {

                // * Conexión a la base de datos
                $cnx = new Db("localhost", "root", "", "restaurante");
                $idUsuario = intval(Usuario::mostrarIdUsuario($_SESSION['usuario']));
                $now = new DateTime();
                $fecha = $now->format('Y-m-d  H:i:s');
                $sentencia = "INSERT INTO pedidos ( usuario_id, fecha, estado) VALUES ($idUsuario,'$fecha','En proceso')";
                $cnx->execute($sentencia);
                $sentenciaUltimoPedido = "SELECT id FROM pedidos WHERE pedidos.usuario_id = $idUsuario AND pedidos.estado = 'En proceso' ORDER BY pedidos.fecha DESC LIMIT 1 ";
                $regUltimoPedido = $cnx->myQuerySimple($sentenciaUltimoPedido);
                $idPedido = intval($regUltimoPedido['id']);

                $nameProducto = "";
                $descripcionProducto = "";
                $valueProducto = floatval(0.00);

                foreach ($_POST as $key => $value) {
                    if ($key != 'pedido') {
                        $sentenciaproducto = "SELECT * FROM productos WHERE productos.id = $key ";
                        $producto = $cnx->myQuerySimple($sentenciaproducto);
                        $precioProducto = floatval($producto['precio']); //al parsearlo a float, podrian perderse los decimales
                        $sentenciaDetalle = "INSERT INTO detallespedido ( pedido_id, producto_id, cantidad, precio) VALUES ($idPedido,$key,1,$precioProducto)";
                        $cnx->execute($sentenciaDetalle);

                        // Para PayPal
                        $nameProducto = $producto['nombre'];
                        $descripcionProducto = $producto['descripcion'];
                        $valueProducto += $precioProducto;

                        // Al estar dentro del foreach generará un item por cada iteración
                        $objForArrItems = '
                        {
                            "name": "' . $nameProducto . '",
                            "description": "' . $descripcionProducto . '",
                            "quantity": "1",
                            "unit_amount": {
                                "currency_code": "EUR",
                                "value": "' . strval($valueProducto) . '"
                            },
                            "unit_of_measure": "QUANTITY"
                        }';

                        // Para hacerlo explícito y correctamente, se debe separar cada objeto JSON con un coma final y después quitársela en el último obj JSON
                        /* 
                        $objForArrItems = $objForArrItems . '
                                {
                                    "name": "' . $nameProducto . '",
                                    "description": "' . $descripcionProducto . '",
                                    "quantity": "1",
                                    "unit_amount": {
                                        "currency_code": "EUR",
                                        "value": "' . strval($valueProducto) . '"
                                    },
                                    "unit_of_measure": "QUANTITY"
                                },';
                        */
                    }
                }
                // $objForArrItems = substr($objForArrItems, 0, -1); // Quito la última coma del obj JSON

                // * Ahora envío la factura a través de la API paypal
                $URL_invoice = "https://api-m.sandbox.paypal.com/v2/invoicing/invoices";
                $client = new Client();

                $access_token = $_COOKIE['token'];
                $n_factura = "#" . rand(1, 10000);
                $fecha = $now->format('Y-m-d');
                $infoUsuario = Usuario::mostrarUsuario($_SESSION['usuario']);
                $nickname = $infoUsuario['nickname'];
                $email = $infoUsuario['email'];
                $telefono = $infoUsuario['telefono'];
                $direccion = $infoUsuario['direccion'];

                $headers = [
                    'Content-Type' => 'application/json', // Al utilizar `json` hay que pasar la información en formato JSON a través del body
                    'Authorization' => "Bearer " . $access_token
                ];

                $body =
                    '{
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
                    "items": [' . $objForArrItems . ']
                }';

                $options = [
                    'headers' => $headers,
                    'body' => $body
                ];

                $res = $client->request('POST', $URL_invoice, $options);

                $data = json_decode($res->getBody());

                // var_dump($data);

                // var_dump($data['href']);
                // ["href"]=> string(77) "https://api.sandbox.paypal.com/v2/invoicing/invoices/INV2-T9NB-ZNJC-DZT3-2XRH"
                $longInicial = strlen($data->{'href'}) - 24;
                $longFinal = strlen($data->{'href'});
                $idInvoice = substr($data->{'href'}, $longInicial, $longFinal);
                // var_dump($idInvoice);

                echo "<h2 class='ok' >Pedido realizado</h2>";
                echo "<br/>";
            }

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
