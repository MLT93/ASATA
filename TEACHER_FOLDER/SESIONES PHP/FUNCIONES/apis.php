<?php


function GET($endpoint){

    //INICIAMOS CURL
    //genera la estructura con la que me voy a comunicar
    $ch = curl_init();

    //CONFIGURAMOS CH
    //1 etructura de comunicaicon
    //2 parametro a setear
    //3 valor del parametro
    curl_setopt($ch,CURLOPT_URL,$endpoint);

    //1 eStructura de comunicaicon
    //2 parametro a setear
    //3 valor del parametro
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    //Devuelve el valor como string;

    //EJECUTAMOS CH
    $result = curl_exec($ch);
    //convierto a variable el sting en formato JSON;
    $result = json_decode($result, true);


    //CIERRO CURL
    curl_close($ch);

    return $result;

}



?>