<?php

$nickname = "useruser";
$password = "1234";
$mail     = "usuario@mail.com";
$rol      = "client";

//ESTO ES LO QUE HACE BASIC
$credentials = $nickname.":".$password;
$encodeCredentials = base64_encode($credentials);


//AQUI EMPIEZA LA PRIMERA PETICION
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://127.0.0.1/PHP/SITIO_WEB/api/genToken.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_HTTPHEADER => array(
    'mail: '.$mail,
    'rol: '.$rol,
    'Authorization: Basic '.$encodeCredentials
  ),
));

$response = curl_exec($curl);
//AQUI TERMINA LA PRIMERA PETICION


$response = json_decode($response);
$jwt = $response->{'token'}->{'jwt'};


//AQUI EMPIEZA LA SEGUNDA PETICION
curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://127.0.0.1/PHP/SITIO_WEB/api/checkToken.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '.$jwt
  ),
));

$response = curl_exec($curl);
//AQUI TERMINA LA SEGUNDA PETICION



curl_close($curl);
echo $response;
?>