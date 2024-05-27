  <nav>
    <!-- <a href="./0_login.php"> LOGIN</a>
    <a href="./0_registro.php">REGISTRO</a> -->
    <!-- <a href="./user_info.php">INFO USUARIO</a> -->
    <!-- <a href="./lista_videojuegos.php">LISTA VIDEOJUEGOS</a> -->

    <!-- <a href="./lista_alquileres.php">LISTA ALQUILERES</a> -->
    <!-- <a href="./lista_valoraciones.php">LISTA VALORACIONES</a> -->

    <!-- <a href="./actual_user.php">ACTUALIZAR USUARIO</a> -->

    <!-- <a href="./reg_alquiler.php">REGISTRO ALQUILER</a> -->

    <!-- <a href="./reg_valoracion.php">REGISTRO VALORACIÓN</a> -->
    <!-- <a href="./reg_videojuego.php">REGISTRO VIDEOJUEGO</a> -->

    <!-- <a href="./0_logout.php">LOGOUT</a> -->
    <!-- <a href="./contacto.php"> CONTACTO</a> -->


    <?php
    // Añado los archivos de las clases
    require_once("./classes/BaseDatosUsuario.php");

    // Incluir funciones
    require_once("./functions/authentication.php");

    // Llamo a las clases
    // Primer  elemento es el namespace
    // Segundo elemento es la clase 
    // Tercer  elemento el pseudonimo de la clase
    use BaseDatosUsuario\BaseDatosUsuario as Usuario;

    require_once("../vendor/autoload.php");

    $dotenv = Dotenv\Dotenv::createImmutable("./");
    $dotenv->load();

    // Compruebo que el token existe en la cookie
    if (isset($_COOKIE['jwt'])) {

      // Compruebo que las credenciales son correctas
      // Compruebo la existencia de credenciales en el la cookie del token JWT y si coincide con la información del usuario en la variable de sesión `PHPSESSID` 
      $jwt = $_COOKIE['jwt'];
      $secretKey = $_ENV['SIGNATURE_KEY'];
      $cipherKey = $_ENV['CIPHER_KEY'];
      if (estadoAcceso($jwt, $secretKey, $cipherKey)) {
        $infoUsuario = Usuario::mostrarUsuario($_SESSION['usuario']);
        $personalMsg = strtoupper($infoUsuario['nombre']);

        if (isset($infoUsuario)) {
          echo "<a href='./lista_videojuegos.php'>LISTA VIDEOJUEGOS</a>";
          echo "<a href='./lista_alquileres.php'>ALQUILERES $personalMsg</a>";
          echo "<a href='./lista_valoraciones.php'>VALORACIONES $personalMsg</a>";
          // echo "<a href='./reg_alquiler.php'>REGISTRAR ALQUILER</a>";
          echo "<a href='./reg_alquiler2.php'>REGISTRAR ALQUILER</a>";
          echo "<a href='./reg_valoracion.php'>REGISTRAR VALORACIÓN</a>";
        }
        $consultaRol = "SELECT rol FROM roles WHERE id = " . $infoUsuario['id'];
        if ($consultaRol == 'full') {
          echo "<a href='./reg_videojuego.php'>REGISTRAR NUEVO VIDEOJUEGO</a>";
        }
      }
    } else {
      echo "<a href='./0_login.php'>LOGIN</a>";
      echo "<a href='./0_registro.php'>REGISTRO</a>";
    }
    ?>
  </nav>
