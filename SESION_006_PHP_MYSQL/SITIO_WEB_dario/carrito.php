<!DOCTYPE html>
<html>

<head>
  <meta charset="utf8" />
  <meta name="author" content="DMA" />
  <meta name="description" content="LOGIN " />
  <meta name="keywords" content="cursos, formación, desarrollo software" />
  <title>INFO USUARIO</title>
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
  // ALQUILERES

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

      // * ALQUILERES
      if (isset($_POST['pedidoAlquiler'])) {

        $cnx = new Db("localhost", "root", "", "gameclubdario");

        // var_dump($_POST);
        $costeTotal = 0;
        foreach ($_POST as $key => $value) {

          // echo $key . "<br/>";
          // echo $value . "<br/>";

          // Si como `$_POST` me devuelve también el input del método de pago y el botón de envío del formulario, necesito quitar los dos últimos elementos del array
          // Negamos con un if los `name` que reciba el array como elementos
          if ($key != "mpago" && $key != "pedidoAlquiler") {

            $consultaSQL = "SELECT videojuegos.nombre, tarifas.tipo, tarifas.coste FROM videojuegos LEFT JOIN tarifas ON videojuegos.id_tarifa = tarifas.id WHERE videojuegos.id = " . intval($key);
            $registros = $cnx->myQuerySimple($consultaSQL);

            // Calcular el coste acumulado de los alquileres
            $costeTotal += floatval($registros["coste"]); // Uso `intval()` para parsear a decimal el string que recibo

            echo "<h3>" . "El videojuego seleccionado es: " . $registros['nombre'] . " --------- " . $registros["tipo"] . " " . $registros['coste'] . "€" . "</h3>" . "<br/>";
          }
          if ($key == "mpago") {

            $consultaSQL = "SELECT metodo FROM metodospago WHERE id = $value;";
            $registros = $cnx->myQuerySimple($consultaSQL);

            // Compruebo que haya algún método de pago seleccionado
            // En el HTML he asignado el `value=0` cuando no hay método de pago seleccionado. Entonces, si es 0, no habrá método seleccionado y envío un error
            if (intval($value) > 0) {
              // echo "ID método pago: " . $value . "<br/>"; // Muestro el ID del método de pago
              echo "<h3>Método de pago seleccionado: " . strtoupper($registros['metodo']) . "</h3>" . "<br/>"; // Muestro el nombre del método de pago

              // Aquí solo entra si es PAYPAL
              if (intval($value) == 1) {

                echo
                "<h3>" . "El coste total es: " . " --------- " . $costeTotal . "€" . "</h3>" . "<br/>";

                // Para pasar información de PHP a JavaScript debo primero pararla al HTML
                // Genero un `div` con un `atributo personalizado` y le paso la información que deseo enviar a JavaScript
  ?>
                <div id="userInfoID" data-coste="<?= $costeTotal ?>"></div>
                <div id="paypal-button-container"></div>
              <?php

              } else {
                echo
                "<h3>" . "El coste total es: " . " --------- " . $costeTotal . "€" . "</h3>" . "<br/>";
              }
            } else {
              echo "<h2 class='card'>No has seleccionado ningún método de pago</h2>" . "<br/>";
            }
          }
        }
      }


      // * COMPRAS

      if (isset($_POST['pedidoCompra'])) {

        $cnx = new Db("localhost", "root", "", "gameclubdario");
        // var_dump($_POST);
        $precioTotal = 0;
        foreach ($_POST as $key => $value) {

          // echo $key . "<br/>";
          // echo $value . "<br/>";

          // Si como `$_POST` me devuelve también el input del método de pago y el botón de envío del formulario, necesito quitar los dos últimos elementos del array
          // Negamos con un if los `name` que reciba el array como elementos
          if ($key != "mpago" && $key != "pedidoCompra") {

            $consultaSQL = "SELECT nombre, precio FROM videojuegos WHERE videojuegos.id = " . intval($key);
            $regPrecios = $cnx->myQuerySimple($consultaSQL, false);

            // Calcular el precio acumulado de la compra
            $precioTotal += floatval($regPrecios[1]); // Uso `intval()` para parsear a decimal el string que recibo

            echo "<h3>" . "El videojuego seleccionado es: " . $regPrecios[0] . " --------- " . $regPrecios[1] . "€" . "</h3>" . "<br/>";
          }
          if ($key == "mpago") {

            $consultaSQL = "SELECT metodo FROM metodospago WHERE id = $value;";
            $regMetodo = $cnx->myQuerySimple($consultaSQL);

            // Compruebo que haya algún método de pago seleccionado
            // En el HTML he asignado el `value=0` cuando no hay método de pago seleccionado. Entonces, si es 0, no habrá método seleccionado y envío un error
            if (intval($value) > 0) {
              // echo "ID método pago: " . $value . "<br/>"; // Muestro el ID del método de pago
              echo "<h3>Método de pago seleccionado: " . strtoupper($regMetodo['metodo']) . "</h3>" . "<br/>"; // Muestro el nombre del método de pago

              // Aquí solo entra si es PAYPAL
              if (intval($value) == 1) {

                echo
                "<h3>" . "El precio total es: " . " --------- " . $precioTotal . "€" . "</h3>" . "<br/>";

                // Para pasar información de PHP a JavaScript debo primero pararla al HTML
                // Genero un `div` con un `atributo personalizado` y le paso la información que deseo enviar a JavaScript
              ?>
                <div id="userInfoID" data-coste="<?= $precioTotal ?>"></div>
                <div id="paypal-button-container"></div>
              <?php

              } else {
                echo
                "<h3>" . "El precio total es: " . " --------- " . $precioTotal . "€" . "</h3>" . "<br/>";
              }
            } else {
              echo "<h2 class='card'>No has seleccionado ningún método de pago</h2>" . "<br/>";
            }
          }
        }
      }

      // * CATALOGO

      if (isset($_POST['pedidoPago'])) {
        var_dump($_POST);

        if (isset($_POST[''])) {
        }

        $cnx = new Db("localhost", "root", "", "gameclubdario");
        $precioTotal = 0;
        // foreach ($_POST as $key => $value) {

          // echo $key . "<br/>";
          // echo $value . "<br/>";

          // Si como `$_POST` me devuelve también el input del método de pago y el botón de envío del formulario, necesito quitar los dos últimos elementos del array
          // Negamos con un if los `name` que reciba el array como elementos
          // if ($key != "mpago" && $key != "pedidoCompra") {

          //   $consultaSQL = "SELECT nombre, precio FROM videojuegos WHERE videojuegos.id = " . intval($key);
          //   $regPrecios = $cnx->myQuerySimple($consultaSQL, false);

          //   // Calcular el precio acumulado de la compra
          //   $precioTotal += floatval($regPrecios[1]); // Uso `intval()` para parsear a decimal el string que recibo

          //   echo "<h3>" . "El videojuego seleccionado es: " . $regPrecios[0] . " --------- " . $regPrecios[1] . "€" . "</h3>" . "<br/>";
          // }
          // if ($key == "mpago") {

          //   $consultaSQL = "SELECT metodo FROM metodospago WHERE id = $value;";
          //   $regMetodo = $cnx->myQuerySimple($consultaSQL);

            // Compruebo que haya algún método de pago seleccionado
            // En el HTML he asignado el `value=0` cuando no hay método de pago seleccionado. Entonces, si es 0, no habrá método seleccionado y envío un error
            // if (intval($value) > 0) {
            //   // echo "ID método pago: " . $value . "<br/>"; // Muestro el ID del método de pago
            //   echo "<h3>Método de pago seleccionado: " . strtoupper($regMetodo['metodo']) . "</h3>" . "<br/>"; // Muestro el nombre del método de pago

            //   // Aquí solo entra si es PAYPAL
            //   if (intval($value) == 1) {

            //     echo
            //     "<h3>" . "El precio total es: " . " --------- " . $precioTotal . "€" . "</h3>" . "<br/>";

            //     // Para pasar información de PHP a JavaScript debo primero pararla al HTML
            //     // Genero un `div` con un `atributo personalizado` y le paso la información que deseo enviar a JavaScript
              ?>
               <!--  <div id="userInfoID" data-coste="<?= $precioTotal ?>"></div>
                <div id="paypal-button-container"></div> -->
  <?php

        //       } else {
        //         echo
        //         "<h3>" . "El precio total es: " . " --------- " . $precioTotal . "€" . "</h3>" . "<br/>";
        //       }
        //     } else {
        //       echo "<h2 class='card'>No has seleccionado ningún método de pago</h2>" . "<br/>";
        //     }
        //   }
        // }
      }

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
    // * ALQUILERES Y PRECIOS
    // * Aquí se procesa todo con el mismo nombre de variables porque si hay alquiler, se pintan los div del alquiler. Si no, se pintarán los de compra
    // Elaboro la información que guardé en el `div` donde envié la información de PHP
    let userInfoID = document.getElementById("userInfoID");
    const coste = Number(userInfoID.getAttribute('data-coste'));
    console.log(coste);

    paypal.Buttons({
      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: coste // Le paso el coste aquí para que me procese ese precio a la hora de pagar
            }
          }]
        });
      },
      onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
          alert('Transaction completed by ' + details.payer.name.given_name);
        });
      }
      // Renderiza al ID (este ID debo asignarlo al `div` donde le paso la info de PHP) `paypal-button-container`
    }).render('#paypal-button-container');
  </script>

</body>

</html>
