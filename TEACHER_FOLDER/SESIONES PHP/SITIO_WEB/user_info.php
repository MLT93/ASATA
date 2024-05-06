<!DOCTYPE html>
<html>
<head>
 <meta charset="utf8"/>
 <meta name="author" content="DMA"/>
 <meta name="description" content="LOGIN "/>
 <meta name="keywords" content="cursos, formación, desarrollo software"/>
 <title>USER INFO</title>     
 <link href="./css/styles.css" rel="stylesheet" type="text/css" />
</head>


<body>

<?php
//activar el almacenamiento en búfer de salida. Esto recoge toda la salida del script hasta que decidas enviarla al navegador, permitiendo modificar las cabeceras en cualquier momento del script. 
 ob_start();
 //inicio una sesion
 session_start();

 //cabecera y nav
 require_once("./html_modules/header.php");
 require_once("./html_modules/nav.php");

 //incluir el autoloader del composer
 require_once("../vendor/autoload.php");
 use Firebase\JWT\JWT;
 use Firebase\JWT\Key;

 $dotenv = Dotenv\Dotenv::createImmutable("./");
 $dotenv->load();
 //clave secreta
 $key_secreta = $_ENV['SIGNATURE_KEY'];


 if(isset($_COOKIE['jwt'])){

  try{
   $jwt = $_COOKIE['jwt'];
   $metodoCifrado = "AES-128-CBC";
   //decodifico el jwt
   $jwtDecodificado = JWT::decode($jwt, new Key($key_secreta,"HS256"));
   //desencripto el payload del jwt
   $payloadDesencriptado =  openssl_decrypt($jwtDecodificado->data,$metodoCifrado,$_ENV['CIPHER_KEY'],0,base64_decode($jwtDecodificado->iv));

   http_response_code(200);//OK
   echo "<p>El usuario tiene acceso a esta página.</p>";
  }catch(Exception $exception){
   http_response_code(401);//No autorizado.
   echo "<h2 class='card' >Acceso denegado. El token es inválido</h2>";echo "<br/>";
  }

 }else{
  http_response_code(401);//No autorizado.
  echo "<h2 class='card' >Acceso denegado. No se ha proporciOnado un Token.</h2>";echo "<br/>";
 }
 require("./html_modules/footer.php");

 ?>
 
 </body>

</html>