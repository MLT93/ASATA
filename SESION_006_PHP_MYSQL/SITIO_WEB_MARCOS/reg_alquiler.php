<!DOCTYPE html>
<html>

<head>
  <meta charset="utf8" />
  <meta name="author" content="DMA" />
  <meta name="description" content="REGISTRO ALQUILER" />
  <meta name="keywords" content="cursos, formación, desarrollo software" />
  <title>REG ALQUILER</title>
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

  $dotenv = Dotenv::createImmutable("./");
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
      require_once("./html_modules/form_alquiler.php");

      // REGISTRO ALQUILER
      if (isset($_POST["enviarAlquiler"])) {

        // Variables formulario
        $idVideojuego = intval($_POST["idVideojuego"]);
        $idTarifa = intval($_POST["idTarifa"]);
        $idMetodoPago = intval($_POST["idMetodoPago"]);

        // Fechas de alquileres en timestamp
        // Si el ID tarifa es 1 (standard) la devolución será en 2 días desde el alquiler
        // De lo contrario, será en 5 días
        $fechaAlquiler = date("Y-m-d", intval(strtotime("now")));
        $fechaDevo = "";
        if ($idTarifa == 1) {
          $fechaDevo = date("Y-m-d", intval(strtotime($fechaAlquiler . "+2 days")));
        } else {
          $fechaDevo = date("Y-m-d", intval(strtotime($fechaAlquiler . "+5 days")));
        }

        // Tomo el ID del usuario que está logueado
        $idUsuario = Usuario::mostrarIdUsuario($_SESSION['usuario']);

        // Suponiendo que en cada día de la semana (del 1 al 7) trabaja un empleado, lo asignaré al alquiler realizado
        $idEmpleado = 0;
        $diaSemana = date('N'); //=> día de la semana (1 lunes, 7 domingo)
        switch ($diaSemana) {
          case 1:
            $idEmpleado = 5;
            break;
          case 2:
            $idEmpleado = 5;
            break;
          case 3:
            $idEmpleado = 5;
            break;
          case 4:
            $idEmpleado = 11;
            break;
          case 5:
            $idEmpleado = 11;
            break;
          case 6:
            $idEmpleado = 13;
            break;
          case 7:
            $idEmpleado = 13;
            break;
        }

        // Variables database
        $camposDB = ["fechaAlquiler", "id_usuario", "id_videojuego", "id_tarifas", "fechaDevolucion", "id_empleado", "id_metodoPago"];
        $registrosDB = [$fechaAlquiler, $idUsuario, $idVideojuego, $idTarifa, $fechaDevo, $idEmpleado, $idMetodoPago];

        // Escribo en la database
        $cnx->insertSingleRegister("alquileres", $camposDB, $registrosDB);

        $msgFooter = "Alquiler realizado con éxito"; //=> Conexión con el footer

        // Envío el cliente a otra página o la recargo
        header("Location: lista_alquileres.php");
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
