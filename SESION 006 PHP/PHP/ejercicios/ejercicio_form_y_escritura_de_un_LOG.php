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

  <style>
    form {
      display: flex;
      flex-flow: column;
      gap: 10px;

      width: fit-content;
    }

    select[id="cursoID"],
    select[id="ciudadesID"] {
      width: 100%;
    }
  </style>
</head>

<body>
  <h1>FORMULARIO</h1>

  <!-- El `action=""` envía los datos a esa página -->
  <!-- El `method=""` es el método que realiza la operación -->
  <!-- `method="get"` envía a través de `path` o ruta URL que es visible por los usuarios -->
  <!-- `method="post"` envía de forma oculta al usuario -->
  <form action="ejercicio_form_y_escritura_de_un_LOG.php" method="post" target="_self">
    <label for="nameID">NOMBRE</label>
    <input type="text" id="nameID" name="name" placeholder="Your name here..." required />

    <label for="emailID">E-MAIL</label>
    <input type="email" id="emailID" name="email" placeholder="Your email here..." required />

    <label for="commentsID">COMENTARIO</label>
    <textarea name="comments" id="commentsID" cols="30" rows="10" placeholder="Write here..." required></textarea>

    <button type="submit" id="submitID" name="submit" value="Submit">
      SUBMIT
    </button>
  </form>

  <?php


  // Compruebo si las variables están definidas o no
  if (
    isset($_REQUEST["name"]) &&
    isset($_REQUEST["email"]) &&
    isset($_REQUEST["comments"])
  ) {
    // Primero borro
    unset($user, $email, $comments);

    // Luego escribo
    $user = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $comments = $_REQUEST["comments"];
    $submit = $_REQUEST["submit"];

    $currentTimeStamp = strtotime("now");
    $formattedDate = date("d-m-y H:i:s", intval($currentTimeStamp));

    // ? `FOPEN()` ES EL MANEJADOR DE ARCHIVOS DE PHP

    // `fopen()` sirve para acceder a los archivos. Tiene 2 parámetros
    // 1 El archivo al que voy a acceder
    // 2 El método con el que voy a interactuar en el archivo (escribir al final: "a+", leer desde el principio: "r", )
    // Voy a abrir un archivo (.log, .txt, ...) para escribir en él
    $writeDoc = fopen("ejercicio_form_y_escritura_de_un_LOG.log", "a+");

    // ? `FWRITE()` ES EL QUE ESCRIBE EN LOS ARCHIVOS

    // `fwrite()` sirve para escribir en los archivos cuando he accedido a ellos. Tiene 2 parámetros
    // 1 El archivo con el método con el que voy a interactuar
    // 2 Lo que voy a escribir. Atento que en los archivos de texto los saltos de línea se realizan con `\r\n`
    // Voy a escribir
    $linea1 = "Nombre: $user.";
    $linea2 = "E-Mail: $email.";
    $linea3 = "Comentario: $comments.";
    $linea4 = "Fecha: $formattedDate" . "h";
    fwrite($writeDoc, "\r\n $linea1 \r\n");
    fwrite($writeDoc, $linea2 . "\r\n");
    fwrite($writeDoc, $linea3 . "\r\n");
    fwrite($writeDoc, $linea4 . "\r\n");

    // ? `FCLOSE()` ES EL QUE CIERRA EL PROCESO DE ESCRITURA

    // `fclose()` sirve para cerrar los archivos. Tiene 1 parámetro
    // 1 El archivo con el que estaba interactuando
    // Voy a dejar de escribir
    fclose($writeDoc);

    // ? AHORA LEEREMOS UN ARCHIVO

    echo "<h2>Información del archivo LOG</h2>";

    $readDoc = fopen("ejercicio_form_y_escritura_de_un_LOG.log", "r");

    // ? `FEOF()` NOS DICE SI ESTAMOS AL FINAL DEL ARCHIVO O NO

    // `feof()` devuelve true (1) cuando hemos llegado al final de archivo y false (0) si no lo hemos alcanzado todavía
    while (!feof($readDoc)) {

      // ? `FGETS()` TOMA UNA LINEA DEL ARCHIVO

      // `fgets()` obtiene una cadena . Tiene 2 parámetros
      // 1 El archivo de lectura
      // 2 Longitud de caracteres para leer. Si se omite, leerá hasta 1024 caracteres
      echo fgets($readDoc) . "<br/>";
    }
  }
  // Si hay comentario y hay submit, el archivo ha sido registrado
  if (isset($comments) && isset($submit)) {
    echo "<h3>Comentario Registrado!</h3>";
  }
  ?>
</body>

</html>
