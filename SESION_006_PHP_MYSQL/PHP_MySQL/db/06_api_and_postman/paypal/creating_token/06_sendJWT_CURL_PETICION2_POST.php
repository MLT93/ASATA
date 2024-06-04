<?php

require_once("../functions/authentication.php");
require_once("../../vendor/autoload.php");

$dotenv = Dotenv\Dotenv::createImmutable("../");
$dotenv->load();

$info = [];
$info['nickname'] = "useruser";
$info['password'] = "1234";
$info['mail']     = "usuario@mail.com";;
$info['rol']      = "admin";

$token = newJWTCreation($info, $path);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'localhost/ASATA/TEACHER_FOLDER/SESIONES%20PHP/SITIO_WEB/api/01_genToken_POST.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer ' . $token['jwt']
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;

$data = json_decode($response);
echo $data;
