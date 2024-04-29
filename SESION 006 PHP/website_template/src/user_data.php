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
        <ul>
          <li><a href="./home.php" title="Página Principal">Home</a></li>
        </ul>
        <h2>Nav</h2>
        <ul>
          <li><a href="./login.php" title="Página Login">LogIn</a></li>
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
  // Compruebo si las variables están definidas o no
  if (isset($_COOKIE["login"])) {
    // Primero borro
    unset($loginCookie);

    // Luego escribo
    // ? `$_COOKIE`
    // `$_COOKIE` devuelve el valor que posee la cookie
    $loginCookie = $_COOKIE["login"];

    echo "<h3>COOKIE USUARIO:</h3>";
    echo "$loginCookie";

    // Borro cookies dejando el parámetro 2 vacío y el parámetro 3 en negativo
    setcookie("login", "", time() - 1000, "/");
  }
  ?>
  <script type="module" src="./js/login.js"></script>
</body>

</html>
