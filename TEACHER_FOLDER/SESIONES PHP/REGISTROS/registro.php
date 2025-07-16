<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>REGISTRAR</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">  
</head>

<body>
<header></header>

<h1>REGISTRO</h1>

<?php

if(isset($_REQUEST['enviar']) ){

    //aqui compruebo si el archivo al subirse al servidor ha tenido algun error
    if( $_FILES['archivo']['error'] > 0 ){
        echo "Ha ocurrido un error al subir el archivo".$_FILES['archivo'];
    }else{

        //compruebo si el archivo es válido
        $extension = $_FILES['archivo']['type'];

        if( strstr($extension, "jpeg") =="jpeg" ||
            strstr($extension, "gif") =="gif" ||
            strstr($extension, "png") =="png" 
        ){

            $origen = $_FILES['archivo']['tmp_name'];
            $destino = "../uploaded_img/".date('Y.m.d')."-".$_FILES['archivo']['name'];

            //copio el archivo del directorio temporal a mi directoriod e destino
            copy($origen,$destino);
            echo "has subido la imagen al servidor";

        }else{
            echo "EL ARCHIVO NO TIENE LA EXTENSÓN ADECUADA.";
        }
    }

    
    //****************************************
    //ESCRIBO UN LOG DE registros/subidas de imagenes en mi servidor
    
    $fichero = fopen("registros.txt","a+");

    $fecha = "\r\nFECHA: ".date('Y.m.d');
    $usuario = "\r\nUSUARIO: ".$_REQUEST['usuario'];
    $nombreImg = "\r\nNOMBRE IMAGEN: ".$_FILES['archivo']['name'];
    $txtOrigen = "\r\nORIGEN: ".$_FILES['archivo']['tmp_name'];
    $txtDestino = "\r\nDESTINO: "."../uploaded_img/".date('Y.m.d')."-".$_FILES['archivo']['name'];
    $separador= "\r\n"."****************************************************************";


    $registroTxt = $fecha.$usuario.$nombreImg.$txtOrigen.$txtDestino.$separador;

    fputs($fichero,$registroTxt);
    fclose($fichero);
    echo "<br/>Registro imagen realizado.";
    
    echo "<img alt='imge' src=".'../uploaded_img/'.date('Y.m.d')."-".$_FILES['archivo']['name']." />" ;


}


?>


</body>


</html>
