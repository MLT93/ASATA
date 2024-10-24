<!DOCTYPE html>
<html>

<head>
  <meta charset="utf8" />
  <meta name="author" content="DMA" />
  <meta name="description" content="IMAGEN SUBIDA" />
  <meta name="keywords" content="cursos, formación, desarrollo software" />
  <title>IMAGEN SUBIDA</title>
  <link rel="stylesheet" href="./css/estilos.css">

  <!-- Estas 4 etiquetas 'meta' evitan que se guarden en la memoria Caché los archivos JS y CSS. De este modo nos aseguramos que al realizar cambios, los busque y actualice la información -->
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">
</head>


<body>

  <?php
  // Activar almacenamiento en el búfer de salida. Esto recoge toda la salida del script hasta que decidas enviarla al navegador, permitiendo modificar las cabeceras en cualquier momento del script
  // Permite modificar las cabeceras en cualquier momento
  ob_start();

  require("./html_modules/header.php");
  require("./html_modules/nav.php");

  if (isset($_REQUEST['subir'])) {

    if ($_FILES['archivo']['error'] > 0) {
      echo "<p>Ha habido un error durante la carga</p>";
      echo "<br/>";
    } else {
      //compruebo archivo valido
      $extension = $_FILES['archivo']['type'];
      if (
        strstr($extension, "jpg") == "jpg" ||
        strstr($extension, "jpeg") == "jpeg" ||
        strstr($extension, "gif")  == "gif"  ||
        strstr($extension, "png")  == "png"
      ) {
        $origen = $_FILES["archivo"]['tmp_name'];
        $destino = "./repo/img/" . date('Y.m.d.His') . "-" . $_FILES["archivo"]["name"];
        copy($origen, $destino);
        echo "<p>Imagen cargada en el servidor</p>";
        echo "<br/>";
        echo "<img width='300px' src='./repo/img/" . date('Y.m.d.His') . "-" . $_FILES["archivo"]["name"] . "' >";
      }
    }
  }



  require("./html_modules/footer.php");
  ?>

</body>

</html>
