<!DOCTYPE html>
<html>

<head>
  <meta charset="utf8" />
  <meta name="author" content="DMA" />
  <meta name="description" content="" />
  <meta name="keywords" content="cursos, formación, desarrollo software" />
  <title>REG ALQUILER</title>
  <link href="css/styles.css" rel="stylesheet" type="text/css" />

  <!-- esta 4 etiquetas evitan que trabaje con los archivos js y css en caché -->
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">

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
  require_once("./classes/db.php");
  require_once("./classes/UsuarioDB.php");


  require_once("./functions/authentication.php");
  //incluir el autoload del composer
  require_once("../vendor/autoload.php");

  use UserDB\Usuario as Usuario;
  use Database\Db as Db;


  if (isset($_COOKIE['jwt'])) {


    if (estadoAcceso($_COOKIE['jwt'], $_ENV['SIGNATURE_KEY'], $_ENV['CIPHER_KEY'])) {


      //EL CONTENIDO DE MI PÁGINA IRÍA DENTRO DE ESTE IF  
      //INICIA AQUÍ

      $cnx = new Db("localhost", "root", "", "gameclubdario");

      $consultaSQL = "SELECT * FROM videojuegos;";
      $arrVideojuegos = $cnx->myQueryMultiple($consultaSQL);

      echo "<form class='form_pedidos' action='carrito.php' method='post'>";
      echo "<div class='rower'>";
      echo "<div id='galeria'>";
      foreach ($arrVideojuegos as $key => $value) {
        echo "<div class='elemento_galeria'>";
        echo "<img class='redondeado' src='" . $value['imagen'] . "'/>";
        echo "<br/>";
        echo "<div>";
        echo "<input type='checkbox' name='" . $value['id'] . "' id='id " . $value['id'] . "' />";
        echo "<span class='span_galeria'>" . $value['nombre'] . "</span>";
        echo "</div>";
        echo "</div>";
      }

      echo "</div>";
      echo "</div>";


      echo "<div class='mpago_container'>";
      echo "<label for='mpago'>SELECCIONA MÉTODO DE PAGO</label>";
      echo "<select name='mpago' id='mpago'>";
  ?>
      <?php
      $consultaSQLMPago = "SELECT id, metodo FROM metodospago;";
      $itemsListaMPago = $cnx->myQueryMultiple($consultaSQLMPago, false);
      ?>
      <option value="0">Escoge un método de pago</option>
      <?php
      foreach ($itemsListaMPago as $key => $value) {
      ?>
        <option value="<?= $value[0] ?>"><?= $value[1] ?></option>
      <?php
      }
      ?>
  <?php
      echo "</select>";
      echo "<input type='submit' name='pedidoCompra' id='pedidoCompra' value='COMPRAR'>";
      echo "</div>";
      echo "</form>";

      //TERMINA AQUÍ
    }
  } else {
    http_response_code(401); //No autorizado.
    echo "<h2 class='card' >Acceso denegado. No se ha proporcionado un Token.</h2>";
    echo "<br/>";
  }


  require("./html_modules/footer.php");

  ?>

</body>

</html>
