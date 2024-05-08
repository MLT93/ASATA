<?php
// var_dump($_REQUEST);
if(  
    isset($_REQUEST["nombre"])  &&  
    isset($_REQUEST['apellido']) &&  
    isset($_REQUEST['curso'])  &&  
    isset($_REQUEST['ciudad']) &&
    isset($_REQUEST['nivel'])   
){


    echo "Hola ". $_REQUEST["nombre"]." ".$_REQUEST["apellido"]." tu nivel de estudios es  ".$_REQUEST['nivel'];echo "<br/>";
    echo "La ciudad que has escogido es: ".$_REQUEST["ciudad"];echo "<br/>";
    // echo "Hola ". $_POST["nombre"]." tu nivel de estudios es  ".$_POST['nivel'];echo "<br/>";
    // echo "Hola ". $_GET["nombre"]." tu nivel de estudios es  ".$_GET['nivel'];echo "<br/>";

    $nombreCurso="";
    if($_REQUEST['curso'] == "web"){
        $nombreCurso = "Curso de programación Web";
    }
    if($_REQUEST['curso'] == "bd"){
        $nombreCurso = "Curso de bases de datos";
    }    
    if($_REQUEST['curso'] == "html"){
        $nombreCurso = "Curso de HTML";
    }
    if($_REQUEST['curso'] == "cocina"){
        $nombreCurso = "Curso de cocina";
    }
    if($_REQUEST['curso'] == "finanzas"){
        $nombreCurso = "Curso de Analisis financiero";
    }

    echo "El curso escogido es ".$nombreCurso;echo "<br/>";


//voy a abrir el archivo de texto para escribir en él.
    $fichero = fopen("log_matricula.txt","a+");
//ahora vamos a escirbir en el fichero
    $linea1 = "\r\nHola ". $_REQUEST["nombre"]." ".$_REQUEST["apellido"]." tu nivel de estudios es  ".$_REQUEST['nivel']."\r\n";
    $linea2 = "La ciudad que has escogido es: ".$_REQUEST["ciudad"]."\r\n";
    $linea3 = "El curso escogido es ".$nombreCurso."\r\n\r\n";

    //escribimos el fichero
    $registro = $linea1.$linea2.$linea3;
    fwrite($fichero, $registro);

    //cerramos el fichero
    fclose($fichero);


echo "<br/><br/>********************************************************************<br/><br/>";
echo "<h2>Informacion Log</h2>";

$fich = fopen("log_matricula.txt","r");
while (  !feof($fich)  ){//esta condicion me asegura que no estoy al finald el archivo

    echo fgets($fich);echo"<br/>";
}
fclose($fich);


}


?>