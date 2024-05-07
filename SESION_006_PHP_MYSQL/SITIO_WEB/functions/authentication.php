<?php

use Firebase\JWT\JWT;

function JWTCreation($info, $path){

 //las 2 siguientes lineas cargan el archivo .env para poder acceder a sus variables
 $dotenv = Dotenv\Dotenv::createImmutable($path);
 $dotenv->load();
 //clave secreta utilizo la variable de mia archivo de entorno.
 $key_secreta = $_ENV['SIGNATURE_KEY'];

 $iat = time();
 $exp = $iat+3600;
 $sub = 1;
 $payload =[
     "iat"=>$iat,
     "exp"=>$exp,
     "sub"=>$sub,
     "username"=>$info['nombre'],
     "password"=>$info['password']
 ];

 //vamos a cifrar / encriptar el payload anterior
 //DEFINO EL METODO DE CIFRADO
 $metodoCifrado = "AES-128-CBC";
 //calculo longitud vector inicialización del cifrado
 $iv_longitud = openssl_cipher_iv_length($metodoCifrado);
 //creo el vector de inicialización como un string de bytes random 
 $iv = openssl_random_pseudo_bytes($iv_longitud);
 //encripto la información
 $payload_encriptado = openssl_encrypt(json_encode($payload),$metodoCifrado,$_ENV['CIPHER_KEY'],0,$iv);

 //tenemos el nuevo payload encriptado
 $nuevoPayload = array(
     "data"=>$payload_encriptado,
     "iv" => base64_encode($iv)
 );

 //codificamos ese payload en un token JWT
 $jwt = JWT::encode($nuevoPayload,$key_secreta,"HS256");

 
 $jwtArray =[
  "jwt"=>$jwt,
  "exp"=>$exp
 ];

 return $jwtArray;

}


?>
