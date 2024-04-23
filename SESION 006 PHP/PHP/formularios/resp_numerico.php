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
  <h1>RESPUESTA NUMÉRICO</h1>

  <?php
  // `$_REQUEST` es para obtener la respuesta enviada, se escribe el valor del atributo `name=""` del input HTML correspondiente. Devuelve un array
  $precio = $_REQUEST["precio"];
  $porcentaje = 0.25;
  $porcentajeIVA = 0.21;
  $descuento = $precio * $porcentaje;
  $IVA = $precio * $porcentajeIVA;
  $total = $precio - $descuento;
  $totalIVASinDescuento = $precio + $IVA;

  echo "El precio de €$precio con el 25% de descuento es: €$total";
  echo "<br/>";
  echo "El precio de €$precio con IVA sin el descuento es: €$totalIVASinDescuento";
  ?>

</body>

</html>
