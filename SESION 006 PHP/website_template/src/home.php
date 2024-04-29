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
        <ul>
          <li><a href="./home.php" title="Página Principal">Home</a></li>
        </ul>
        <h2>Nav</h2>
        <ul>
          <li><a href="./login.html" title="Página Login">LogIn</a></li>
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
  // Database
  $dbUsers = [
    ["migCD", "1234"],
    ["pedro36", "1234"],
    ["juan_mar32", "1234"],
  ];

  // Compruebo si las variables están definidas o no
  if (isset($_REQUEST["user"]) && isset($_REQUEST["password"]) && isset($_REQUEST["captcha"]) && isset($_REQUEST["submit"])) {
    // Primero borro
    unset($user, $passwordUser, $captcha);

    // Luego escribo
    // ? `$_REQUEST`
    // `$_REQUEST` devuelve un array con toda la info del formulario, por eso se identifican individualmente
    // Para obtener la información individualmente, se escribe el valor del atributo `name=""` del input HTML al que se desea acceder
    // Mezcla entre POST y GET
    $user = $_REQUEST["user"];
    $userPass = $_REQUEST["password"];
    $captcha = $_REQUEST["captcha"];
    $submitBtn = $_REQUEST["submit"];

    // Comprobar si el usuario ha realizado correctamente el captcha

    // Compruebo que los datos de la db coinciden con los datos introducidos por el usuario
    for ($i = 0; $i < count($dbUsers); $i++) {
      if ($user === $dbUsers[$i][0] && $userPass === $dbUsers[$i][1]) {
        echo "<h3>WELCOME $user</h3>" . "<br/>";

        // ? `SETCOOKIE()` CREA UNA COOKIE
        // `setcookie()` recibe 4 parámetros
        // 1 Nombre de la cookie. Para obtener su valor se utiliza `$_COOKIE[""]`
        // 2 Valor de la cookie. Se almacena en el PC del cliente
        // 3 El tiempo en que la cookie expira. Si se establece a 0, o es omitido, la cookie expirará al final de la sesión (cuando el navegador es cerrado). Lo más probable es que se haga con la función time() más el número de segundos antes de que quiera que expire. O se podría usar `mktime()`. `time()+60*60*24*30` hará que la cookie establecida expire en 30 días
        // 4 Path. La ruta dentro del servidor en la que la cookie estará disponible. Si se utiliza '/', la cookie estará disponible en la totalidad del domain. Si se configura como '/foo/', la cookie sólo estará disponible dentro del directorio /foo/ y todos sus sub-directorios en el domain, tales como /foo/bar/. El valor por defecto es el directorio actual en donde se está configurando la cookie.
        // 5 Subdominio donde está disponible la cookie. Para que la cookie esté disponible para todo el dominio (incluyendo todos sus subdominios), simplemente establezca el nombre de dominio ('example.com', en este caso)
        setcookie("login", "$user", time() + 3600 * 24, "/", "example.com"); /* expira en 1 hora */
        break;

        // Si lo de arriba es `false` envía el mensaje cuando llega al final del array
      } elseif ($i === count($dbUsers) - 1) {
        echo "<h3>INCORRECT USERNAME AND PASSWORD</h3>" . "<br/>";
      }
    }
  }
  // ToDo: fijarse en SITIO_WEB del Drive
  ?>

  <script type="module" src="./js/home.js"></script>
</body>

</html>
