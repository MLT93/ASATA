<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="Marcos Lambir Torres" />
  <meta name="description" content="JavaScript" />
  <meta name="keywords" content="Curso, Formación, Examen" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css" />
  <link rel="shortcut icon" href="public/favicon.ico" type="image/x-icon" />
  <title>Registros</title>
</head>

<body>
  <header>
    <section>
      <div>
        <h1>INFORMACIÓN ESCRITA EN EL ARCHIVO .LOG</h1>
      </div>
    </section>
  </header>

  <main>
    <section>
      <div>
        <?php
        // Lectura del `.log` para mostrar su información
        $doc = fopen("registro.log", "r");

        while (!feof($doc)) {
          echo fgets($doc) . "<br />";
        }
        ?>
      </div>
    </section>
  </main>

  <script type="module" src="./js/script.js"></script>
</body>

</html>
