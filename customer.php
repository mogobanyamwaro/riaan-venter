<?php

$json = '
{
"contacts":{
"1":{
"contact_email":"michael1@email.com",
"on_duplicate":"update",
"list_id":{"1":"subscribed"}
},
"2":{
"contact_email":"michael2@email.com",
"on_duplicate":"update",
"list_id":{"1":"subscribed"}
}
}
}
';
$url = 'https://comms21.everlytic.net/api/2.0/contacts/bulk';
$method = 'POST';
$cSession = curl_init();
$username = 'hugolinda99@hotmail.co.uk';
$apikey = 'h51RLzB49sCvjEtD1n3ObU8NGiUt3wtb_21';
$headers = array();
$auth = base64_encode($username . ':' . $apikey);
$headers[] = 'Authorization: Basic ' . $auth;
curl_setopt($cSession, CURLOPT_URL, $url);
curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cSession, CURLOPT_HEADER, false);
curl_setopt($cSession, CURLOPT_CUSTOMREQUEST, strtoupper($method));
curl_setopt($cSession, CURLOPT_POSTFIELDS, $json);
$headers[] = 'Content-Type: application/json';
curl_setopt($cSession, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($cSession);
curl_close($cSession);