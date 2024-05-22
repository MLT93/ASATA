<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8" />
    <meta name="author" content="DMA" />
    <meta name="description" content="LOGIN " />
    <meta name="keywords" content="cursos, formación, desarrollo software" />
    <title>ACTUALIZAR VIDEOJUEGO</title>
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
    require_once("./functions/multimedia.php");
    //incluir el autoloader del composer
    require_once("../vendor/autoload.php");

    use UserDB\Usuario as Usuario;
    use Database\Db as Db;
    use Dotenv\Dotenv as Dotenv;

    //la clase dotenv me permite usar las variables de entorno que tengo en el archivo ".env";
    // el parametro de createInmutable es la ruta que me lleva al archivo ".env".
    $dotenv = Dotenv::createImmutable("./");
    $dotenv->load();


    if (isset($_COOKIE['jwt'])) {

        if (estadoAcceso($_COOKIE['jwt'], $_ENV['SIGNATURE_KEY'], $_ENV['CIPHER_KEY'])) {


            //EL CONTENIDO DE MI PÁGINA IRÍA DENTRO DE ESTE IF  
            //INICIA AQUÍ

            // PARTE 2: importo formulario con información oculta al cliente
            require_once("./html_modules/form_updateVideojuego.php");

            if (isset($_POST['actualizar_videojuego'])) {

                // PARTE 3: proceso la info enviada desde el formulario `form_updateVideojuego`
                $idVideojuego = $_POST['videojuegoId'];
                $nameVideojuego = $_POST['videojuegoName'];
                $descripcionVideojuego = $_POST['videojuegoDescripcion'];
                $isoCodeVideojuego = $_POST['videojuegoIsoCode'];
                $fechaPubVideojuego = $_POST['videojuegoFechaPub'];
                $idGenero = intval($_POST['genero']);
                $idDesarrollador = intval($_POST['desarrollador']);
                $idPlataforma = intval($_POST['plataforma']);
                $idPegui = intval($_POST['pegui']);

                $nameVideojuego = limpiarCadena($nameVideojuego);
                // $nameVideojuego = substr($nameVideojuego, 0, strlen($nameVideojuego) -1); // Me da la longitud total del nombre del archivo
                $nameVideojuego = substr($nameVideojuego, 0, 35); // Me da la longitud de 35 caracteres

                //aquí compruebo que la imagen se ha cargado correctamente
                if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {

                    //proceso la imagen para recibir y copiar
                    $fileName = $_FILES['imagen']['name'];
                    $fileName = limpiarCadena($fileName);
                    $typeImg = $_FILES['imagen']['type']; //esto devolverá siempre `image/<la_extensión_de_imagen>`. Entonces lo corto y obtengo solo la extensión
                    $fileExtension = substr($typeImg, 6);
                    echo "$fileExtension";

                    $rutaOrigen = $_FILES['imagen']['tmp_name'];
                    $rutaDestino = "./repo/img/videogames/" . $nameVideojuego . "_" . date("Y.m.d.His") . "." . $fileExtension;

                    //copiar imagen formateada sin acentos
                    redimensionarImagen($rutaOrigen, $rutaDestino, 50, 50);

                    //actualizar BD
                    $sentenciaSQL = "UPDATE videojuegos SET imagen = '$rutaDestino', descripcion = '$descripcionVideojuego', nombre = '$nameVideojuego', fechaPublicacion = '$fechaPubVideojuego', isoCode = '$isoCodeVideojuego', id_genero = '$idGenero', id_desarrollador = '$idDesarrollador', id_plataforma = '$idPlataforma', id_pegui = '$idPegui' WHERE id = '$idVideojuego'";

                    $cnx = new Db("localhost", "root", "", "gameclubdario");
                    $cnx->execute($sentenciaSQL);

                    //reenvío el cliente a otra PÁGINA
                    header("Location: lista_videojuegos.php");
                } else {
                    echo "<h2 class='card'>La imagen no se ha cargado correctamente.</h2>";
                }
            }
            //TERMINA AQUÍ

        }
    } else {
        http_response_code(401); //No autorizado.
        echo "<h2 class='card' >Acceso denegado. No se ha proporcionado un Token.</h2>";
        echo "<br/>";
    }
    require("./html_modules/footer.php");

    ?>

</body>

</html>
