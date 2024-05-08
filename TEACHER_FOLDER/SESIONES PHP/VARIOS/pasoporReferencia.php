<?php

function sumarCinco(&$numero){
    $numero = $numero +5 ;
    echo "Valor dentro de la función es: $numero\n";
    echo "<br/>";
}


//el código que se ejecuta
$valorOriginal = 10;
sumarCinco($valorOriginal);
echo "Valor fuera de la función es: $valorOriginal\n";
echo "<br/>";



?>