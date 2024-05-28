<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8" />
    <meta name="author" content="DMA" />
    <meta name="description" content="" />
    <meta name="keywords" content="cursos, formación, desarrollo software" />
    <title>NUEVO PEDIDO</title>
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

            require_once("./html_modules/form_newpedido.php");

            if (isset($_POST['newpedido'])) {
                // id usuario (hay que utilizar el que está con la sesión iniciada)
                // fecha del pedido (se hace con la fecha actual, no hace falta mostrarla al cliente)
                // necesito mostrar productos y su precio
                // Acumular pedidos y mostrar el total del pedido

                // var_dump($_POST) . "<br/>";

                $idProducto = intval($_POST['producto']);
                // echo $idProducto . "<br/>";
                $fechaPedido = date("Y-m-d_H:i:s", intval(strtotime("now")));
                $arrUsuario = Usuario::mostrarUsuario($_SESSION['usuario']); //=> asociativo
                $idUsuario = intval($arrUsuario['id']);
                // echo $idUsuario . "<br/>";
                $consultaSQL1 = "SELECT * FROM productos, detallespedido WHERE productos.id = $idProducto;";
                $arrConsulta1 = $cnx->myQuerySimple($consultaSQL1);
                $precio = floatval($arrConsulta1['precio']);
                // var_dump($arrConsulta1);

                $camposDB1 = ["id_usuario", "fechaPedido", "total"]; // faltaría realizar el total de forma correcta, utilizando inputs en el formulario para poder seleccionar más productos. Pero así está bien :D
                $dataDB1 = [$idUsuario, $fechaPedido, $precio];
                $cnx->insertSingleRegister("pedidos", $camposDB1, $dataDB1);

                $camposDB2 = ["id_pedido", "id_producto"];
                $dataDB2 = [$idUsuario, $idProducto];
                $cnx->insertSingleRegister("detallespedido", $camposDB2, $dataDB2);

                                /* 
                ? Otra forma de hacerlo (con checkbox en el formulario para seleccionar varios productos):
                * Realizar la iteración de todos los checkbox seleccionados (provenientes del formulario):
                foreach ($_POST as $key => $value) {
                    * Quito el input type="submit" de lo que me llega del formulario 
                    if ($key != 'newpedido') {
                        * Genera un nuevo pedido:
                        $consultaSQL = "SELECT precio FROM productos WHERE productos.id = $idProducto;";
                        $arrConsulta = $cnx->myQuerySimple($consultaSQL);
                        $precio = floatval($arrConsulta['precio']);
                        $total += $precio;
                        $idProducto = intval($_POST['producto']);
                        $fechaPedido = date("Y-m-d_H:i:s", intval(strtotime("now")));
                        $arrUsuario = Usuario::mostrarUsuario($_SESSION['usuario']); //=> asociativo
                        $idUsuario = intval($arrUsuario['id']);
                        $sentencia = "INSERT INTO pedidos (usuario_id, fecha, total) VALUE ($idUsuario, '$fechaPedido', $total);";
                        $registro = $cnx->execute($sentencia);
                        * Ver cuál es el último pedido del usuario:
                        $sentenciaUltimoPedido = "SELECT id FROM pedidos WHERE pedidos.usuario_id = $idUsuario ORDER BY pedidos.fecha DESC LIMIT 0,1;";
                        $arrUltimoPedido = $cnx->myQuerySimple($sentenciaUltimoPedido);
                        $idPedido = $arrUltimoPedido['id'];
                        * Actualiza los detalles de los pedidos después de realizar el nuevo pedido
                        $sentenciaDetalle = "INSERT INTO detallespedido (id_pedido, id_producto) VALUES ($idPedido, $idProducto);";
                        $arrDetalle = $cnx->execute($sentenciaDetalle);
                    }
                }
                echo "<h2 class='ok'>Pedido realizado</h2>" . "<br/>";
                */
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
