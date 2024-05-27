<!DOCTYPE html>
<html>

<head>
  <meta charset="utf8" />
  <meta name="author" content="DMA" />
  <meta name="description" content="LISTA ALQUILERES" />
  <meta name="keywords" content="cursos, formación, desarrollo software" />
  <title>LISTA ALQUILERES</title>
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
  session_start();

  // Cabecera y nav
  require_once("./html_modules/header.php");
  require_once("./html_modules/nav.php");

  // Incluir funciones
  require_once("./functions/authentication.php");

  // Cargo archivos de las clases
  require_once("./classes/BaseDatos.php");
  require_once("./classes/BaseDatosUsuario.php");

  // Llamo a las clases
  // Primer  elemento es el namespace
  // Segundo elemento es la clase 
  // Tercer  elemento el pseudonimo de la clase
  use BaseDatos\BaseDatos as BD;
  use BaseDatosUsuario\BaseDatosUsuario;

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
      // $cnx = new BD("localhost", "root", "mysql", "gameclub");
      $cnx = new BD("localhost", "root", "", "gameclub");
      $idUsuario = BaseDatosUsuario::mostrarIdUsuario($_SESSION['usuario']);

      // Creo las sentencias SQL y uso un LEFT JOIN para que me devuelva todos los registros de la tabla videojuegos para que me devuelva el mismo número de registros en todas las consultas (aunque estén vacíos). De esta forma evito errores
      // Además, hago que la búsqueda se relacione con el cliente logueado a través de la información guardada en el token JWT y la variable de sesión
      $sqlQuery = "SELECT * FROM alquileres WHERE id_usuario = $idUsuario ORDER BY alquileres.id";
      $sqlQueryAlquileresCliente = "SELECT nombre, apellido1 FROM alquileres LEFT JOIN usuarios ON alquileres.id_usuario = usuarios.id WHERE id_usuario = $idUsuario ORDER BY alquileres.id";
      $sqlQueryAlquileresVideojuegos = "SELECT nombre FROM alquileres LEFT JOIN videojuegos ON alquileres.id_videojuego = videojuegos.id WHERE id_usuario = $idUsuario ORDER BY alquileres.id";
      // $sqlQueryAlquileresTarifas = "SELECT tipo FROM alquileres LEFT JOIN tarifas ON alquileres.id_tarifas = tarifas.id WHERE id_usuario = $idUsuario ORDER BY tarifas.id";
      $sqlQueryAlquileresEmpleados = "SELECT empleados.nombre, empleados.apellido1, empleados.apellido2 FROM alquileres LEFT JOIN empleados ON alquileres.id_empleado = empleados.id WHERE alquileres.id_usuario = $idUsuario ORDER BY alquileres.id DESC";
      $sqlQueryAlquileresMetodoPago = "SELECT metodospago.metodo FROM alquileres LEFT JOIN metodospago ON alquileres.id_metodoPago = metodospago.id WHERE alquileres.id_usuario = $idUsuario ORDER BY alquileres.id DESC";

      // Creo array
      $registrosAlquileres = $cnx->myQueryMultiple($sqlQuery, false); //=> Devuelve un array con índices
      // Creo una matrices de registros
      $registrosAlquileresClientes = $cnx->myQueryMultiple($sqlQueryAlquileresCliente); //=> Devuelve una matriz asociativa
      $registrosAlquileresVideojuegos = $cnx->myQueryMultiple($sqlQueryAlquileresVideojuegos); //=> Devuelve una matriz asociativa
      // $registrosAlquileresTarifas = $cnx->myQueryMultiple($sqlQueryAlquileresTarifas); //=> Devuelve una matriz asociativa
      $registrosAlquileresEmpleados = $cnx->myQueryMultiple($sqlQueryAlquileresEmpleados); //=> Devuelve una matriz asociativa
      $registrosAlquileresMetodoPago = $cnx->myQueryMultiple($sqlQueryAlquileresMetodoPago); //=> Devuelve una matriz asociativa

      /* 
        <table> (esta será una parte fija)
          <tr>   <th></th>   <th></th>   <th></th>   </tr> (esta será una parte fija)

          <tr>   <td></td>   <td></td>   <td></td>   </tr>
          <tr>   <td></td>   <td></td>   <td></td>   </tr>
          <tr>   <td></td>   <td></td>   <td></td>   </tr>
          <tr>   <td></td>   <td></td>   <td></td>   </tr>

        </table> (esta será una parte fija)
      */

      echo "<table>";
      echo "<tr>   <th>ID</th>   <th>Fecha Alquiler</th>   <th>Nombre Cliente</th>   <th>Videojuego</th>   "./* "<th>Tarifa</th>" */"   <th>Fecha Devolución</th>   <th>Empleado</th>   <th>Método de Pago</th>   </tr>";

      foreach ($registrosAlquileres as $key => $value) {
        echo "<tr>" .
          "<td>" . $value[0] . "</td>" .
          "<td>" . $value[1] . "</td>" .

          "<td>" . $registrosAlquileresClientes[$key]['nombre'] . " " .
          $registrosAlquileresClientes[$key]['apellido1'] . "</td>" .

          "<td>" . $registrosAlquileresVideojuegos[$key]['nombre'] . "</td>" .
          // "<td>" . $registrosAlquileresTarifas[$key]['tipo'] . "</td>" .
          "<td>" . $value[4] . "</td>" .

          "<td>" . $registrosAlquileresEmpleados[$key]['nombre'] . " " .
          $registrosAlquileresEmpleados[$key]['apellido1'] . "</td>" .

          "<td>" . $registrosAlquileresMetodoPago[$key]['metodo'] . "</td>" .
          "</tr>";
      }

      echo "</table>";
    }
  } else {
    http_response_code(401); // No autorizado
    echo "<h3 class='card' >Acceso denegado. No se ha proporcionado un Token JWT.</h3>" . "<br/>";
  }

  require("./html_modules/footer.php");
  ?>

</body>

</html>
