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
          <li><a href="./registerUser.html" title="Página Registro">SignUp</a></li>
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
  // * LOGIN

  // Importar package para JWT
  require_once("../../vendor/autoload.php");

  // namespace JWT
  use Firebase\JWT\JWT;

  // Llamar archivo `.env` para utilizarlo
  // La función estática en el namespace `Dotenv` recibe 1 parámetro
  // El directorio donde encontrar el archivo `.env`. No hace falta poner el nombre del archivo oculto, solo ponemos el directorio donde está, porque lo busca automáticamente
  // También se puede hacer así dado que `__DIR__` localiza el directorio en el que estamos: "../" . __DIR__
  $dotenv = Dotenv\Dotenv::createImmutable("../../");
  $dotenv->load();

  // Inicio una sesión para recuperar la información de la super-variable `$_SESSION` correspondiente al captcha
  session_start();

  // Llamada a la Database. En este caso usaremos una ficticia con la info de usuarios
  $usersDB = [
    ["migCD", "1234", "michel@example.com"],
    ["pedro36", "1234", "ped@example.com"],
    ["juan_mar32", "1234", "jun@example.com"],
  ];

  // Compruebo si las variables están definidas o no. Es para ver si el usuario ha escrito algo en los inputs
  if (
    isset($_REQUEST["user"]) &&
    isset($_REQUEST["password"]) &&
    isset($_REQUEST["captcha"]) &&
    isset($_REQUEST["submit"])
  ) {
    // Primero borro
    unset($user, $passwordUser, $captcha, $submitBtn);

    // Luego escribo
    $user = $_REQUEST["user"];
    $userPass = $_REQUEST["password"];
    $captcha = $_REQUEST["captcha"];
    $submitBtn = $_REQUEST["submit"];

    // Comprobar si el usuario ha realizado correctamente el captcha
    if ($captcha === $_SESSION["captcha"]) {
      echo "El captcha es correcto" . "<br/>";
    } else {
      echo "El captcha no es correcto" . "<br/>";
      echo "Lo que has introducido en el input: " . $captcha . "<br/>";
      echo "El captcha generado es:" . $_SESSION["captcha"] . "<br/>";
    }

    // Itero la base de datos para realizar comprobaciones, proporcionar accesos y crear token JWT
    for ($i = 0; $i < count($usersDB); $i++) {
      // Compruebo que los datos de la db coinciden con los datos introducidos por el usuario
      if ($user === $usersDB[$i][0] && $userPass === $usersDB[$i][1]) {
        echo "<h3>WELCOME $user</h3>" . "<br/>";

        // Tomo la pass muy secreta desde las variables de entrono el archivo `.env` para encriptar JWT
        $secret_key = $_ENV["SECRET_KEY"];

        // Crear Payload JWT con la info del usuario a encriptar JWT. La password no hace falta a no ser que se encripte por separado
        $iat = time();
        $exp = $iat + 3600; /* Token expire in 1 hour */
        $sub = $usersDB[$i]; /* Index */
        $user = $usersDB[$i][0];

        $basicPayload = [
          "iat" => $iat,
          "exp" => $exp,
          "sub" => $sub,
          "username" => $user
        ];

        // Cifrar Payload
        $cipherMethod = "AES-128-CBC"; /* Algoritmo de cifrado (el método que se usa para cifrar) */
        $ivLength = openssl_cipher_iv_length($cipherMethod); /* Calculo la longitud del vector de inicialización del cifrado */
        $iv = openssl_random_pseudo_bytes($ivLength); /* Se modifica el vector de inicialización a un string de bytes random */
        $encryptedPayload = openssl_encrypt(json_encode($basicPayload), $cipherMethod, $_ENV["CIPHER_KEY"], OPENSSL_RAW_DATA, $iv); /* Encriptado de la información */

        $fullPayload = [
          "data" => $encryptedPayload,
          "iv" => base64_decode($iv)
        ];

        // Crear encriptado del token JWT con el Payload, la Clave Secreta y el Método de Encriptado
        $tokenJWT = JWT::encode($basicPayload, $secret_key, "HS256");

        // Guardar info en una cookie
        setcookie("JWT", $tokenJWT, $exp, "/"); /* Expira en 1 hora */
        echo "TOKEN enviado al usuario $user";

        setcookie("LOGIN", "$user", time() + 3600 * 24, "/"); /* Expira en 1 hora */
        break;

        // Si la primera condición es `false` envía el mensaje cuando llega al final del array
      } elseif ($i === count($usersDB) - 1) {
        echo "<h3>INCORRECT USERNAME AND PASSWORD</h3>" . "<br/>";
      }
    }
  }
  ?>

  <?php
  // * REGISTRO
  // Importar package para JWT
  // require_once("../../vendor/autoload.php"); /* Already been declared */

  // namespace JWT
  // use Firebase\JWT\JWT; /* Duplicate symbol declaration 'JWT' */

  // Llamar archivo `.env` para utilizarlo
  // La función estática en el namespace `Dotenv` recibe 1 parámetro
  // El directorio donde encontrar el archivo `.env`. No hace falta poner el nombre del archivo oculto, solo ponemos el directorio donde está, porque lo busca automáticamente
  // También se puede hacer así dado que `__DIR__` localiza el directorio en el que estamos: "../" . __DIR__
  // $dotenv = Dotenv\Dotenv::createImmutable("../../"); /* Already been declared */
  // $dotenv->load(); /* Already been declared */

  // Inicio una sesión para recuperar la información de la super-variable `$_SESSION` correspondiente al captcha
  // session_start();  /* Already been declared */

  // Llamada a la Database. En este caso usaremos una ficticia con la info de usuarios
  // $usersDB = [
  //   ["migCD", "1234", "michel@example.com"],
  //   ["pedro36", "1234", "ped@example.com"],
  //   ["juan_mar32", "1234", "jun@example.com"],
  // ]; /* Utilizamos la misma que hay más arriba */

  // Compruebo si las variables están definidas o no. Es para ver si el usuario ha escrito algo en los inputs
  if (
    isset($_REQUEST["name"]) &&
    isset($_REQUEST["email"]) &&
    isset($_REQUEST["pass1"]) &&
    isset($_REQUEST["pass2"]) &&
    isset($_REQUEST["captcha"]) &&
    isset($_REQUEST["register"])
  ) {
    // Primero borro
    unset($newUser, $emailNewUser, $pass1NewUser, $pass2NewUser, $captcha, $registerBtn);

    // Luego escribo
    $newUser = $_REQUEST["name"];
    $emailNewUser = $_REQUEST["email"];
    $pass1NewUser = $_REQUEST["pass1"];
    $pass2NewUser = $_REQUEST["pass2"];
    $captcha = $_REQUEST["captcha"];
    $registerBtn = $_REQUEST["register"];

    // Compruebo que los datos enviados a la base de datos no estén presentes en ella
    for ($i = 0; $i < count($usersDB); $i++) {
      if ($newUser === $usersDB[$i][0] || $emailNewUser === $usersDB[$i][2]) {
        echo "<h3>Estas credenciales ya existen</h3>" . "<br/>";
      } else {
        if ($pass1NewUser === $pass2NewUser) {
          echo "<h3>Password correcta</h3>" . "<br/>";
          if ($captcha === $_SESSION["captcha"]) {
            echo "El captcha es correcto" . "<br/>";

            // Tomo la pass muy secreta desde las variables de entrono el archivo `.env` para encriptar JWT
            $secret_key = $_ENV["SECRET_KEY"];

            // Crear Payload JWT con la info del usuario a encriptar JWT. La password no hace falta a no ser que se encripte por separado
            $iat = time();
            $exp = $iat + 3600; /* Token expire in 1 hour */
            $sub = $usersDB[$i]; /* Index */
            $user = $newUser;

            $basicPayload = [
              "iat" => $iat,
              "exp" => $exp,
              "sub" => $sub,
              "username" => $user
            ];

            // Cifrar Payload
            $cipherMethod = "AES-128-CBC"; /* Algoritmo de cifrado (el método que se usa para cifrar) */
            $ivLength = openssl_cipher_iv_length($cipherMethod); /* Calculo la longitud del vector de inicialización del cifrado */
            $iv = openssl_random_pseudo_bytes($ivLength); /* Se modifica el vector de inicialización a un string de bytes random */
            $encryptedPayload = openssl_encrypt(json_encode($basicPayload), $cipherMethod, $_ENV["CIPHER_KEY"], OPENSSL_RAW_DATA, $iv); /* Encriptado de la información */

            $fullPayload = [
              "data" => $encryptedPayload,
              "iv" => base64_decode($iv)
            ];

            // Crear encriptado del token JWT con el Payload, la Clave Secreta y el Método de Encriptado
            $tokenJWT = JWT::encode($basicPayload, $secret_key, "HS256");

            // Guardar info en una cookie
            setcookie("JWT", $tokenJWT, $exp, "/"); /* Expira en 1 hora */
            echo "TOKEN enviado al usuario $newUser";

            setcookie("LOGIN", "$user", time() + 3600 * 24, "/"); /* Expira en 1 hora */
            break;
          }
        } else {
          echo "El captcha no es correcto" . "<br/>";
          echo "Lo que has introducido en el input: " . $captcha . "<br/>";
          echo "El captcha generado es:" . $_SESSION["captcha"] . "<br/>";
        }
      }
    }
  }

  ?>

  <script type="module" src="./js/home.js"></script>
</body>

</html>
