<?php

require_once("../functions/authentication.php");
require_once("../../vendor/autoload.php");

use Dotenv\Dotenv;


$headers = getallheaders();
$path    = "../";
$dotenv = Dotenv::createImmutable($path);
$dotenv->load();


if( $_SERVER['REQUEST_METHOD'] === 'POST'){

$authHeader = isset($headers['Authorization'])?$headers['Authorization']:null;

if(strpos($authHeader,"Bearer ") === 0){

    $jwt = substr($authHeader, 7);
    $payload = JWTdecodeUser($jwt,$_ENV['SIGNATURE_KEY'],$_ENV['CIPHER_KEY']);

    
    if($payload->{'rol'} === "admin"){
        http_response_code(200);
        echo json_encode([
            'success' => true,
            'message' => "El usuario admin tiene acceso"
        ]);

    }else{

        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => "El usuario no tiene acceso."
        ]);

    }

}else{

    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => "Método no permitido."
    ]);

}

}

?>
