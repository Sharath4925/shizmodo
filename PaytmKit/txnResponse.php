<?php
/**
* import checksum generation utility
* You can get this utility from https://developer.paytm.com/docs/checksum/
*/
require_once("lib/encdec_paytm.php");

/* initialize an array */
$paytmParams = array();

/* Find your MID in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys */
$paytmParams["MID"] = "srauxY48529306435177";

/* Enter your order id which needs to be check status for */
$paytmParams["ORDERID"] = $_POST["ORDERID"];

/**
* Generate checksum by parameters we have
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$checksum = getChecksumFromArray($paytmParams, "EcHvkdNHuPOP&p#H");

/* put generated checksum value here */
$paytmParams["CHECKSUMHASH"] = $checksum;

/* prepare JSON string for request */
$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

/* for Staging */
//$url = "https://securegw-stage.paytm.in/order/status";

/* for Production */
 $url = "https://securegw.paytm.in/order/status";
//$url="https://securegw.paytm.in/order/process";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));  
$response = curl_exec($ch);


echo $response[4];

$tmp_response=$response;
$dbData=json_decode($tmp_response);







