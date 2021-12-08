<?php
define('SHOPIFY_APP_SECRET_KEY','JOIDEWIO');

function verify_request($data,$hmac){
    $verify_hmac = base64_decode(hash_hmac('sha256',$data,SHOPIFY_APP_SECRET_KEY,true));
    return hash_equals($hmac,$verify_hmac);
}

$my_hmac = $_SERVER['HTTP_X_SHOPIFY_HMAC_SHA256'];
$response = '';
$data = file_get_contents('php://input');
$utf8 = utf8_encode($data);
$data_json = json_decode($utf8,true);
$verify_merchant = verify_request($data,$my_hmac);

if($verify_merchant){
    $response = $data_json;
}else{
    $response = 'This is not from Shopify';
}
$shop_domain = $_SERVER['X_SHOPIFY_SHOP_DOMAIN'];
$log = fopen($shop_domain . ".json","w") or die("cannot open or create this file");
fwrite($log,json_encode($response));
fclose($log);