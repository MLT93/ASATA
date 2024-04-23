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
  <h1>FORMULARIO</h1>

  <!-- El `action=""` envía los datos a esa página -->
  <!-- El `method=""` es el método que realiza la operación -->
  <form action="ejercicio_nota_media.php" method="post" target="_self">
    <label for="nameID">NOMBRE</label>
    <input type="text" id="nameID" name="name" required />

    <label for="schoolID">USER LEVEL
      <!-- En el caso de `type="radio"` y `type="checkbox"` el atributo `name=""` debe ser el mismo -->
      <input type="radio" name="lvl" value="Primaria" /> Primaria
      <input type="radio" name="lvl" value="Secundaria" /> Secundaria
      <input type="radio" name="lvl" value="Bachiller" /> Bachiller
    </label>

    <label for="exa1ID">EXAMEN 1</label>
    <input type="number" id="exa1ID" name="exa1" required />

    <label for="exa2ID">EXAMEN 2</label>
    <input type="number" id="exa2ID" name="exa2" required />

    <button type="submit" id="submitID" name="submit" value="Submit">
      SUBMIT
    </button>
  </form>

  <?php

  // Compruebo si las variables están definidas o no
  if (isset($_REQUEST["name"]) && isset($_REQUEST["lvl"]) && isset($_REQUEST["exa1"]) && isset($_REQUEST["exa2"])) {
    // Primero borro
    unset($user, $passwordUser, $userType);

    // Luego escribo
    // ? `$_POST`
    // `$_POST` es igual al antiguo `$_REQUEST` pero sin `$_GET`. No recibe esa información
    // Es más seguro y queda oculto al usuario
    $user = $_REQUEST["name"];
    $lvl = $_REQUEST["lvl"];
    $exa1 = $_REQUEST["exa1"];
    $exa2 = $_REQUEST["exa2"];

    $mediaExa = $exa1 + $exa2 / 2;

    echo "201 - Correct!" . "<br/>";
    echo '$_POST ' . "Hola $user. Eres un usuario con estudios de tipo $lvl y tu nota media es $mediaExa" . "<br/>";
  }

  ?>
</body>

</html>
