<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="Marcos Lambir Torres" />
  <meta name="description" content="JavaScript" />
  <meta name="keywords" content="Curso, Formación, Examen" />
  <link rel="stylesheet" href="./css/login.css" />
  <link rel="shortcut icon" href="public/favicon.ico" type="image/x-icon" />
  <title>Home</title>
</head>

<body>
  <header class="background-1">
    <section class="flex-col-cnt section-container">
      <div class="flex-row-cnt gap-s max-width">
        <h1>Header</h1>
      </div>
    </section>
  </header>

  <nav class="background-2">
    <section class="flex-col-cnt section-container">
      <div class="flex-row-cnt gap-m max-width">
        <h2>Nav</h2>
        <ul>
          <li><a href="./home.php" title="Página Principal">Home</a></li>
        </ul>
        <ul>
          <li><a href="./login.html" title="Página Login">LogIn</a></li>
        </ul>
        <ul>
          <li><a href="./contact.php" title="Página Login">Contact</a></li>
        </ul>
      </div>
    </section>
  </nav>

  <main class="background-3">
    <section class="flex-col-cnt section-container">
      <div class="flex-col-cnt gap-s max-width">
        <h2>Main</h2>
      </div>
    </section>
  </main>

  <aside class="background-4">
    <section class="flex-col-cnt section-container">
      <div class="flex-row-cnt gap-s max-width">
        <h2>Aside</h2>
      </div>
    </section>
  </aside>

  <footer class="background-5">
    <section class="flex-col-cnt section-container">
      <div class="flex-row-cnt gap-m max-width">
        <h2>&copy;Footer</h2>
        <ul>
          <li><a href="#" title="Footer link">Footer link</a></li>
        </ul>
      </div>
    </section>
  </footer>

  <?php
  // Call de package JWT
  require_once("../../vendor/autoload.php");

  // Call namespaces JWT
  use Firebase\JWT\JWT;
  use Firebase\JWT\Key;

  // Llamar archivo `.env` para utilizarlo
  // La función estática en el namespace `Dotenv` recibe 1 parámetro
  // El directorio donde encontrar el archivo `.env`. No hace falta poner el nombre del archivo oculto, solo ponemos el directorio donde está, porque lo busca automáticamente
  $dotenv = Dotenv\Dotenv::createImmutable("../../");
  $dotenv->load();

  // Secret key (debe tener el mismo valor que la clave previamente encriptada en JWT)
  $secret_key = $_ENV["SECRET_KEY"];

  if (isset($_COOKIE["JWT"])) {
    // Enviar otro error si el token es inválido a través de un try-catch
    try {
      // Descodificar la clave
      JWT::decode($_COOKIE["JWT"], new Key($secret_key, "HS256"));
      echo "<h3>El usuario tiene acceso a esta página</h3>" . "<br/>";
    } catch (Exception $e) {
      http_response_code(401);
      echo "<h3>El token es inválido</h3>" . $e->getMessage() . "<br/>";
    }
  } else {
    http_response_code(401);
    echo "<h3>Acceso denegado. No se ha proporcionado un token</h3>" . "<br/>";
  }

  // Compruebo si las variables están definidas o no
  if (isset($_COOKIE["LOGIN"])) {
    // Primero borro
    unset($loginCookie);

    // Luego escribo
    $loginCookie = $_COOKIE["LOGIN"];

    echo "<h3>INFO USUARIO LOGUEADO</h3>";

    // Borro cookies dejando el parámetro 2 vacío y el parámetro 3 en negativo
    setcookie("LOGIN", "", time() - 1000, "/");
  }
  ?>
  <script type="module" src="./js/login.js"></script>
</body>

</html>
