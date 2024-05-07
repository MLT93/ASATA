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
  <form action="log_registro.php" method="post" target="_self">
    <label for="nameID">NOMBRE</label>
    <input type="text" id="nameID" name="name" placeholder="Your name here..." required />

    <label for="passwordID">PASSWORD</label>
    <input type="password" id="passwordID" name="password" placeholder="Your password here..." required />

    <button type="submit" id="submitID" name="submit" value="send">
      SUBMIT
    </button>
  </form>

  <?php

  // Base de datos falsa
  $dbUsers = [
    ["pedropol36", "1234"],
    ["plopo36", "111"],
    ["marionel6", "1222"],
    ["luisunol", "1234"],
    ["ppaupon6", "1234"],
    ["pmuriol", "1234"],
  ];

  // Compruebo si las variables están definidas o no
  if (
    isset($_REQUEST["name"]) &&
    isset($_REQUEST["password"]) &&
    isset($_REQUEST["submit"])
  ) {
    // Primero borro
    unset($user, $password);

    // Luego escribo
    $user = $_REQUEST["name"];
    $password = $_REQUEST["password"];
    $submit = $_REQUEST["submit"];

    // Escribimos los archivos `.log`
    // ? `FOPEN()` ES EL MANEJADOR DE ARCHIVOS DE PHP
    // `fopen()` sirve para acceder a los archivos. Tiene 2 parámetros
    // 1 El archivo al que voy a acceder
    // 2 El método con el que voy a interactuar en el archivo (escribir al final: "a+", leer desde el principio: "r",  escribir al inicio: "c+")

    // ? `FWRITE()` ES EL QUE ESCRIBE EN LOS ARCHIVOS
    // `fwrite()` sirve para escribir en los archivos cuando he accedido a ellos. Tiene 2 parámetros
    // 1 El archivo con el método con el que voy a interactuar
    // 2 Lo que voy a escribir. Atento que en los archivos de texto los saltos de línea se realizan con `\r\n`

    // ? `FCLOSE()` ES EL QUE CIERRA EL PROCESO
    // `fclose()` sirve para cerrar los archivos. Tiene 1 parámetro
    // 1 El archivo con el que estaba interactuando
    // Voy a dejar de escribir

    for ($i = 0; $i < count($dbUsers); $i++) {
      if ($user == $dbUsers[$i][0] && $password == $dbUsers[$i][1]) {
        $logOK = fopen("log_ok.log", "a+");
        $linea1 = "USUARIO CORRECTO";
        $linea2 = "Nombre: $user.";
        $linea3 = "Password: $password.";
        fwrite($logOK, "\r\n $linea1 \r\n");
        fwrite($logOK, "\r\n $linea2 \r\n");
        fwrite($logOK, "\r\n $linea3 \r\n");
        fclose($logOK);
        break;
      } else {
        $logKO = fopen("log_ko.log", "c+");
        $linea1 = "USUARIO INCORRECTO";
        $linea2 = "Nombre: $user.";
        $linea3 = "Password: $password.";
        fwrite($logKO, "\r\n $linea1 \r\n");
        fwrite($logKO, "\r\n $linea2 \r\n");
        fwrite($logKO, "\r\n $linea3 \r\n");
        fclose($logKO);
      }
    }

    // Leemos el archivo `.log`
    echo "<h2>Información del archivo con LOG correcto</h2>";

    $readLogOk = fopen("log_ok.log", "r");

    // ? `FEOF()` NOS DICE SI ESTAMOS AL FINAL DEL ARCHIVO O NO
    // `feof()` devuelve true (1) cuando hemos llegado al final de archivo y false (0) si no lo hemos alcanzado todavía
    while (!feof($readLogOk)) {

      // ? `FGETS()` TOMA UN TROZO DEL ARCHIVO
      // `fgets()` obtiene una cadena del archivo. Tiene 2 parámetros
      // 1 El archivo de lectura
      // 2 Longitud de caracteres a leer. Si se omite, leerá hasta 1024 caracteres
      echo fgets($readLogOk) . "<br/>";
    }

    // Leemos el otro archivo `.log`
    echo "<h2>Información del archivo con LOG incorrecto</h2>";

    $readLogKo = fopen("log_ko.log", "r");

    // ? `FEOF()` NOS DICE SI ESTAMOS AL FINAL DEL ARCHIVO O NO
    // `feof()` devuelve true (1) cuando hemos llegado al final de archivo y false (0) si no lo hemos alcanzado todavía
    while (!feof($readLogKo)) {

      // ? `FGETS()` TOMA UN TROZO DEL ARCHIVO
      // `fgets()` obtiene una cadena del archivo. Tiene 2 parámetros
      // 1 El archivo de lectura
      // 2 Longitud de caracteres a leer. Si se omite, leerá hasta 1024 caracteres
      echo fgets($readLogKo) . "<br/>";
    };
  }
  ?>
</body>

</html>
