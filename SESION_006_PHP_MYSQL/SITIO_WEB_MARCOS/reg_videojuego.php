<!DOCTYPE html>
<html>

<head>
  <meta charset="utf8" />
  <meta name="author" content="DMA" />
  <meta name="description" content="REGISTRO VIDEOJUEGO" />
  <meta name="keywords" content="cursos, formación, desarrollo software" />
  <title>REG VIDEOJUEGO</title>
  <link rel="stylesheet" href="./css/estilos.css">

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
  require_once("./classes/BaseDatos.php");

  // Incluir funciones
  require_once("./functions/authentication.php");
  require_once("./functions/multimedia.php");

  // Llamo a las clases
  // Primer  elemento es el namespace
  // Segundo elemento es la clase 
  // Tercer  elemento el pseudonimo de la clase
  use BaseDatos\BaseDatos;

  // Esto lo cargo para utilizar las variables de entorno en el archivo `.env`
  // Es necesario el `autoload` del `vendor` para cargar y encontrar estos paquetes. También se puede cargar el directorio en otro archivo e importar este en él
  // La función estática en el namespace `Dotenv` recibe 1 parámetro
  // 1 El directorio donde encontrar el archivo `.env`. No hace falta poner el nombre del archivo oculto, solo ponemos el directorio donde está porque lo busca automáticamente
  require_once("../vendor/autoload.php");

  use Dotenv\Dotenv;

  $dotenv = Dotenv::createImmutable("./"); // Busco el directorio del archivo `.env`
  $dotenv->load();

  // Compruebo la existencia de credenciales en el la cookie del token JWT y si coincide con la información del usuario en la variable de sesión `PHPSESSID` 
  if ($_COOKIE['jwt']) {

    $jwt = $_COOKIE['jwt'];
    $secretKey = $_ENV['SIGNATURE_KEY'];
    $cipherKey = $_ENV['CIPHER_KEY'];
    if (estadoAcceso($jwt, $secretKey, $cipherKey)) {

      // Conexión a la base de datos
      // $cnx = new BaseDatos("localhost", "root", "mysql", "gameclub");
      $cnx = new BaseDatos("localhost", "root", "", "gameclub");

      // Cargo el formulario después de realizar la conexión a la base de datos para que el código PHP que se ejecuta en el formulario funcione
      require_once("./html_modules/form_videojuego.php");

      // REGISTRO VIDEOJUEGO
      if (isset($_POST["enviarVideojuego"])) {

        // Variables formulario
        $nombreGame = $_POST["nombreGame"];
        $descripcion = $_POST["descripcion"];
        $idGenero = $_POST["idGenero"];
        $idDesarrollador = $_POST["idDesarrollador"];
        $idPlataforma = $_POST["idPlataforma"];
        $idPegui = $_POST["idPegui"];
        $fechaPub = $_POST["fechaPub"];
        $isoCode = $_POST["isoCode"];
        $img = $_FILES["img"];

        // Compruebo que la imagen se ha cargado correctamente
        if (isset($_FILES["img"]) && $img['error'] > 0) {
          echo "<h3 class='card'>Ha habido un error durante la carga</h3>" . "<br/>";
        } else {
          $fileName = $img['name'];
          // $size = $img['size']; //=> Esto sirve si queremos que el usuario nos de unas dimensiones particulares al subir el archivo. Lo haríamos a través de un condicional
          $rutaOrigen   = $img['tmp_name'];
          $rutaDestino  = "./repo/img/videogames/" . $nombreGame . $genero . "_" . date('Y.m.d.His') . "-" . $_FILES['imagen']['name'];

          redimensionarImagen($rutaOrigen, $rutaDestino, 50, 50);
          // Copio desde el archivo temporal al de destino
          // copy($rutaOrigen, $rutaDestino);

          // Variables database
          $camposDB = ['nombre', 'descripcion', 'id_genero', 'id_desarrollador', 'id_plataforma', 'id_pegui', 'fechaPublicacion', 'isoCode', 'imagen'];
          $dataDB = [$nombreGame, $descripcion, $idGenero, $idDesarrollador, $idPlataforma, $idPegui, $fechaPub, $isoCode, $img];

          // Escribo en la database
          $cnx->insertSingleRegister("videojuegos", $camposDB, $dataDB);

          $msgFooter = "Videojuego subido con éxito"; //=> Conexión con el footer

          // Envío el cliente a otra página o la recargo
          header("Location: lista_videojuegos.php");
        }
      }
    }
  } else {
    http_response_code(401); // No autorizado
    echo "<h3 class='card' >Acceso denegado. No se ha proporcionado un Token JWT.</h3>" . "<br/>";
  }

  require("./html_modules/footer.php");
  ?>

</body>

</html>
