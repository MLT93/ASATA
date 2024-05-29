<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api-m.sandbox.paypal.com/v1/payments/payouts/GLDLQDDRVWBQQ', // Este endpoint figura de la siguiente forma en Postman: '{{url_base}}/v1/payments/payouts/:payout_batch_id' donde ':payout_batch_id' es una variable de enrutamiento (patch variable). Se reconoce en las páginas porque se escribe así: 'https://api-m.sandbox.paypal.com/v1/payments/payouts/:payout_batch_id'
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Bearer A21AAJiGiGrvaeSeVNEcmC24Wn1Da0xE7-2kEIO5dKQfxH6KGWjAXPV7vS-l3wwb-ZLqIbpgIOCbBBw8-__5aGTBkaT0nybaQ'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

// Aunque sea un GET, y por lo tanto no necesita un Body, siempre he de pasarle las credenciales y el tipo de datos (Authorization & Content-Type)
// Esto devolverá la información de un Batch que haya creado. Recuerda que debes pasarle el ':id' del Batch creado para que lo encuentre y lo devuelva
