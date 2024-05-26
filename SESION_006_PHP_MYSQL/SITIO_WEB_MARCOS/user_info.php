<!DOCTYPE html>
<html>

<head>
  <meta charset="utf8" />
  <meta name="author" content="DMA" />
  <meta name="description" content="USER INFO" />
  <meta name="keywords" content="cursos, formación, desarrollo software" />
  <title>USER INFO</title>
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

  // HTML
  require_once("./html_modules/header.php");
  require_once("./html_modules/nav.php");

  // Importar el archivo de las funciones
  require_once("./functions/authentication.php");

  // Incluir el autoload del composer
  require_once("../vendor/autoload.php");

  // Añado los archivos de las clases
  require_once("./classes/BaseDatosUsuario.php");
  require_once("./classes/BaseDatos.php");

  // Llamo a las clases
  // Primer  elemento es el namespace
  // Segundo elemento es la clase 
  // Tercer  elemento el pseudonimo de la clase
  use BaseDatos\BaseDatos;
  use BaseDatosUsuario\BaseDatosUsuario;

  // use Firebase\JWT\JWT;
  // use Firebase\JWT\Key;

  // Esto lo cargo para utilizar las variables de entorno en el archivo `.env`
  // Es necesario el `autoload` del `vendor` para cargar y encontrar estos paquetes. También se puede cargar el directorio en otro archivo e importar este en él
  // La función estática en el namespace `Dotenv` recibe 1 parámetro
  // 1 El directorio donde encontrar el archivo `.env`. No hace falta poner el nombre del archivo oculto, solo ponemos el directorio donde está porque lo busca automáticamente
  use Dotenv\Dotenv;

  $dotenv = Dotenv::createImmutable("./");
  $dotenv->load();

  // Clave secreta en el archivo `.env`
  $key_secreta = $_ENV['SIGNATURE_KEY'];

  // Compruebo si hay una cookie con nombre `jwt`
  if (isset($_COOKIE['jwt'])) {

    // try {
    //   /* $jwt = $_COOKIE['jwt'];
    //   $metodoCifrado = "AES-128-CBC";
    //   // Decodifico el jwt
    //   $jwtDecodificado = JWT::decode($jwt, new Key($key_secreta, "HS256"));
    //   // Desencripto el payload del jwt
    //   $payloadDesencriptado =  openssl_decrypt($jwtDecodificado->data, $metodoCifrado, $_ENV['CIPHER_KEY'], 0, base64_decode($jwtDecodificado->iv));

    //   // Decodifico el JSON que tiene el valor del usuario que hay en el token
    //   $pay = json_decode($payloadDesencriptado);
    //   $userJWT = $pay->{'username'}; //=> Es el usuario logueado. Esta estructura se puede visualizar en la función `JWTCreation` dentro del array asociativo `$payload` */

    //   $jwt = $_COOKIE['jwt'];
    //   $userJWT = JWTDecodeUser($jwt, $_ENV['SIGNATURE_KEY'], $_ENV['CIPHER_KEY']);

    //   // Hago comprobación en la base de datos
    //   if ($_SESSION['usuario'] == $userJWT) {

    //     http_response_code(200); // OK
    //     echo "<p>El usuario tiene acceso a esta página.</p>";


    // Compruebo la existencia de credenciales en el la cookie del token JWT y si coincide con la información del usuario en la variable de sesión `PHPSESSID` 
    $jwt = $_COOKIE['jwt'];
    $secretKey = $_ENV['SIGNATURE_KEY'];
    $cipherKey = $_ENV['CIPHER_KEY'];
    if (estadoAcceso($jwt, $secretKey, $cipherKey)) {

      // El contenido de la página iría aquí adentro porque hemos refactorizado el código para que realice todas las comprobaciones en `estadoAcceso`
      $infoUsuario = BaseDatosUsuario::mostrarUsuario($_SESSION['usuario']);

      // echo
      // "<table>";
      // echo "<tr>   <td>ID</td>   <td>Nombre</td>   <td>Apellido 1</td>   <td>Apellido 2</td>   <td>E-Mail</td>   <td>Teléfono</td>   <td>Dirección</td>   <td>DNI</td>   <td>Número de Tarjeta</td>   <td>Fecha de Nacimiento</td>   <td>Socio</td>   <td>Rol</td>   </tr>";

      // echo "<tr>";

      // foreach ($infoUsuario as $key => $value) {

      //   if ($key != "hashedPassword") {
      //     echo "<td>" . $value . "</td>";
      //   }
      // }

      // echo "</tr>";
      // echo "</table>";

      echo
      "<table>";
      echo "<tr>   <td>Actualizar Usuario</td>   <td>Imagen</td>   <td>Nombre</td>   <td>Apellido 1</td>   <td>Apellido 2</td>   <td>E-Mail</td>   <td>Teléfono</td>   <td>Dirección</td>   <td>DNI</td>   <td>Número de Tarjeta</td>   <td>Fecha de Nacimiento</td>   <td>Socio</td>   <td>Rol</td>   </tr>";

      echo "<tr>";

      echo "<td><a href='./actual_user.php'><img class='redondeado' src='./assets/img/update.png'></a></td>";

      echo "<td><img class='redondeado' src='" . $infoUsuario['imagen'] . "'></td>";

      foreach ($infoUsuario as $key => $value) {

        if ($key != "hashedPassword" && $key != "imagen" && $key != "id") {
          if ($key != "socio" && $key != "id_rol") {
            echo "<td>" . $value . "</td>";
          }
        }
        if ($key == "socio") {
          if ($value == 1) {
            $value = "Si";
            echo "<td>" . $value . "</td>";
          } else {
            $value = "No";
            echo "<td>" . $value . "</td>";
          }
        }
        if ($key == "id_rol") {
          $consultaRol1 = "SELECT rol FROM roles WHERE id = " . $infoUsuario["id_rol"];
          // $consultaRol2 = "SELECT roles.rol FROM clientes LEFT JOIN roles ON clientes.id_rol = roles.id WHERE clientes.id = " . $idUsuario['id'];

          $cnx = new BaseDatos("localhost", "root", "mysql", "gameclubdario");
          $registroRol = $cnx->myQuerySimple($consultaRol1); //=> Devuelve un array asociativo

          echo "<td>" . $registroRol['rol'] . "</td>";
        }
      }

      echo "</tr>";
      echo "</table>";
    }

    //   } else {
    //     echo '<h3 class="card">Acceso denegado. Toke inválido / Sesión incorrecta</h3>';
    //   }


    // } catch (Exception $exception) {
    //   http_response_code(401); //No autorizado.
    //   echo "<h2 class='card' >Acceso denegado. El token es inválido</h2>";
    //   echo "<br/>";
    // }
  } else {
    http_response_code(401); //No autorizado.
    echo "<h3 class='card'>Acceso denegado. No se ha proporcionado un Token JWT.</h3>" . "<br/>";
  }

  require("./html_modules/footer.php");
  ?>

</body>

</html>
