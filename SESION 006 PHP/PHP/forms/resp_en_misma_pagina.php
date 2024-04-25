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
  <h1>FORM NUM</h1>

  <!-- El `action=""` envía los datos a esa página -->
  <!-- El `method=""` es el método que realiza la operación -->
  <form action="resp_en_misma_pagina.php" method="post" target="_self">
    <label for="precio">INTRODUCE UN NÚMERO</label>
    <input type="number" id="precio" name="precio" required>
    <label for="nombre">NOMBRE</label>
    <input type="text" id="nombre" name="nombre" required>

    <button type="submit" id="enviar" name="enviar" value="Enviar">ENVIAR</button>
  </form>

  <div>
    <h3>RESPUESTA</h3>
    <?php
    // Esto devuelve `true` o `false` si el parámetro existe y tienen un valor
    isset($_REQUEST["precio"]);

    // Si existe ese valor envía el código
    // De esta manera, evitamos que los errores se vean en la pantalla si no tenemos el valor que necesitamos
    if (isset($_REQUEST["precio"])) {

      $precio = $_REQUEST["precio"]; // Se escribe el atributo `name=""` del HTML
      $porcentaje = 0.25;
      $porcentajeIVA = 0.21;
      $descuento = $precio * $porcentaje;
      $IVA = $precio * $porcentajeIVA;
      $total = $precio - $descuento;
      $totalIVASinDescuento = $precio + $IVA;


      echo "El precio de €$precio con el 25% de descuento es: €$total";
      echo "<br/>";
      echo "El precio de €$precio con IVA sin el descuento es: €$totalIVASinDescuento";
    }

    if (isset($_REQUEST["nombre"])) {

      if ($_REQUEST["nombre"] === "pedro") {

        $nombre = $_REQUEST["nombre"];

        echo "El nombre $nombre es correcto";
      }
    }
    ?>
  </div>
</body>

</html>
