<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api-m.sandbox.paypal.com/v1/oauth2/token',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'grant_type=client_credentials',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded', // Es indiferente que sea 'x-www-form-urlencoded' o 'json'. Es sólo porque es más cómodo generar el token en Postman con 'x-www-form-urlencoded' que con 'json'
    'Authorization: Basic QVE3QkM4emJOQ0ZYcExwbVdPTjBENVpZdjZSelZGVEhpOVJMLWp0U3NfWUlzRUVsTU9JbFRJMU5sOFBDQjd1VEJSTVlld1NXdmdKZWRrSjY6RUhZMVRuZWN6bE5MVHdTUXBMdlYzSElXMGZLNm9KRjR4WG4zN0xOOFF2LW9EMk5qOFFoM1lnZVowTEM3N2l6ZDZsakdfYVFHMDduT3p1TG0='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
