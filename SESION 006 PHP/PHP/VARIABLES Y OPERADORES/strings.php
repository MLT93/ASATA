<?php

// ? PARA CONCATENAR SE UTILIZA EL PUNTO "."

$cadena1 = "Mi nombre es ";
$cadena2 = "Pancho";

echo $cadena1 .= $cadena2;
echo "<br/>";

$dia = 16;

echo 'Hoy es día' . ' ' . $dia; // Las comillas simples no reconocen las variables
echo "Hoy es día $dia";
echo "<br/>";

?>
