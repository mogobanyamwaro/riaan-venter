<?php
define('DOMAIN_URL_PATH','https://f7c5-105-61-18-126.ngrok.io');
$array = array(
    'webhook'=>array(
        'topic'=>'products/create',
        'address'=>'',
        'format'=>'json',
    )
    );

$webhooks = shopify_call($access_token,$shop_url,"/admin/2021-10/webhooks.json",$array,'POST');
$webhooks = json_decode($webhooks['response'],true);

echo print_r($webhooks);