<!DOCTYPE html>
<html>

<head>
  <meta charset="utf8" />
  <meta name="author" content="DMA" />
  <meta name="description" content="REGISTRO VALORACIÓN" />
  <meta name="keywords" content="cursos, formación, desarrollo software" />
  <title>REG VALORACIÓN</title>
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
  require_once("./classes/BaseDatosUsuario.php");

  // Incluir funciones
  require_once("./functions/authentication.php");

  // Llamo a las clases
  // Primer  elemento es el namespace
  // Segundo elemento es la clase 
  // Tercer  elemento el pseudonimo de la clase
  use BaseDatos\BaseDatos;
  use BaseDatosUsuario\BaseDatosUsuario as Usuario;

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
      require_once("./html_modules/form_valoracion.php");

      // REGISTRO ALQUILER
      if (isset($_POST["enviarValoracion"])) {

        // Variables formulario
        $valoracion = intval($_POST["valoracion"]);

        // Tomo el último alquiler realizado por el usuario logueado para poderlo valorar
        $idUsuario = Usuario::mostrarIdUsuario($_SESSION['usuario']);
        $sqlQuery = "SELECT alquileres.id, videojuegos.nombre FROM alquileres INNER JOIN videojuegos ON alquileres.id_videojuego = videojuegos.id WHERE alquileres.id_cliente = $idUsuario ORDER BY alquileres.id DESC LIMIT 0, 1";
        $ultimoAlquiler = $cnx->myQuerySimple($sqlQuery); //=> Devuelve un array asociativo
        $idUltimoAlquiler = $ultimoAlquiler['id'];

        // Realizo una comprobación para ver si existen valoraciones previas para el mismo juego
        $sentenciaSQL = "SELECT COUNT(*) FROM valoraciones WHERE valoraciones.id_alquiler = $idUltimoAlquiler";
        $existeValoracion = $cnx->myQuerySimple($sentenciaSQL); //=> Devuelve un array asociativo
        if ($existeValoracion["COUNT(*)"] > 0) { //=> Devuelve la cantidad de valoraciones realizadas por el usuario en ese mismo juego

          echo "<h3 class='card'>Ya existe una valoración para este juego</h3>";
        } else {

          // Variables database
          $camposDB = ["valoracion", "id_alquiler"];
          $registrosDB = [$valoracion, $idUltimoAlquiler];

          // Escribo en la database
          $cnx->insertSingleRegister("valoraciones", $camposDB, $registrosDB);

          $msgFooter = "Valoración realizada con éxito"; //=> Conexión con el footer

          // Envío el cliente a otra página o la recargo
          header("Location: lista_valoraciones.php");
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
