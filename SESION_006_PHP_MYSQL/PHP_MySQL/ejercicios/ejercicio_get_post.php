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
  <form action="ejercicio_get_post.php" method="post" target="_self">
    <label for="nameID">USER</label>
    <input type="text" id="nameID" name="name" required />

    <label for="passwordID">PASSWORD</label>
    <input type="password" id="passwordID" name="password" required />

    <label for="schoolID">USER LEVEL
      <!-- En el caso de `type="radio"` y `type="checkbox"` el atributo `name=""` debe ser el mismo -->
      <input type="radio" name="lvl" value="Primaria" /> Primaria
      <input type="radio" name="lvl" value="Secundaria" /> Secundaria
      <input type="radio" name="lvl" value="Bachiller" /> Bachiller
    </label>

    <button type="submit" id="submitID" name="submit" value="send">
      SUBMIT
    </button>
  </form>

  <?php
  // ToDo: Terminar el ejercicio, sacar la información
  if (isset($_REQUEST["name"]) && isset($_REQUEST["lvl"])) {
    echo "";
    # code...
  }
  ?>
</body>

</html>
