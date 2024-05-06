<?php

include("fechas.php");



function tabla($f,$c){

    echo "<table border = 1 cellspacing = 0 >";
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



function tablaMultiplicar(){

    echo "<table border=1 cellspacing=0>";
    echo "<tr>";
    for($i=0;$i<=10;$i++){
        if($i!=0){
            echo "<th>$i</th>"; 
        }else{
            echo "<th></th>";
        }
    }
    echo "</tr>";


    for($i=1;$i<=10;$i++){//genera filas;
        echo "<tr>";
        for($j=0;$j<=10;$j++){
            if($j!=0){
                echo "<td>".$i*$j."</td>";
            }else{
                echo "<td>".$i."</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";

}



function tablaConDatos($titulos, $data){
    echo "<table border=1 cellspacing=0>";
    echo "<tr>";
    for($columna=0;$columna<count($titulos);$columna++){
        echo "<th>".$titulos[$columna]."</th>";
    }
    echo "</tr>";
    registrosTablasDatos($data);
    echo "</table>";
}


function registrosTablasDatos($data){//$data es un matriz  (array de arrays)
    for($fila=0; $fila<count($data); $fila++ ){
        echo "<tr>";
        for($columna=0; $columna<count($data[$fila]); $columna++){
            echo "<td>".$data[$fila][$columna]."</td>";
        }
        echo "</tr>";
    }

}


?>