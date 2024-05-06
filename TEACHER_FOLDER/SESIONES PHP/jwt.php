<?php

//incluir el autoloader del composer
require_once("vendor/autoload.php");

use Firebase\JWT\JWT;

//clave secreta
$key_secreta ="clave_muysecreta";


//informacionde usuario que viene de mi BD
$userData = [
    'id'=>123,
    "username" => "usuario1",
    "email" =>"usuario@ejemplo.com"
];


//creo el payload con mis datos a encriptar
$iat = time();
$exp = $iat + 3600 ;//el token expira tras una hora; dura 3600 segundos
$sub = $userData['id'];
$user = $userData['username'];


$payload =[
    "iat"=>$iat,//fecha de creacion
    "exp"=>$exp,//fecha de expiracion
    "sub"=>$sub,//sujeto del token
    "username"=>$user
];


//codifico en el token JWT el payload (es decir, los datos)
$jwt = JWT::encode($payload,$key_secreta,"HS256");

//meto JWT en una cookie
setcookie("jwt",$jwt,$exp,"/");

echo "TOKEN enviado al usuario $user"

?>