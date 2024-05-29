<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api-m.sandbox.paypal.com/v2/invoicing/invoices',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => '{
    "detail": {
        "currency_code": "USD",
        "invoice_number": "#123",
        "reference": "deal-ref",
        "invoice_date": "2018-11-12",
        "note": "Thank you for your business.",
        "term": "No refunds after 30 days.",
        "memo": "This is a long contract",
        "payment_term": {
            "term_type": "NET_10",
            "due_date": "2018-11-22"
        }
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
