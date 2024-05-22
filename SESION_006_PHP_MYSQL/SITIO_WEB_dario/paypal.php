<!DOCTYPE html>
<html>

<head>
  <meta charset="utf8" />
  <meta name="author" content="DMA" />
  <meta name="description" content="PAY-PAL " />
  <meta name="keywords" content="cursos, formación, desarrollo software" />
  <title>PAY-PAL</title>
  <link href="css/styles.css" rel="stylesheet" type="text/css" />

  <!-- esta 4 etiquetas evitan que trabaje con los archivos js y css en caché -->
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">

  <!-- Aquí llamo a la aplicación de PayPal Developer, en mi cuenta Business, con el Client ID de la aplicación (ej. `Default Application`) -->
  <!-- https://www.paypal.com/sdk/js?client-id=<CLIENT_ID_DE_TU_APP> -->
  <script src="https://www.paypal.com/sdk/js?client-id=AQ7BC8zbNCFXpLpmWON0D5ZYv6RzVFTHi9RL-jtSs_YIsEElMOIlTI1Nl8PCB7uTBRMYewSWvgJedkJ6"></script>

</head>


<body>

  <?php
  //activar el almacenamiento en búfer de salida. Esto recoge toda la salida del script hasta que decidas enviarla al navegador, permitiendo modificar las cabeceras en cualquier momento del script. 
  ob_start();
  //inicio una sesión
  session_start();

  //cabecera y nav
  require_once("./html_modules/header.php");
  require_once("./html_modules/nav.php");
  require_once("./classes/UsuarioDB.php");
  require_once("./classes/db.php");

  require_once("./functions/authentication.php");
  //incluir el autoload del composer
  require_once("../vendor/autoload.php");

  use UserDB\Usuario as Usuario;
  use Database\Db as Db;

  $dotenv = Dotenv\Dotenv::createImmutable("./");
  $dotenv->load();

  if (isset($_COOKIE['jwt'])) {


    if (estadoAcceso($_COOKIE['jwt'], $_ENV['SIGNATURE_KEY'], $_ENV['CIPHER_KEY'])) {


      //EL CONTENIDO DE MI PÁGINA IRÍA DENTRO DE ESTE IF  
      //INICIA AQUÍ

      $infoUsuario = Usuario::mostrarUsuario($_SESSION['usuario']);
      $idUsuario = $infoUsuario['id'];

      $consultaSQL = "SELECT tarifas.coste FROM alquileres LEFT JOIN tarifas ON alquileres.id_tarifas = tarifas.id WHERE alquileres.id_usuario = $idUsuario ORDER BY alquileres.id DESC LIMIT 0, 1";

      $cnx = new Db("localhost", "root", "", "gameclubdario");

      $registro = $cnx->myQuerySimple($consultaSQL);

      $costeUltimoAlquiler = $registro['coste'];

      // Para pasar información de PHP a JavaScript debo primero pararla al HTML
      // Genero un `div` con un `atributo ad hoc` con la información que deseo pasarle a JavaScript
  ?>
      <div id="userInfoID" data-coste="<?= $costeUltimoAlquiler ?>"></div>
      <div id="paypal-button-container"></div>
  <?php
      //TERMINA AQUÍ

    }
  } else {
    http_response_code(401); //No autorizado.
    echo "<h2 class='card' >Acceso denegado. No se ha proporcionado un Token.</h2>";
    echo "<br/>";
  }
  require("./html_modules/footer.php");

  ?>

  <!-- Este es el código que permite crear el botón y la conexión a la cartera para pagar -->
  <script>
    // Elaboro la información que guardé antes en el `div` donde envío la información de PHP
    let userInfoID = document.getElementById("userInfoID");
    const coste = Number(userInfoID.getAttribute('data-coste'));
    console.log(coste);

    paypal.Buttons({
      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: coste
            }
          }]
        });
      },
      onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
          alert('Transaction completed by ' + details.payer.name.given_name);
        });
      }
      // Renderiza al id container `paypal-button-container`
    }).render('#paypal-button-container');
  </script>

</body>

</html>
