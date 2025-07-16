<?php

$diaSemana = "4";
// 0 es domingo
// 1 es lunes
// 2 es martes
// 3 es miercoles
// 4 es jueves
// 5 es viernes
// 6 es Sábado

switch($diaSemana){ //EVALUA VALOR Y PARSEA TIPO DE DATO
    case 0:
        echo "Hoy es domingo";
        break;
    case 1:
        echo "Hoy es lunes";
        break;
    case 2:
        echo "Hoy es martes";
        break;
    case 3:
        echo "Hoy es miercoles";
        break;
    case 4:
        echo "Hoy es jueves";
        break;
    case 5:
        echo "Hoy es viernes";
        break;
    case 6:
        echo "Hoy es sabado";
        break;
    default:
        echo "El dia de la semana no es correcto.";
}

echo "<br/>";

//match EVALUA VALOR Y TIPO DE DATO

echo match($diaSemana){
0 => "Hoy es domingo",
1 => "Hoy es lunes",
2 => "Hoy es martes",
3 => "Hoy es miercoles",
4 => "Hoy es jueves",
5 => "Hoy es viernes",
6 => "Hoy es sabado",
default => "El dia de la semana no es correcto.",
};



$numerodeCamas = 0;

echo match($numerodeCamas){
1 => "La habitación es de una cama.",
2 => "La habitación es de dos camas.",
3 => "La habitación es de tres camas.",
4 => "La habitación es de cuatro camas.",
5 => "La habitación es de cinco camas.",
6 => "La habitación es de seis camas.",
default => "No hay habitaciones con ese número de cmas.",
};
    

?>