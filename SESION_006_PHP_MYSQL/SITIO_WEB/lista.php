<!DOCTYPE html>
<html>

<head>
  <meta charset="utf8" />
  <meta name="author" content="DMA" />
  <meta name="description" content="LOGIN " />
  <meta name="keywords" content="cursos, formación, desarrollo software" />
  <title>HOME</title>
  <link href="./css/styles.css" rel="stylesheet" type="text/css" />
</head>


<body>

  <?php
  // Activar el almacenamiento en búfer de salida. Esto recoge toda la salida del script hasta que decidas enviarla al navegador, permitiendo modificar las cabeceras en cualquier momento del script. Permite hacer `require` después de cargar la página
  ob_start();
  // Inicio una sesion
  session_start();

  // Cabecera y nav
  require_once("./html_modules/header.php");
  require_once("./html_modules/nav.php");

  // Añado el archivo de la base de datos
  require_once("./classes/BaseDatos.php");

  // Llamo a la clase usuario
  // Primer  elemento es el namespace
  // Segundo elemento es la clase 
  // Tercer  elemento el pseudonimo de la clase
  use BaseDatos\BaseDatos as BD;

  $cnx = new BD("localhost", "root", "", "gameclubdario");

  $sqlQuery = "SELECT * FROM videojuegos";
  $registrosVideojuegos = $cnx->myQueryMultiple($sqlQuery); //=> Devuelve una matriz asociativa
  
  foreach ($registrosVideojuegos as $key => $value) {
  }

  require("./html_modules/footer.php");
  ?>

</body>

</html>
