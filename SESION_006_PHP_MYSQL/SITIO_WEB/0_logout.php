<!DOCTYPE html>
<html>

<head>
  <meta charset="utf8" />
  <meta name="author" content="DMA" />
  <meta name="description" content="LOGOUT" />
  <meta name="keywords" content="cursos, formación, desarrollo software" />
  <title>LOG OUT</title>
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

  // Inicio una sesión para poder trabajar con la información de la super-variable `$_SESSION` correspondiente al captcha
  // Inicio una sesión. Siempre iniciar una sesión en las páginas que reciben o manejan información del usuario
  session_start();

  require("./html_modules/header.php");
  require("./html_modules/nav.php");
  require_once("./classes/BaseDatosSession.php");

  use BaseDatosSession\BaseDatosSession as Sesion;

  if (isset($_SESSION["usuario"])) {
    // Cierro la sesión del usuario
    Sesion::cerrarSesion();

    // Elimino las cookies haciendo un set con su mismo nombre con un valor negativo del tiempo
    setcookie("jwt", "", time() - 3600, "/");
    setcookie("PHPSESSID", "", time() - 3600, "/");

    http_response_code(200); //OK 
    echo "<h3 class='card' >Se ha cerrado la sesión.</h3>" . "<br/>";
  } else {
    http_response_code(401); // No autorizado
    echo "<h3 class='card' >No hay una sesión activa.</h3>" . "<br/>";
  }


  require("./html_modules/footer.php");
  ?>

</body>

</html>
