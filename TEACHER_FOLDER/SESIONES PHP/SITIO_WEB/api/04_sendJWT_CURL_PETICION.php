<?php

// Si como siempre se manda la información en el Header, entonces enviaré las credenciales por ahí codificadas en base64
$nickname = "pancho";
$password = "4321";

// Aplico la estructura para codificar las credenciales para mandarlas como Basic Authentication
$credentials = "$nickname:$password";

// Codifico las credenciales
$encodedCredentials = base64_encode($credentials);
// echo $encodedCredentials; //=> pancho:4321

// Inicio CURL y realizo la petición de tipo POST para crear el Token JWT y enviar las credenciales a través de Basic Authentication, y además otras variables en el Header/Body
// La respuesta devolverá un JSON
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'localhost/ASATA/TEACHER_FOLDER/SESIONES%20PHP/SITIO_WEB/api/02_genToken_GET.php?mail=pepito@mail.com&rol=client',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    "Authorization: Basic $encodedCredentials"
  ),
));

$response = curl_exec($curl);
// echo $response;

curl_close($curl);

// Decodifico el JSON que me devuelve la respuesta
$data = json_decode($response);
// var_dump($data);

// Accedo al Token
$tokenJWT = $data->{'token'}->{'jwt'};
// echo $tokenJWT;

// Inicio una nueva petición CURL para realizar una petición GET y obtener la información que procesa `03_checkToken_GET.php`
// La respuesta devolverá un JSON
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'localhost/ASATA/TEACHER_FOLDER/SESIONES%20PHP/SITIO_WEB/api/03_checkToken_GET.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer $tokenJWT" // Utilizo el Bearer Token generado con la primera petición
  ),
));

$response = curl_exec($curl);

curl_close($curl);

// Decodifico el JSON que me devuelve la respuesta
$data2 = json_decode($response);
var_dump($data2);
