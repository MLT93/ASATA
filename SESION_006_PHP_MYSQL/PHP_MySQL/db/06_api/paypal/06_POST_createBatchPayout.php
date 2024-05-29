<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api-m.sandbox.paypal.com/v1/payments/payouts',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => '{
    "items": [
        {
            "receiver": "receiver@example.com",
            "amount": {
                "currency": "USD",
                "value": "9.87"
            },
            "recipient_type": "EMAIL",
            "note": "Thanks for your patronage!",
            "sender_item_id": "201403140001"
        }
    ],
    "sender_batch_header": {
        "sender_batch_id": "Payouts_2020_100007",
        "email_subject": "You have a payout!",
        "email_message": "You have received a payout! Thanks for using our service!"
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Bearer A21AAJiGiGrvaeSeVNEcmC24Wn1Da0xE7-2kEIO5dKQfxH6KGWjAXPV7vS-l3wwb-ZLqIbpgIOCbBBw8-__5aGTBkaT0nybaQ'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
