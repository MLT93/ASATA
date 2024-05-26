<!DOCTYPE html>
<html>

<head>
  <meta charset="utf8" />
  <meta name="author" content="DMA" />
  <meta name="description" content="ACTUALIZAR USUARIO" />
  <meta name="keywords" content="cursos, formación, desarrollo software" />
  <title>ACTUALIZAR USUARIO</title>
  <link rel="stylesheet" href="./css/estilos.css">

  <!-- esta 4 etiquetas evitan que trabaje con los archivos js y css en caché -->
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
  session_start();

  // HTML
  require_once("./html_modules/header.php");
  require_once("./html_modules/nav.php");

  // Añado los archivos de las clases
  require_once("./classes/BaseDatos.php");
  require_once("./classes/BaseDatosUsuario.php");

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

  use BaseDatosUsuario\BaseDatosUsuario as Usuario;

  $dotenv = Dotenv\Dotenv::createImmutable("./");
  $dotenv->load();

  if (isset($_COOKIE['jwt'])) {

    if (estadoAcceso($_COOKIE['jwt'], $_ENV['SIGNATURE_KEY'], $_ENV['CIPHER_KEY'])) {


      // EL CONTENIDO DE MI PÁGINA IRÍA DENTRO DE ESTE IF  
      // INICIA AQUÍ
      require_once("./html_modules/form_updateUser.php");


      if (isset($_REQUEST['actualizarImg'])) {

        $infoUsuario = Usuario::mostrarUsuario($_SESSION['usuario']);

        $nombre = $infoUsuario['nombre'];
        $apellido1 = $infoUsuario['apellido1'];
        $email = $infoUsuario['email'];


        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {

          $fileName = $_FILES['imagen']['name'];
          $rutaOrigen   = $_FILES['imagen']['tmp_name'];
          $rutaDestino  = "./repo/img/users/" . $nombre . $apellido1 . "_" . date('Y.m.d.His') . "-" . $_FILES['imagen']['name'];

          redimensionarImagen($rutaOrigen, $rutaDestino, 50, 50);

          $sentenciaSQL = "UPDATE clientes SET clientes.imagen = '$rutaDestino' WHERE clientes.email = '$email'";

          $cnx = new BaseDatos("localhost", "root", "mysql", "gameclub");
          $cnx->execute($sentenciaSQL);

          header("Location: user_info.php");
        }
      }

      // TERMINA AQUÍ

    }
  } else {
    http_response_code(401); // No autorizado
    echo "<h2 class='card' >Acceso denegado. No se ha proporcionado un Token.</h2>";
    echo "<br/>";
  }
  require("./html_modules/footer.php");

  ?>

</body>

</html>
