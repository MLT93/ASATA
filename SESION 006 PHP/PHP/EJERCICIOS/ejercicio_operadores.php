<?php
$precio1 = 100;
$precio2 = 200;
$porcentaje = 0.20;
// ToDo: REVISAR CÓDIGO
// ? DADO EL VALOR DE DOS PRECIOS, SI AMBOS SON MAYORES DE 100 HACER UN DESCUENTO DEL 20% A CADA PRODUCTO

function creaDescuento($num, $percentage)
{
  return $num * $percentage;
}
function totConDescuento($num, $discount)
{
  return $num - $discount;
}

if ($precio1 > 100 && $precio2 > 100) {
  $descuento1 = creaDescuento($precio1, $porcentaje);
  $descuento2 = creaDescuento($precio2, $porcentaje);
  $conDescuento1 = totConDescuento($precio1, $descuento1);
  $conDescuento2 = totConDescuento($precio2, $descuento2);
  echo "Si tienen descuento el valor de cada uno será: " . $conDescuento1 . " " . $conDescuento2;
} else {
  echo "Al menos uno de los dos productos no vale más de 100";
  echo "<br/>";
}

// ? DADO EL VALOR DE DOS PRECIOS, SI UNO DE ELLOS ES MULTIPLO DE 10 HACER UN DESCUENTO DEL 20% AL TOTAL

if ($precio1 % 10 xor $precio2 % 10) {
  $descuento1 = creaDescuento($precio1, $porcentaje);
  $descuento2 = creaDescuento($precio2, $porcentaje);
  $conDescuento1 = totConDescuento($precio1, $descuento1);
  $conDescuento2 = totConDescuento($precio2, $descuento2);
  $total = $conDescuento1 + $conDescuento2;
  echo "El coste total del pedido es: " . $total;
} else {
  echo "Al menos uno de los dos productos es múltiplo de 10";
  echo "<br/>";
}
?>
