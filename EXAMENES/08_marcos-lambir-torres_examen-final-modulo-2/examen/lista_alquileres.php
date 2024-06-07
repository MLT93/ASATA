<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8" />
    <meta name="author" content="DMA" />
    <meta name="description" content="" />
    <meta name="keywords" content="cursos, formación, desarrollo software" />
    <title>LISTA ALQUILERES</title>
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

    if (isset($_COOKIE['jwt'])) {


        if (estadoAcceso($_COOKIE['jwt'], $_ENV['SIGNATURE_KEY'], $_ENV['CIPHER_KEY'])) {


            //EL CONTENIDO DE MI PÁGINA IRIA DENTRO DE ESTE IF  
            //INICIA AQUI

            $cnx = new Db("localhost", "root", "", "concesionario");
            $idUsuario = Usuario::mostrarIdUsuario($_SESSION['usuario']);

            //creamos una sentencia SQL para hacer la consulta a mi base de datos

            $consultaSQL1 = "SELECT id, fecha FROM alquileres;";
            $consultaSQL2 =  "SELECT detallealquileres.cantidad, detallealquileres.subtotal FROM detallealquileres, alquileres WHERE ;";

            $arrAlquileres1 = $cnx->myQueryMultiple($consultaSQL1);
            $arrAlquileres2 = $cnx->myQueryMultiple($consultaSQL2);

            // var_dump($arrAlquileres1);
            var_dump($arrAlquileres2);

            echo "<div class='container_separator'>";
            echo "<table> 
                <tr>
                    <th>Nº PEDIDO</th> 
                    <th>FECHA</th> 
                    <th>PRODUCTO</th> 
                    <th>DIAS</th> 
                    <th>SUBTOTAL</th> 
                    <th>MONEDA</th> 
                </tr>";
            foreach ($arrAlquileres1 as $key => $value) {

                // var_dump($value);
    
                $msg = "No Data";

                echo "<tr>" .
                    "<td>" . $value['id'] . "</td>" .
                    "<td>" . $value['fecha'] . "</td>" .
                    "<td>" . (isset($key) && $key != null ? $arrAlquileres2[$key]['nombre'] : $msg) . "</td>" .
                    "<td>" . (isset($key) && $key != null ? $arrAlquileres2[$key]['cantidad'] : $msg) . "</td>" .
                    "<td>" . (isset($key) && $key != null ? $arrAlquileres2[$key]['subtotal'] : $msg) . "</td>" .
                    "<td>€</td>" .
                    "</tr>";
            }
            echo "</table>";
            echo "</div>";

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
