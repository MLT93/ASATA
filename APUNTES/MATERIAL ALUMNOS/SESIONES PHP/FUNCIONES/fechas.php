<?php


//Transforma numeros de 1 digito a numeros de dos digitos.
function dosdigitos($numero){
    $numero = intval($numero);
    // if($numero<100  and !is_nan($numero)){
        if($numero<10){
            return "0$numero";
        }else{
            return "$numero";
        }
    // }
    // else{
    //     echo "El número es demasiado grande.";
    //     return "";
    // }
}



// $ahora = getdate();
// print_r($ahora);

// echo "<br/>";
// echo "Ahora es:<br/>";
// echo "El año ".$ahora['year'];echo "<br/>";
// echo "El mes ".$ahora['month'];echo "<br/>";
// echo "La hora ".$ahora['hours'];echo "<br/>";
// echo "Los minutos ".$ahora['minutes'];echo "<br/>";
// echo "Los segundos ".$ahora['seconds'];echo "<br/>";
// echo "El dia de la semana ".$ahora['weekday'];echo "<br/>";


function miFecha($fecha){

    $anio = $fecha["year"];
    $mes = dosdigitos($fecha["mon"]);
    $dia = dosdigitos($fecha["mday"]);

    $diaSem = $fecha["wday"];

    $hora = dosdigitos($fecha["hours"]);
    $min = dosdigitos($fecha["minutes"]);
    $seg = dosdigitos($fecha["seconds"]);

    $diaS = match($diaSem){
    0=>"DOM",
    1=>"LUN",
    2=>"MAR",
    3=>"MIE", 
    4=>"JUE",
    5=>"VIE",
    6=>"SAB",
    };

    return "[$anio-$mes-$dia] $diaS $hora:$min:$seg";

};

function miFechaTexto($fecha){

    $anio = $fecha["year"];
    $mes = $fecha["mon"];
    $dia = $fecha["mday"];

    $diaSem = $fecha["wday"];

    $hora = $fecha["hours"];
    $min = $fecha["minutes"];
    $seg = $fecha["seconds"];


    $diaS = match($diaSem){
        0=>"domingo",
        1=>"lunes",
        2=>"martes",
        3=>"miercoles", 
        4=>"jueves",
        5=>"viernes",
        6=>"sabado",
    };

    $mesESP = match($mes){
        1=>"Enero",
        2=>"Febrero",
        3=>"Marzo", 
        4=>"Abril",
        5=>"Mayo",
        6=>"Junio",
        7=>"Julio",
        8=>"Agosto",
        9=>"Septiembre", 
        10=>"Octubre",
        11=>"Noviembre",
        12=>"Diciembre",
    };


    return "Año $anio de $mesESP día $dia, $diaS a las $hora horas $min minutos y $seg segundos.";

}
// $ah = getdate();
// echo miFecha($ah);
// echo "<br/>";
// echo miFechaTexto($ah);

?>