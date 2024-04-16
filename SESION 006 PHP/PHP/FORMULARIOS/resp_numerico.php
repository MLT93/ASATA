<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario</title>
</head>

<body>
  <h1>RESPUESTA NUMÉRICO</h1>

  <?php
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
  ?>

</body>

</html>
