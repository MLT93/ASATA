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

    use UserDB\Usuario as Usuario;
    use Database\Db as Db;

    // Esto lo cargo para utilizar las variables de entorno en el archivo `.env`
    // Es necesario el `autoload` del `vendor` para cargar y encontrar estos paquetes. También se puede cargar el directorio en otro archivo e importar este en él
    // La función estática en el namespace `Dotenv` recibe 1 parámetro
    // 1 El directorio donde encontrar el archivo `.env`. No hace falta poner el nombre del archivo oculto, solo ponemos el directorio donde está porque lo busca automáticamente
    require_once("../vendor/autoload.php");

    use Dotenv\Dotenv as Dotenv;

    $dotenv = Dotenv::createImmutable("./"); // Busco el directorio del archivo `.env`
    $dotenv->load();


    if (isset($_COOKIE['jwt'])) {

        if (estadoAcceso($_COOKIE['jwt'], $_ENV['SIGNATURE_KEY'], $_ENV['CIPHER_KEY'])) {


            //EL CONTENIDO DE MI PÁGINA IRIA DENTRO DE ESTE IF  
            //INICIA AQUI
            require_once("./html_modules/form_updateVideojuego.php");

            if (isset($_REQUEST['actualizar_videojuego'])) {

                //aqui tengo el id y el nombre que viene del formulario que hay en 
                //form_updateVideojuego.php
                $idVideojuego = $_REQUEST['videojuegoId'];
                $nameVideojuego = $_REQUEST['videojuegoName'];
                $descripcionVideojuego = $_REQUEST['videojuegoDescripcion'];
                $idGenero = intval($_REQUEST['genero']);
                $idDesarrollador = intval($_REQUEST['desarrollador']);
                $idPlataforma = intval($_REQUEST['plataforma']);
                $idPegui = intval($_REQUEST['pegui']);
                $fechaPub = $_REQUEST['fechaPub'];
                $isocode = $_REQUEST['isocode'];

                $nameVideojuegoLimpio = limpiarCadena($nameVideojuego);
                $nameVideojuegoLimpio = substr($nameVideojuegoLimpio, 0, 35);

                //aqui comprueb que la imagen se ha cargado correctamente
                if (isset($_FILES['imagen'])  && $_FILES['imagen']['error'] == 0) {

                    $fileName = $_FILES['imagen']['name'];
                    $fileName = limpiarCadena($fileName);

                    $fileExtension = $_FILES['imagen']['type'];
                    $fileExtension = substr($fileExtension, 6);


                    $rutaOrigen = $_FILES['imagen']['tmp_name'];
                    $rutaDestino = "./repo/img/videogames/" . $nameVideojuegoLimpio . "_" . date("Y.m.d.His") . "." . $fileExtension;

                    //aqui ya tengo la imagen guardada en el servidor con el nombre adecuado y en la carpeta adecuada
                    redimensionarImagen($rutaOrigen, $rutaDestino, 50, 50);
                    //aqui actualizo esa información en la BD
                    $sentenciaSQL = "UPDATE videojuegos SET 
                videojuegos.nombre = '$nameVideojuego', 
                videojuegos.descripcion = '$descripcionVideojuego', 
                videojuegos.id_genero = $idGenero,
                videojuegos.id_desarrollador = $idDesarrollador,
                videojuegos.id_plataforma = $idPlataforma,
                videojuegos.id_pegui = $idPegui,
                videojuegos.fechaPublicacion = '$fechaPub',
                videojuegos.isoCode = '$isocode', 
                videojuegos.imagen = '$rutaDestino' 
                WHERE videojuegos.id = $idVideojuego";

                    $cnx = new Db("localhost", "root", "", "gameclub");
                    $cnx->execute($sentenciaSQL);
                    header("Location: lista_videojuegos.php");

                    //es el caso en el que no estoy subiendo ningun archivo
                } elseif (isset($_FILES['imagen'])  && $_FILES['imagen']['error'] == 4) {

                    $sentenciaSQL = "UPDATE videojuegos SET 
                videojuegos.nombre = '$nameVideojuego', 
                videojuegos.descripcion = '$descripcionVideojuego', 
                videojuegos.id_genero = $idGenero,
                videojuegos.id_desarrollador = $idDesarrollador,
                videojuegos.id_plataforma = $idPlataforma,
                videojuegos.id_pegui = $idPegui,
                videojuegos.fechaPublicacion = '$fechaPub',
                videojuegos.isoCode = '$isocode'
                WHERE videojuegos.id = $idVideojuego";

                    $cnx = new Db("localhost", "root", "", "gameclub");
                    $cnx->execute($sentenciaSQL);
                    header("Location: lista_videojuegos.php");
                } else {
                    echo "<h2 class='card'>La imagen no se ha cargado correctamente.</h2>";
                }
            }
            //TERMINA AQUI

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
