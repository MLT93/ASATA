<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="Marcos Lambir Torres" />
  <meta name="description" content="JavaScript" />
  <meta name="keywords" content="Curso, Formación, Examen" />
  <link rel="stylesheet" href="./css/home.css" />
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
          <li><a href="./user_data.php" title="Página Info Usuario">Info Usuario</a></li>
        </ul>
      </div>
    </section>
  </nav>

  <main class="background-3">
    <section class="flex-col-cnt section-container">
      <div class="flex-row-cnt gap-s max-width">
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
  // Importar package para JWT
  require_once("../../vendor/autoload.php");

  // namespace JWT
  use Firebase\JWT\JWT;

  // Llamar archivo `.env` para utilizarlo
  // El parámetro que recibe la función estática en el namespace `Dotenv` recibe 1 parámetro
  // El directorio donde encontrar el archivo `.env`. No hace falta poner el nombre del archivo oculto, solo ponemos el directorio donde está, porque lo busca automáticamente
  $dotenv = Dotenv\Dotenv::createImmutable("../../");
  $dotenv->load();

  // Database con la info de usuarios
  $dbUsers = [
    ["migCD", "1234"],
    ["pedro36", "1234"],
    ["juan_mar32", "1234"],
  ];

  // Inicio una sesión para recuperar la información de la super-variable `$_SESSION` correspondiente al captcha
  session_start();

  // Compruebo si las variables están definidas o no. Es para ver si el usuario ha escrito algo en los inputs
  if (isset($_REQUEST["user"]) && isset($_REQUEST["password"]) && isset($_REQUEST["captcha"]) && isset($_REQUEST["submit"])) {
    // Primero borro
    unset($user, $passwordUser, $captcha, $submitBtn);

    // Luego escribo
    $user = $_REQUEST["user"];
    $userPass = $_REQUEST["password"];
    $captcha = $_REQUEST["captcha"];
    $submitBtn = $_REQUEST["submit"];

    // Comprobar si el usuario ha realizado correctamente el captcha
    if ($_REQUEST["captcha"] === $_SESSION["captcha"]) {
      echo "El captcha es correcto" . "<br/>";
    } else {
      echo "El captcha no es correcto" . "<br/>";
      echo "Lo que has introducido en el input: " . $_REQUEST["captcha"] . "<br/>";
      echo "El captcha generado es:" . $_SESSION["captcha"] . "<br/>";
    }

    // Itero la base de datos para realizar comprobaciones y proporcionar accesos
    for ($i = 0; $i < count($dbUsers); $i++) {
      // Compruebo que los datos de la db coinciden con los datos introducidos por el usuario
      if ($user === $dbUsers[$i][0] && $userPass === $dbUsers[$i][1]) {
        echo "<h3>WELCOME $user</h3>" . "<br/>";

        // Creo pass muy secreta para encriptar JWT
        $secret_key = $_ENV["SECRET_KEY"];

        // Crear Payload JWT con la info del usuario a encriptar JWT. La password no hace falta a no ser que se encripte por separado
        $iat = time();
        $exp = $iat + 3600; /* Token expire in 1 hour */
        $sub = $dbUsers[$i];
        $user = $dbUsers[$i][0];

        $payload = [
          "iat" => $iat,
          "exp" => $exp,
          "sub" => $sub,
          "username" => $user,
        ];

        // Realizar Encriptado JWT
        $tokenJWT = JWT::encode($payload, $secret_key, "HS256");

        // Guardar info en una cookie
        setcookie("JWT", $tokenJWT, $exp, "/"); /* Expira en 1 hora */
        echo "TOKEN enviado al usuario $user";

        setcookie("LOGIN", "$user", time() + 3600 * 24, "/"); /* Expira en 1 hora */
        break;

        // Si la primera condición es `false` envía el mensaje cuando llega al final del array
      } elseif ($i === count($dbUsers) - 1) {
        echo "<h3>INCORRECT USERNAME AND PASSWORD</h3>" . "<br/>";
      }
    }
  }
  ?>

  <script type="module" src="./js/home.js"></script>
</body>

</html>
