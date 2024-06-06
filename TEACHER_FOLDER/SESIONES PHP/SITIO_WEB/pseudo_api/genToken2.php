<?php

require_once("../functions/authentication.php");
require_once("../../vendor/autoload.php");

// este archivo recibe una petición con credenciales:
// nickname
// password
// generara y devolvera un token relacionado.
// las credenciales se enviaran como basic Authentication

//obtengo todos los datos del header
$headers = getallheaders();
$path    = "../";

//vamos pedirle al usuario ademas de las credenciales de acceso (nickname, password):
// mail
// rol

// aqui controlo que la petición me esta llegando a traves de POST
if( $_SERVER['REQUEST_METHOD'] === 'GET'){

//compruebo que en el header estan los datos que me debe enviar el cliente
$mail       = isset($_GET['mail'])?$_GET['mail']:null;
$rol        = isset($_GET['rol'])?$_GET['rol']:null;
$authHeader = isset($headers['Authorization'])?$headers['Authorization']:null;
// en Authorization devuelvo lo valores que le paso como Basic Auth
// ["Authorization"]=> string(26)            "Basic dXNlcnVzZXI6MTIzNA=="

$info = [];

//compruebo que la autorizacion que me llega es de tipo basic
if(strpos($authHeader,"Basic ") === 0){

    //obtengo la parte de la informacion de las credenciales codificada, va desde posición 6 al final.
    $encodeCredentials = substr($authHeader, 6);
    // decodifico las credenciales
    $decodeCredentials = base64_decode($encodeCredentials);
    //separar el nickanme y el password
    list($nickname, $password) = explode(":",$decodeCredentials,2);

    //pongo esa información en el array info
    $info['nickname'] = $nickname;
    $info['password'] = $password;
    $info['mail']     = $mail;
    $info['rol']      = $rol;


    if($nickname && $password && $rol && $mail){

        $jwt = newJWTCreation($info,$path);
        http_response_code(200);
        echo json_encode([
            'success' => true,
            'token'   => $jwt
        ]);

    }else{

        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => "Faltan párametros por inlcuir en la petición."
        ]);

    }

}else{
    //si el método no es POST devuelvo un error
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => "Método no permitido."
    ]);

}

}

?>
