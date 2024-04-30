  <?php
  // Compruebo existencia
  if (isset($_REQUEST["user"]) && isset($_REQUEST["password"]) && isset($_REQUEST["enviar"])) {
    // Borro
    unset($user, $password);
    // Veo la información del formulario
    /* echo "<br/>";
    echo "<strong>La información del formulario es: </strong>";
    var_dump($_REQUEST);
    echo "<br/>"; */
    // Escribo
    $user = $_REQUEST["user"];
    $password = $_REQUEST["password"];

    if ($user === "Pepito" && $password === "Grillo") {
      echo "<h3>Bienvenido $user!</h3>";
      echo "<p>¿Te olvidaste de <strong>Pinocho</strong> hoy? </p>";
      echo "<br/>";
    } else {
      echo "<h3>Te has olvidado de tus datos de acceso?</h3>";
      echo "<a href=\"./form_user_welcome.html\">Vuelve a la página de inicio de sesión</a>";
      echo "<br/>";
    }
  }
  ?>
