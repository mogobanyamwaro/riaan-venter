<?php

require __DIR__ . "/vendor/autoload.php";

$client = new \GuzzleHttp\Client(['headers' => [
            'x-ev-store-hash' => '5f4bf66d-dddc-4fc3-b69d-d8aad1394682',
            'Content-Type' => 'application/json',
            'x-ev-customer-hash' => '3svBtWum1p67yvTI'
        ]]);
        $request_param = [
            'contacts'    => [[
                'contact_email' => 'douglasnyamwaro@gmail.com',
                'contact_name' => 'Douglas Nyamwaro',
                'contact_last_purchase_date' => '12763476',
                'contact_total_number_of_purchases' => 10,
                'contact_total_purchases_amount' => 10.00
            ], [
                'contact_email' => 'derrickyobesh@gmail.com',
                'contact_name' => 'derrick Yobesh',
                'contact_last_purchase_date' => '12763476',
                'contact_total_number_of_purchases' => 5,
                'contact_total_purchases_amount' => 50.38
            ]]
        ];
        $request_data = ($request_param);
        $response = $client->post('https://comms21.everlytic.net/servlet/e-commerce/sync', ['form_params' => $request_data]);

      var_dump((string)$response->getBody());