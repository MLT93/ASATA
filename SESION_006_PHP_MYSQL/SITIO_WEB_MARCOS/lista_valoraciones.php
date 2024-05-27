<!DOCTYPE html>
<html>

<head>
  <meta charset="utf8" />
  <meta name="author" content="DMA" />
  <meta name="description" content="LISTA VALORACIONES" />
  <meta name="keywords" content="cursos, formación, desarrollo software" />
  <title>LISTA VALORACIONES</title>
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
      $sqlQueryValoracionesDevolucion = "SELECT fechaDevolucion FROM alquileres LEFT JOIN valoraciones ON alquileres.id_usuario = valoraciones.id_alquiler WHERE id_usuario = $idUsuario ORDER BY alquileres.id";

      /* Nombre videojuego relacionado con alquileres: (SELECT videojuegos.nombre FROM alquileres LEFT JOIN videojuegos ON alquileres.id_videojuego = videojuegos.id WHERE id_usuario = $idUsuario ORDER BY alquileres.id;)
      Tabla filtrada por el usuario en relación con las valoraciones (SELECT * FROM valoraciones LEFT JOIN alquileres ON valoraciones.id_alquiler = alquileres.id WHERE id_usuario = $idUsuario ORDER BY alquileres.id;)
      Con estas dos querySQL puedo ordenar la información a través del ID del alquiler (la tabla que está relacionada con todas las demás) y evitar hacer las siguientes líneas de código */
      $sqlQueryValoracionesNombre = "SELECT videojuegos.nombre FROM alquileres LEFT JOIN videojuegos ON alquileres.id_videojuego = videojuegos.id WHERE id_usuario = $idUsuario ORDER BY alquileres.id";
      $sqlQueryValoracionesValoracion = "SELECT valoracion FROM valoraciones RIGHT JOIN alquileres ON valoraciones.id_alquiler = alquileres.id WHERE id_usuario = $idUsuario ORDER BY alquileres.id";



      // Forma de iterar una consulta SQL guardándola en una variable
      // $idAlquilerValoracionCliente = "SELECT id_alquiler FROM valoraciones LEFT JOIN alquileres ON valoraciones.id_alquiler = alquileres.id WHERE id_usuario = $idUsuario ORDER BY valoraciones.id";
      // $registroIds = $cnx->myQueryMultiple($idAlquilerValoracionCliente, false);
      // $arrIds = [];
      // foreach ($registroIds as $key => $value) {
      //   array_push($arrIds, $registroIds[$key][0]);
      // }
      // $rango = implode(",", $arrIds);
      // $sqlQueryValoracionesVideojuego = "SELECT * FROM valoraciones WHERE valoraciones.id_alquiler IN ($rango) ORDER BY valoraciones.id_alquiler";
      // $registrosValoracionesVideojuegos = $cnx->myQueryMultiple($idAlquilerValoracionCliente, false); //=> Devuelve un array con índices



      // Creo array
      $registrosValoraciones = $cnx->myQueryMultiple($sqlQuery, false); //=> Devuelve un array con índices
      // Creo una matrices de registros
      $registrosValoracionesDevolucion = $cnx->myQueryMultiple($sqlQueryValoracionesDevolucion); //=> Devuelve una matriz asociativa
      $registrosValoracionesNombre = $cnx->myQueryMultiple($sqlQueryValoracionesNombre); //=> Devuelve una matriz asociativa
      $registrosValoracionesValoracion = $cnx->myQueryMultiple($sqlQueryValoracionesValoracion); //=> Devuelve una matriz asociativa

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
      echo "<tr>   <th>ID</th>   <th>Devolución</th>   <th>Videojuego</th>   <th>Valoración</th>   </tr>";

      foreach ($registrosValoraciones as $key => $value) {
        echo "<tr>" .
          "<td>" . $value[0] . "</td>" .
          "<td>" . $registrosValoracionesDevolucion[$key]['fechaDevolucion'] . "</td>" .

          "<td>" . $registrosValoracionesNombre[$key]['nombre'] . "</td>" .

          "<td>" . $registrosValoracionesValoracion[$key]['valoracion'] . "</td>" .
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
