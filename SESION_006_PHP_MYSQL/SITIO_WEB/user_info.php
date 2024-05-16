<!DOCTYPE html>
<html>

<head>
  <meta charset="utf8" />
  <meta name="author" content="DMA" />
  <meta name="description" content="LOGIN " />
  <meta name="keywords" content="cursos, formación, desarrollo software" />
  <title>USER INFO</title>
  <link href="./css/styles.css" rel="stylesheet" type="text/css" />
</head>


<body>

  <?php
  // Activar almacenamiento en el búfer de salida. Esto recoge toda la salida del script hasta que decidas enviarla al navegador, permitiendo modificar las cabeceras en cualquier momento del script
  // Permite modificar las cabeceras en cualquier momento
  ob_start();

  // Inicio una sesión para poder trabajar con la información de la super-variable `$_SESSION` correspondiente al captcha
  // Inicio una sesión. Siempre iniciar una sesión en las páginas que reciben o manejan información del usuario
  session_start();

  //cabecera y nav
  require_once("./html_modules/header.php");
  require_once("./html_modules/nav.php");

  //importar el archivo de las funciones
  require_once("./functions/authentication.php");

  //incluir el autoloader del composer
  require_once("../vendor/autoload.php");
  require_once("./classes/BaseDatosUsuario.php");

  // use Firebase\JWT\JWT;
  // use Firebase\JWT\Key;
  use Dotenv\Dotenv;
  use BaseDatosUsuario\BaseDatosUsuario;

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

      echo
      "<table>";
      echo "<tr>   <td>ID</td>   <td>Nombre</td>   <td>Apellido 1</td>   <td>Apellido 2</td>   <td>E-Mail</td>   <td>Teléfono</td>   <td>Dirección</td>   <td>DNI</td>   <td>Número de Tarjeta</td>   <td>Fecha de Nacimiento</td>   <td>Socio</td>   </tr>";

      echo "<tr>";

      foreach ($infoUsuario as $key => $value) {

        if ($key != "hashedPassword") {
          echo "<td>" . $value . "</td>";
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
    echo "<h3 class='card' >Acceso denegado. No se ha proporcionado un Token JWT.</h3>" . "<br/>";
  }
  require("./html_modules/footer.php");

  ?>

</body>

</html>
