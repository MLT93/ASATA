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
    require_once("./classes/db.php");
    require_once("./classes/UsuarioDB.php");

    require_once("./functions/authentication.php");
    //incluir el autoloader del composer
    require_once("../vendor/autoload.php");

    use Database\Db as Db;
    use UserDB\Usuario as Usuario;
    use GuzzleHttp\Client;

    $dotenv = Dotenv\Dotenv::createImmutable("./");
    $dotenv->load();

    if (isset($_COOKIE['jwt'])) {


        if (estadoAcceso($_COOKIE['jwt'], $_ENV['SIGNATURE_KEY'], $_ENV['CIPHER_KEY'])) {


            //EL CONTENIDO DE MI PÁGINA IRIA DENTRO DE ESTE IF  
            //INICIA AQUI

            // * REGISTRAR datos del formulario
            if (isset($_POST['coches'])) {

                // Variables formulario
                $fecha = $_POST['fecha']; // Date
                $cantidadDias = $_POST['numDias']; // Number
                // var_dump($cantidadDias);
                $idProducto = 0; // Number

                $nameProducto = "";
                $descripcionProducto = "";
                $valueProducto = floatval(0.00);

                foreach ($_POST as $key => $value) {

                    if ($key != "coches" && $key != "fecha" && $key != "dias") {

                        $idProducto = intval($key);
                    }

                    $cnx = new Db("localhost", "root", "", "concesionario");
                    $sentenciaproducto = "SELECT * FROM productos WHERE productos.id = $key ";
                    $producto = $cnx->myQuerySimple($sentenciaproducto);
                    $precioProducto = floatval($producto['precio']); //al parsearlo a float, podrian perderse los decimales

                    $nameProducto = $producto['nombre'];
                    $descripcionProducto = $producto['descripcion'];
                    $valueProducto += $precioProducto;
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
                }

                // Variables del usuario que están dentro de las variables de sesión y se comprueba el usuario en la base de datos
                $idUsuario = intval(Usuario::mostrarIdUsuario($_SESSION['usuario']));
                $fechaDateTime = date("Y-m-d H:i:s", intval(strtotime("now"))); // Date Time
                // var_dump($fechaDateTime); //=> "2024-06-07 12:08:55"
                $estado = "En proceso";

                // * REGISTRO en mi base de datos
                // Conexión a la base de datos
                $cnx = new Db("localhost", "root", "", "concesionario");
                $sentenciaAlquileres = "INSERT INTO alquileres (usuario_id, fecha, estado) VALUES ($idUsuario,'$fechaDateTime','$estado')";
                $cnx->execute($sentenciaAlquileres);

                $senteciaInfoAlquileres =  "SELECT alquileres.id, productos.id, productos.precio FROM alquileres, productos WHERE alquileres.usuario_id = $idUsuario AND alquileres.estado = 'En proceso' ORDER BY alquileres.fecha DESC LIMIT 0, 1;";
                $arrAlquileres = $cnx->myQueryMultiple($senteciaInfoAlquileres, false); // Iterativa
                $idAlquiler;
                $idProducto;
                $precioSingular;

                foreach ($arrAlquileres as $key => $value) {
                    // print_r($value) . "<br/>";
                    $idAlquiler = intval($value[0]);
                    $idProducto = intval($value[1]);
                    $precioSingular = floatval($value[2]);
                }
                // var_dump($precioSingular);
                $total = $precioSingular * intval($cantidadDias);
                // echo $total;
                $fechaEntrega = substr($fechaDateTime, 0, 10);
                $fechaDevolucion = $fechaDateTime = date("Y-m-d", intval(strtotime($fecha, "+$cantidadDias"))); // Date Time
                // var_dump($fechaEntrega); //=> "2024-06-07"

                $sentenciaDetalleAlquileres = "INSERT INTO detallealquileres 
                (alquiler_id, producto_id, cantidad, subtotal, fechaEntrega, FechaDevolucion) VALUES 
                ($idAlquiler, $idProducto, $cantidadDias, $total, '$fechaEntrega', '$fechaDevolucion');";
                $cnx->execute($sentenciaDetalleAlquileres);

                // * Ahora envío la factura a través de la API paypal
                $URL_invoice = "https://api-m.sandbox.paypal.com/v2/invoicing/invoices";
                $client = new Client();

                $access_token = $_COOKIE['token'];
                $n_factura = "#" . rand(1, 10000);
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

                echo "<h2 class='ok' >Alquiler realizado</h2>";
                echo "<br/>";

                // header("Location: lista_alquileres.html");
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
