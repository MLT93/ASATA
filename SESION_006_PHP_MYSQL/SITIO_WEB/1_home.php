<!DOCTYPE html>
<html>

<head>
  <meta charset="utf8" />
  <meta name="author" content="DMA" />
  <meta name="description" content="LOGIN " />
  <meta name="keywords" content="cursos, formación, desarrollo software" />
  <title>HOME</title>
  <link href="./css/styles.css" rel="stylesheet" type="text/css" />
</head>


<body>

  <?php
  // Activar el almacenamiento en búfer de salida. Esto recoge toda la salida del script hasta que decidas enviarla al navegador, permitiendo modificar las cabeceras en cualquier momento del script. Permite hacer `require` después de cargar la página
  ob_start();
  // Inicio una sesion
  // session_start();

  // Cabecera y nav
  require_once("./html_modules/header.php");
  require_once("./html_modules/nav.php");

  // Incluir el autoloader del composer
  require_once("../vendor/autoload.php");

  // Añado el archivo de la clase usuario y sesión
  require_once("./classes/BaseDatosUsuario.php");
  require_once("./classes/BaseDatosSession.php");

  // Incluir funciones
  require("./functions/authentication.php");

  // Llamo a la clase usuario
  // Primer  elemento es el namespace
  // Segundo elemento es la clase 
  // Tercer  elemento el pseudonimo de la clase
  use BaseDatosUsuario\BaseDatosUsuario as Usuario;
  use BaseDatosSession\BaseDatosSession as Sesion;




  // LOGIN
  if (isset($_REQUEST['loguear'])) {

    $email = $_REQUEST['email'];
    $pass = $_REQUEST['pass'];
    $captcha = $_REQUEST['captcha'];

    // Verifico existencia del usuario en la base de datos
    if (Usuario::verificarUsuario($email, $pass)) {
      // Aquí genero mi instancia de la sesión
      // Equivale a un `session_start`
      $mySession = new Sesion();

      // Compruebo captcha
      // Si el captcha no se ve en la página, dentro del archivo `php.ini` (en la carpeta php), descomentar esto `extension=gd` para poder verlo en la página web
      if ($captcha == $_SESSION['captcha']) {
        echo "<p>El captcha es correcto</p>" . "<br/>";

        // Si el captcha es correcto, Logueo el usuario
        $mySession->inicioLogin($email);

        // Ahora creo un array para almacenar una lista de variables que pasaré a la función `JWTCreation` para crear el JWT token con la info del usuario
        $info = [];
        $info["usuario"] = $email;
        $info["password"] = $pass;
        // Creo JWT token y devuelve un array junto con la fecha de expiración
        $jwtArray = JWTCreation($info, "./");
        // Creo cookie con JWT encriptada, y utilizo la info de `jwtArray`
        setcookie("jwt", $jwtArray['jwt'], $jwtArray['exp'], "/");

        // Inserto el formulario otra página
        // require("./html_modules/form_picture_up.php");

      } else {
        echo "<p>El captcha NO es correcto</p>";
        echo "<br/>";
      }
    } else {
      echo "<h3 class='card'>Acceso denegado. Credenciales incorrectas</h3>" . "<br/>";
    }
  }




  // REGISTRO
  if (isset($_REQUEST['registrar'])) {

    $nombre = $_REQUEST['nombre'];
    $apellido1 = $_REQUEST['apellido1'];
    $apellido2 = $_REQUEST['apellido2'];
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['pass'];
    $pass2 = $_REQUEST['pass2'];
    $tel = $_REQUEST['tel'];
    $direccion = $_REQUEST['direccion'];
    $dni = $_REQUEST['dni'];
    $numTarjeta = $_REQUEST['numTarjeta'];
    $fNacimiento = $_REQUEST['fNacimiento'];
    $isSocio = $_REQUEST['isSocio'];
    $captcha = $_REQUEST['captcha'];

    // Compruebo que este usuario no exista en la base de datos
    if (Usuario::mostrarIdUsuario($email) == 0) {

      // Compruebo que las passwords coinciden
      if ($pass == $pass2) {

        // Aquí genero mi instancia de la sesión
        // Equivale a un `session_start`
        $mySession = new Sesion();

        // Compruebo que el captcha es correcto
        if ($captcha == $_SESSION['captcha']) {
          // Si el captcha es correcto, inicio una sesión para el nuevo usuario
          $mySession->inicioLogin($email);

          // Creo nuevo usuario una vez comprobado todo e iniciado la sesión
          Usuario::registrarUsuario($nombre, $apellido1, $apellido2, $email, $pass, $tel, $direccion, $dni, $numTarjeta, $fNacimiento, $isSocio);
          echo "<h3 class='card'>Usuario registrado correctamente</h3>" . "<br/>";

          // Ahora creo un array para almacenar una lista de variables que pasaré a la función `JWTCreation` para crear el JWT token con la info del usuario
          $info = [];
          $info["usuario"] = $email;
          $info["password"] = $pass;
          // Creo JWT token y devuelve un array junto con la fecha de expiración
          $jwtArray = JWTCreation($info, "./");
          // Creo cookie con JWT encriptada, y utilizo la info de `jwtArray`
          setcookie("jwt", $jwtArray['jwt'],  $jwtArray['exp'], "/");

          // Inserto el formulario otra página
          // require("./html_modules/form_picture_up.php");

        } else {
          echo "<h3 class='card'>El captcha NO es correcto</h3>" . "<br/>";
        }
      } else {
        echo "<h3 class='card'>La password NO coinciden</h3>" . "<br/>";
      }
    } else {
      echo "<h3 class='card'>El correo electrónico ya existe en la base de datos</h3>" . "<br/>";
    };
  }

  // require("./html_modules/footer.php");
  ?>

</body>

</html>
