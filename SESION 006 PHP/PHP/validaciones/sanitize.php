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
  <form action="sanitize.php" method="post" target="_self">
    <label for="nameID">NOMBRE</label>
    <input type="text" id="nameID" name="name" placeholder="Your name here..." required />

    <!-- Vamos a poner `type="text"` con el objetivo de mostrar un filtrado de saneamiento -->
    <label for="ageID">EDAD</label>
    <input type="text" id="ageID" name="age" placeholder="Your age here..." required />

    <label for="passwordID">PASSWORD</label>
    <input type="password" id="passwordID" name="password" placeholder="Your password here..." required />

    <button type="submit" id="submitID" name="submit" value="Submit">
      SUBMIT
    </button>
  </form>

  <?php

  // Compruebo si las variables están definidas o no
  if (
    isset($_REQUEST["name"]) &&
    isset($_REQUEST["password"]) &&
    isset($_REQUEST["age"])
  ) {
    // Primero borro
    unset($user, $password);

    // Luego escribo
    $user = $_REQUEST["name"];
    $password = $_REQUEST["password"];
    $age = $_REQUEST["age"];
    $submit = $_REQUEST["submit"];

    // ? `FILTER_VAR()` FILTRAR LOS INPUTS DE ACUERDO A UN STANDARD QUE YO LE PASE 
    // `filter_var()` nos ayuda a crear validaciones correctamente. Recibe 2 parámetros
    // 1 El input
    // 2 El filtro que le deseo dar
    // Filtros de saneamiento: FILTER_SANITIZE_NUMBER_INT, FILTER_SANITIZE_EMAIL, FILTER_SANITIZE_URL
    // Filtros de validación: FILTER_VALIDATE_INT, FILTER_VALIDATE_EMAIL, FILTER_VALIDATE_REGEXP, FILTER_VALIDATE_IP
    echo filter_var($age, FILTER_SANITIZE_NUMBER_INT); //=> si el usuario escribe números y letras, obtendremos solo los números
  }
  ?>
</body>

</html>
