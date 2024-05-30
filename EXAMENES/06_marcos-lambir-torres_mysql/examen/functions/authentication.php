<?php

use Firebase\JWT\JWT as JWT;
use Firebase\JWT\Key as Key;
use Dotenv\Dotenv    as Dotenv;

//genera un token encriptado y firmado
function JWTCreation($info,$path){

 //las 2 siguientes lineas cargan el archivo .env para poder acceder a sus variables
 $dotenv = Dotenv::createImmutable($path); // Busco el directorio del archivo `.env`
 $dotenv->load();
 //clave secreta utilizo la variable de mia rchivo de entorno.
 $secretKey = $_ENV['SIGNATURE_KEY'];

 $iat = time();//fecha creacion
 $exp = $iat+3600;//fecha expiracion
 $sub = 1;
 $payload =[
    "iat"=>$iat,
    "exp"=>$exp,
    "sub"=>$sub,
    "username"=>$info['usuario'],
    "password"=>$info['password']
 ];

 //vamos a cifrar / encriptar el payload anterior

 //DEFINO EL METODO DE CIFRADO
 $metodoCifrado = "AES-128-CBC";
 //calculo longitud vector inicialización del cifrado
 $iv_longitud = openssl_cipher_iv_length($metodoCifrado);
 //creo el vector de inicialización como un string de bytes random 
 $iv = openssl_random_pseudo_bytes($iv_longitud);
 //encripto la informacion
 $payload_encriptado = openssl_encrypt(json_encode($payload),$metodoCifrado,$_ENV['CIPHER_KEY'],0,$iv);

 
 //tenemos el nuevo payload encriptado
 $nuevoPayload = array(
    "data"=>$payload_encriptado,
    "iv" => base64_encode($iv)
 );

 //codificamos ese payload en un token JWT
 $jwt = JWT::encode($nuevoPayload,$secretKey,"HS256");


 $jwtArray =[
  "jwt"=>$jwt,
  "exp"=>$exp
 ];

 return $jwtArray;

}

//este método decodifica y desencripta la información contenida en JWT y me devuelve el usuario
function JWTdecodeUser($jwt, $secretKey, $cipherKey){

   $metodoCifrado = "AES-128-CBC";
   //decodifico el jwt
   $jwtDecodificado = JWT::decode($jwt, new Key($secretKey,"HS256"));
   //desencripto el payload del jwt
   $payloadDesencriptado =  openssl_decrypt($jwtDecodificado->data,$metodoCifrado,$cipherKey,0,base64_decode($jwtDecodificado->iv));

   //obtengo el valor del usuario que hay en el token
   $pay =  json_decode($payloadDesencriptado);
   $userJWT = $pay->{'username'};

   return $userJWT;
}


function estadoAcceso($jwt, $secretKey, $cipherKey){

   try{
      
      $userJWT = JWTdecodeUser($jwt, $secretKey, $cipherKey);
      //compruebo que el mail que tengo en la session es igual que el mail que tengo en el token
      if($_SESSION['usuario'] == $userJWT){
         http_response_code(200);//OK
         return true;
      }else{
         http_response_code(401);//No autorizado.
         echo "<h2 class='card' >Acceso denegado. Token inválido / Sesión Incorrecta </h2>";echo "<br/>";
         return false;
      }

   }catch(Exception $exception){
      http_response_code(401);//No autorizado.
      echo "<h2 class='card' >Acceso denegado. El token es inválido</h2>";echo "<br/>";
      return false;
   }


}
?>
