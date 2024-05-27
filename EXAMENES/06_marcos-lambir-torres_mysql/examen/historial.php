<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8" />
    <meta name="author" content="DMA" />
    <meta name="description" content="" />
    <meta name="keywords" content="cursos, formación, desarrollo software" />
    <title>HISTORIAL PEDIDOS</title>
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

            $cnx = new Db("localhost", "root", "", "restaurante");

            // id usuario (hay que utilizar el que está con la sesión iniciada)
            // consulta con orden del último pedido hecho por el usuario
            // necesito mostrar un form con toda la lista correspondiente a la consulta

            $arrUsuario = Usuario::mostrarUsuario($_SESSION['usuario']); //=> asociativo
            $idUsuario = $arrUsuario['id'];

            $consultaSQL1 = "SELECT usuarios.id, pedidos.fechaPedido FROM usuarios, pedidos WHERE usuarios.id = $idUsuario ORDER BY pedidos.fechaPedido DESC;";


            $arrConsulta1 = $cnx->myQueryMultiple($consultaSQL1);


            echo "<table> 
            <tr>
            <th>ID</th> 
            <th>FECHA PEDIDO</th> 
            </tr>";
            foreach ($arrConsulta1 as $key => $value) {
                echo "<tr>" .
                    "<td>" . $arrConsulta1[$key]['id'] . "</td>" .
                    "<td>" . $arrConsulta1[$key]['fechaPedido'] . "</td>" .
                    "</tr>";
            }
            echo "</table>";
        }

        //TERMINA AQUI



    } else {
        http_response_code(401); //No autorizado.
        echo "<h2 class='card' >Acceso denegado. No se ha proporcionado un Token.</h2>";
        echo "<br/>";
    }


    ?>

</body>

</html>
