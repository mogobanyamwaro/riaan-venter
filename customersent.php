
    <?php

include_once("includes/shopify.php");

$shopify = new Shopify();

$shopify->set_url('ihb-specialists.myshopify.com');
$shopify->set_apikey('805cc007ed98af5dd76952ff92d42eed');
$shopify->set_password('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');

$customers = $shopify-> rest_api('/admin/api/2021-10/customers.json',array(),'GET');
$customers = json_decode($customers['body'],true);

echo print_r($customers['customers'][4]['addresses'][0]['phone']);
//  echo "<br>";
// echo print_r($customers['customers'][4]['total_spent']);
// echo "<br>";
// echo print_r($customers['customers'][4]['updated_at']);
// echo "<br>";
// echo print_r($customers['customers'][4]['orders_count']);
// echo "<br>";
// echo print_r($customers['customers'][4]['addresses'][0]['name']);
// echo "<br>";


$email = $customers['customers'][6]['email'];
$total_spent = $customers['customers'][6]['total_spent'];
$updated_at = $customers['customers'][6]['updated_at'];
$order_count = $customers['customers'][6]['orders_count'];
$name = $customers['customers'][6]['addresses'][0]['name'];
$phone = $customers['customers'][6]['addresses'][0]['phone'];

require __DIR__ . "/vendor/autoload.php";

$client = new \GuzzleHttp\Client(['headers' => [
            'x-ev-store-hash' => '5f4bf66d-dddc-4fc3-b69d-d8aad1394682',
            'Content-Type' => 'application/json',
            'x-ev-customer-hash' => '3svBtWum1p67yvTI'
        ]]);
        $request_param = [
            'contacts'    => [[
                'contact_email' => $email,
                'contact_mobile'=>$phone,
                'contact_name' => $name,
                'contact_last_purchase_date' =>$updated_at,
                'contact_total_number_of_purchases' => $order_count,
                'contact_total_purchases_amount' =>$total_spent,
            ]]
        ];
        $request_data = ($request_param);
        $response = $client->post('https://comms21.everlytic.net/servlet/e-commerce/sync', ['form_params' => $request_data]);

      var_dump((string)$response->getBody());

?>
