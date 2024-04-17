<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="Marcos Lambir Torres" />
  <meta name="description" content="JavaScript" />
  <meta name="keywords" content="Curso, Formación, Examen" />
  <link rel="stylesheet" href="./src/css/formulario.css" />
  <title>Curso ASATA - PHP</title>
</head>

<body>
  <header>
    <section>
      <h1>CONSTANTES MÁGICAS</h1>
    </section>
  </header>

  <nav>
    <section></section>
  </nav>

  <main>
  <section></section>
  </main>

  <aside>
    <section></section>
  </aside>

  <footer>
    <section></section>
  </footer>

  <?php

  // ? LAS CONSTANTES MÁGICAS EN PHP SON VALORES PREDEFINIDOS QUE OFRECEN INFORMACIÓN DINÁMICA SOBRE EL ENTORNO Y EL CONTEXTO DE EJECUCIÓN DEL CÓDIGO

  echo "La versión de PHP de esta aplicación es: " . PHP_VERSION;
  echo "<br/>";
  echo "El sistema operativo del servidor es: " . PHP_OS;
  echo "<br/>";
  echo "La ruta donde se almacenan las librerías es: " . PHP_LIBDIR;
  echo "<br/>";
  echo "Esta es la línea de código número: " . __LINE__;
  echo "<br/>";
  echo "El directorio de este archivo es: " . __FILE__;
  echo "<br/>";
  function cuadrado($num)
  {
    echo "Esto en la función " . __FUNCTION__;
    echo "<br/>";
    return "El cuadrado de $num es: " . $num ** 2;
  }
  echo "<br/>";
  ?>
  <script src="./src/js/formulario.js"></script>
</body>

</html>
