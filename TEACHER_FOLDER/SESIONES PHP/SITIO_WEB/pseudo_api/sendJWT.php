<?php

require_once("../functions/authentication.php");
require_once("../../vendor/autoload.php");

use Dotenv\Dotenv as Dotenv;

$path = "../";
$dotenv = Dotenv::createImmutable($path);
$dotenv->load();

$info = [];
$info['nickname'] = "useruser";
$info['password'] = "1234";
$info['mail']     = "usuario@mail.com";;
$info['rol']      = "admin";

$token = newJWTCreation($info,$path);


$curl = curl_init();

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
    'Authorization: Bearer '.$token['jwt']
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>