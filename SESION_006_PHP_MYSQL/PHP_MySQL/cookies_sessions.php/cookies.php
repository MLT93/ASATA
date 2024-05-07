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
          <li><a href="#" title="Página Principal">Home</a></li>
        </ul>
        <h2>Nav</h2>
        <ul>
          <li><a href="#" title="Página Login">Log In</a></li>
        </ul>
      </div>
    </section>
  </nav>

  <main class="background-3">
    <section class="flex-col-cnt section-container">
      <div class="flex-row-cnt gap-s max-width">
        <h2>Main</h2>
      </div>

      <?php
      // ? `SETCOOKIE()` CREA UNA COOKIE
      // `setcookie()` recibe 4 parámetros
      // 1 Nombre de la cookie. Para obtener su valor se utiliza `$_COOKIE[""]`
      // 2 Valor de la cookie. Se almacena en el PC del cliente
      // 3 El tiempo en que la cookie expira. Si se establece a 0, o es omitido, la cookie expirará al final de la sesión (cuando el navegador es cerrado). Lo más probable es que se haga con la función time() más el número de segundos antes de que quiera que expire. O se podría usar `mktime()`. `time()+60*60*24*30` hará que la cookie establecida expire en 30 días
      // 4 Path. La ruta dentro del servidor en la que la cookie estará disponible. Si se utiliza '/', la cookie estará disponible en la totalidad del domain. Si se configura como '/foo/', la cookie sólo estará disponible dentro del directorio /foo/ y todos sus sub-directorios en el domain, tales como /foo/bar/. El valor por defecto es el directorio actual en donde se está configurando la cookie.
      // 5 Subdominio donde está disponible la cookie. Para que la cookie esté disponible para todo el dominio (incluyendo todos sus subdominios), simplemente establezca el nombre de dominio ('example.com', en este caso)
      setcookie("miPrimeraCookie", "Marcos es el valor", time() + 3600 * 24 * 7, "/", "example.com"); /* expira en 1 semana */
      setcookie("TestCookie", "Pepito_grillo", time() + 3600);  /* expira en 1 hora */
      setcookie("TestCookie2", "TestCookie2", time() + 7200);  /* expira en 2 horas */

      // Borro cookies dejando el parámetro 2 vacío y el parámetro 3 en negativo
      setcookie("", "", time() - 1000, "/");
      ?>
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
  <script type="module" src="./js/script.js"></script>
</body>

</html>
