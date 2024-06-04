<!DOCTYPE html>
<html>

<head>
  <meta charset="utf8" />
  <meta name="author" content="DMA" />
  <meta name="description" content="LOGIN " />
  <meta name="keywords" content="cursos, formación, desarrollo software" />
  <title>CARRITO</title>
  <link href="css/estilos.css" rel="stylesheet" type="text/css" />

  <!-- esta 4 etiquetas evitan que trabaje con los archivos js y css en caché -->
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">

  <script src="https://www.paypal.com/sdk/js?client-id=AbFHCNnvdFQfEdDFNfJzDR5cuRs8GxohetYfPLAy17Hh1bgR_xgRUY7xw6fzCysQuKJt6vbosJPWQldQ&currency=EUR"> </script>

</head>


<body>

  <?php
  //activar el almacenamiento en búfer de salida. Esto recoge toda la salida del script hasta que decidas enviarla al navegador, permitiendo modificar las cabeceras en cualquier momento del script. 
  ob_start();
  //inicio una sesion
  session_start();

  // Cabecera, nav
  require_once("./html_modules/header.php");
  require_once("./html_modules/nav.php");

  // Añado los archivos de las clases
  require_once("./classes/BaseDatos.php");
  require_once("./classes/BaseDatosUsuario.php");

  use BaseDatos\BaseDatos;
  use BaseDatosUsuario\BaseDatosUsuario as Usuario;

  // Incluir funciones
  require_once("./functions/authentication.php");

  //incluir el autoloader del composer
  require_once("../vendor/autoload.php");

  $dotenv = Dotenv\Dotenv::createImmutable("./"); // Busco el directorio del archivo `.env`
  $dotenv->load();

  // Llamo `Client` de Guzzle para hacer las peticiones HTTP (este se llama siempre)
  // `Request` es otra forma de realizar peticiones a través de otra clase de Guzzle (se apoya en `Client` igualmente)
  use GuzzleHttp\Client;
  use GuzzleHttp\Psr7\Request;

  if (isset($_COOKIE['jwt'])) {
    if (estadoAcceso($_COOKIE['jwt'], $_ENV['SIGNATURE_KEY'], $_ENV['CIPHER_KEY'])) {

      //EL CONTENIDO DE MI PÁGINA IRIA DENTRO DE ESTE IF  
      //INICIA AQUI

      if (isset($_REQUEST['pedidoAlquiler'])) {

        // $cnx = new BaseDatos("localhost", "root", "mysql", "gameclub");
        $cnx = new BaseDatos("localhost", "root", "", "gameclub");

        $emailUsuario = $_SESSION['usuario'];
        $costeTotal = 0;
        echo "<table>";
        echo "<tr><th>TIPO</th><th>NOMBRE</th><th>TIPO</th><th>COSTE</th><th>MONEDA</th></tr>";

        // var_dump($_REQUEST);
        foreach ($_REQUEST as $key => $value) {
          // * Obtener lo videojuegos
          if ($key != "mpago" && $key != "pedidoAlquiler") {
            // var_dump($key);
            $idVideojuego = intval($key); // El valor del id del videojuego esta en la key porque es el que envío como `name` en el formulario
            $sentencia = "SELECT videojuegos.nombre, tarifas.tipo, tarifas.coste FROM videojuegos, tarifas WHERE videojuegos.id_tarifa = tarifas.id AND videojuegos.id = $idVideojuego";
            $registro = $cnx->myQuerySimple($sentencia); // Devuelve array asociativo

            $costeTotal = $costeTotal + floatval($registro['coste']);
            echo "<tr><td>Alquiler</td>   <td>" . $registro['nombre'] . "</td>   <td>" . $registro['tipo'] . "</td>    <td>" . $registro['coste'] . "</td>   <td>€</td></tr>";
          }

          // * Obtengo el método de pago
          if ($key == "mpago") {
            $sentenciaSQL = "SELECT metodospago.metodo FROM metodospago WHERE metodospago.id = $value";
            $registro = $cnx->myQuerySimple($sentenciaSQL);
            if (intval($value) == 0) {
              echo "<h2 class='card'> NO he escogido un método de pago </h2>";
            } else {
              echo "<tr id='total'><td>TOTAL</td>   <td></td>   <td></td>   <td>$costeTotal</td>   <td>€</td></tr>";
            }
            echo "</table>";

            echo "<h3 class='h3_pago'>El método elegido es " . $registro['metodo'] . "</h3>";

            if (intval($value) == 1) { // Aquí sólo entra si es método de pago paypal
  ?>
              <div class="paypal_container">
                <div id="userInfo" data-coste="<?= $costeTotal ?>" data-email="<?= $emailUsuario ?>"></div>
                <div id="paypal-button-container"></div>
              </div>
  <?php
            }
          }

          // ToDo: REVISAR ESTE CÓDIGO PARA PODER REGISTRAR EL ALQUILER
          // * Registro el alquiler en la base de datos
          if ($key == "pedidoAlquiler") {
            // Variables formulario
            $idVideojuego = intval($value);
            $idTarifa = intval($_POST["idTarifa"]);
            $idMetodoPago = intval($_POST["idMetodoPago"]);

            // Fechas de alquileres en timestamp
            // Si el ID tarifa es 1 (standard) la devolución será en 2 días desde el alquiler
            // De lo contrario, será en 5 días
            $fechaAlquiler = date("Y-m-d", intval(strtotime("now")));
            $fechaDevo = "";
            if (
              $idTarifa == 1
            ) {
              $fechaDevo = date("Y-m-d", intval(strtotime($fechaAlquiler . "+2 days")));
            } else {
              $fechaDevo = date("Y-m-d", intval(strtotime($fechaAlquiler . "+5 days")));
            }

            $camposDB = ["fechaAlquiler", "id_usuario", "id_videojuego", "id_tarifas", "fechaDevolucion", "id_empleado", "id_metodoPago"];
            $registrosDB = [$fechaAlquiler, $idUsuario, $idVideojuego, $idTarifa, $fechaDevo, $idEmpleado, $idMetodoPago];

            // Escribo en la database
            $cnx->insertSingleRegister("alquileres", $camposDB, $registrosDB);

            $msgFooter = "Alquiler realizado con éxito"; //=> Conexión con el footer

            // Envío el cliente a otra página o la recargo
            header("Location: lista_alquileres.php");
          }
        }
      }
      //TERMINA AQUI

    }
  } else {
    http_response_code(401); //No autorizado.
    echo "<h2 class='card' >Acceso denegado. No se ha proporcionado un Token.</h2>";
    echo "<br/>";
  }
  require("./html_modules/footer.php");
  ?>

  <script>
    var userInfoDiv = document.getElementById("userInfo");
    const coste = parseFloat(userInfoDiv.getAttribute('data-coste'));
    const mail = userInfoDiv.getAttribute('data-email');

    paypal.Buttons({

      style: {
        layout: 'vertical', //horizontal   / vertical
        color: 'gold', //gold, silver, blue, black, white
        shape: 'pill', // rect,  pill,
        label: 'paypal' //pay, 
      },

      createOrder: function(data, actions) {
        return actions.order.create({

          purchase_units: [{
            amount: {
              value: coste,
              currency_code: 'EUR'
            }
          }],
          payer: {
            email_address: mail
          }

        });
      },
      onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
          alert('Transaction completed by ' + details.payer.name.given_name);
        });
      }

    }).render('#paypal-button-container');
  </script>

</body>

</html>
