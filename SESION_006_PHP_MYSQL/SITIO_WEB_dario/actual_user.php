<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8" />
    <meta name="author" content="DMA" />
    <meta name="description" content="LOGIN " />
    <meta name="keywords" content="cursos, formación, desarrollo software" />
    <title>ACTUALIZAR USUARIO</title>
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


            //EL CONTENIDO DE MI PÁGINA IRIA DENTRO DE ESTE IF  
            //INICIA AQUI
            require_once("./html_modules/form_updateUser.php");


            if (isset($_REQUEST['actualizar'])) {

                $infoUsuario = Usuario::mostrarUsuario($_SESSION['usuario']);

                $nombre = $infoUsuario['nombre'];
                $apellido1 = $infoUsuario['apellido1'];
                $email = $infoUsuario['email'];

                $nombreCompleto = $nombre . $apellido1;
                $nombreCompleto = limpiarCadena($nombreCompleto);


                if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {

                    $fileName = $_FILES['imagen']['name'];
                    $fileName = limpiarCadena($fileName);
                    $rutaOrigen   = $_FILES['imagen']['tmp_name']; //esta es la ruta a la que sube el servidor la imagen al cargarla
                    $rutaDestino  = "./repo/img/users/" . $nombreCompleto . "_" . date('Y.m.d.His') . "-" . $fileName;

                    // copy($rutaOrigen,$rutaDestino);
                    redimensionarImagen($rutaOrigen, $rutaDestino, 50, 50);

                    $sentenciaSQL = "UPDATE usuarios SET usuarios.imagen = '$rutaDestino' WHERE usuarios.email = '$email'";

                    $cnx = new Db("localhost", "root", "", "gameclubdario");
                    $cnx->execute($sentenciaSQL);

                    header("Location: user_info.php");
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