<?php
require_once('vendor/autoload.php');
use Firebase\JWT\JWT;//LA Clase JWT
use Firebase\JWT\Key;//La clase Key


//clave secreta
$key_secreta ="clave_muysecreto";

if(isset($_COOKIE['jwt'])){

    try{
      
      $jwt = $_COOKIE['jwt'];
      JWT::decode($jwt, new Key($key_secreta, "HS256"));
      echo "<h1>El usuario tiene acceso a esta página.</h1>";
      
    } catch(Exception $exception){
        //si no se encuentra la cookie, muestro un error
        http_response_code(401);//No autorizado
        echo "<h1>Acceso denegado. El token es inválido.</h1>".$exception->getMessage() ;
    } 

}else{
    //si no se encuentra la cookie, muestro un error
    http_response_code(401);//No autorizado
    echo "<h1>Acceso denegado. No se ha proporcionado un token.</h1>";
}




?>