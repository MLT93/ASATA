  <?php
  // Activar almacenamiento en el búfer de salida. Esto recoge toda la salida del script hasta que decidas enviarla al navegador, permitiendo modificar las cabeceras en cualquier momento del script
  // Permite modificar las cabeceras en cualquier momento
  ob_start();

  // Inicio una sesión para poder trabajar con la información de la super-variable `$_SESSION`
  // Inicio una sesión. Siempre iniciar una sesión en las páginas que reciben o manejan información del usuario
  // session_start(); //=> En este caso no hace falta iniciar sesión aquí porque este archivo se cargará dentro de otro, el cual tendrá la sesión iniciada

  // Cabecera, nav
  require_once("./html_modules/header.php");
  require_once("./html_modules/nav.php");

  // Añado los archivos de las clases
  require_once("./classes/UsuarioDB.php");

  // Incluir funciones
  require_once("./functions/authentication.php");

  // Llamo a las clases
  // Primer  elemento es el namespace
  // Segundo elemento es la clase 
  // Tercer  elemento el pseudonimo de la clase
  use UserDB\Usuario as Usuario;

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
      $infoUsuario = Usuario::mostrarUsuario($_SESSION['usuario']);
      $nombre = $infoUsuario['nombre'];
      $email = $infoUsuario['email'];
    }
  }
  ?>

  <form class='form_justificado' action="reg_factura.php" method="post">

    <label for="emisorID">EMISOR</label>
    <input type="text" name="emisor" id="emisorID" value="<?= strtoupper($nombre) ?>" require>

    <label for="emailID">EMAIL</label>
    <input type="email" name="email" id="emailID" value="<?= strtoupper($email) ?>" require>

    <label for="currencyID">MONEDA</label>
    <select name="currency" id="currencyID" require>
      <option value=""></option>
      <option value="EUR">EUR</option>
      <option value="USD">USD</option>
    </select>

    <label for="totalID">TOTAL</label>
    <input type="number" name="total" id="totalID" require step="0.01"> <!-- `step="0.01"` permite escribir decimales -->

    <input type="submit" name="facturar" value="INVOICE">

  </form>
