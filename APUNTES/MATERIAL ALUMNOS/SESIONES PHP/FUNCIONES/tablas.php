<?php

include("funciones_de_fechas.php");



function tabla($f,$c){

    echo "<table border =  cellspacing = 0 >";
    for ($i=1; $i<=$f; $i++){//recorrer el numero de filas que le paso en $f
        echo "<tr>";
        $fila = dosdigitos($i);
        for ($j=1; $j<=$c; $j++){//recorrer el numero de columnas que le paso en $c
            $columna = dosdigitos($j);
            echo "<td>F $fila <br/>C  $columna  </td>";
        }
        echo "</tr>";
    };
    echo "</table>";
}


function registrosTabla($f,$c){

    for ($i=1; $i<=$f; $i++){//recorrer el numero de filas que le paso en $f
        echo "<tr>";
        $fila = dosdigitos($i);
        for ($j=1; $j<=$c; $j++){//recorrer el numero de columnas que le paso en $c
            $columna = dosdigitos($j);
            echo "<td>F $fila <br/>C  $columna  </td>";
        }
        echo "</tr>";
    };

}


function tablaConTitulos($titulos,$nregistros){

    echo "<table border=1 cellspacing=0 >";
    echo "<tr>";
    for ($i=0; $i<count($titulos);$i++){
        echo "<th>$titulos[$i]</th>";
    }
    echo "</tr>";
    registrosTabla($nregistros,count($titulos));
    echo "</table>";
}


?>
