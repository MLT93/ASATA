<?php

require_once("../../../../../vendor/autoload.php");

use GuzzleHttp\Client;

// * Realizo petición a la API paypal para generar el access_token a través del user y password de la API. Esta info es enviada a través del Header con Basic Auth
$client = new Client();

$clientID = 'AQ7BC8zbNCFXpLpmWON0D5ZYv6RzVFTHi9RL-jtSs_YIsEElMOIlTI1Nl8PCB7uTBRMYewSWvgJedkJ6';
$clientSECRET = 'EHY1TneczlNLTwSQpLvV3HIW0fK6oJF4xXn37LN8Qv-oD2Nj8Qh3YgeZ0LC77izd6ljG_aQG07nOzuLm';

// Aplico la estructura para codificar las credenciales para mandarlas como Basic Authentication
// Codifico las credenciales en base64
$credentials = $clientID . ":" . $clientSECRET;
$encodeCredentials = base64_encode($credentials);

// Definir Headers en un array
$headers = [
  'Content-Type' => 'application/x-www-form-urlencode', // Al utilizar `x-www-form-urlencode` hay que pasar en el array `options` el `form_params => []` 
  'Authorization' => 'Basic ' . $encodeCredentials
];

// Juntar todo (si hubiese también un Body, lo juntaríamos en `$options`)
$options = [
  'form_params' => [
    'grant_type' => 'client_credentials',
    'ignoreCache' => 'true'
  ],
  'headers' => $headers
];

$URL = 'https://api-m.sandbox.paypal.com/v1/oauth2/token';

// Genero la petición
$response = $client->request('POST', $URL, $options);

$data = $response->getBody();

$data = json_decode($data);

$access_token = $data->{'access_token'}; // Aquí conseguimos el `access_token`. Para hacerlo bien, este token se guardaría en una cookie para tenerlo disponible en la página web y lo guardaríamos en una base de datos con la fecha de caducidad. De este modo, podríamos manejar el token adecuadamente

echo $access_token;
