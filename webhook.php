<?php

include_once("includes/shopify.php");
define('DOMAIN_URL_PATH','https://f7c5-105-61-18-126.ngrok.io');
$array = array(
    'webhook'=>array(
        'topic'=>'products/create',
        'address'=>'',
        'format'=>'json',
    )
    );

$shopify = new Shopify();

$webhooks = $shopify-> rest_api($access_token,$shop_url,"/admin/2021-10/webhooks.json",$array,'POST');
$webhooks = json_decode($webhooks['response'],true);

echo print_r($webhooks);