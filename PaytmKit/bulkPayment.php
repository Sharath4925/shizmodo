<?php
/**
* import checksum generation utility
* You can get this utility from https://developer.paytm.com/docs/checksum/
*/

require_once("encdec_paytm.php");

/* initialize an array */
$paytmParams = array();

/* Find Sub Wallet GUID in your Paytm Dashboard at https://dashboard.paytm.com */
$paytmParams["subwalletGuid"] = "YOUR_SUBWALLET_GUID";

/* Enter your order id which needs to be check disbursal status for */
$paytmParams["orderId"] = $POST["ORDERID"];

/* Enter Beneficiary Account Number in which the disbursal needs to be made */
$paytmParams["beneficiaryAccount"] = $_POST["ACC_NMBR"];

/* Enter Beneficiary's Bank IFSC Code */
$paytmParams["beneficiaryIFSC"] = $_POST["IFSC"];

/* Amount in INR to transfer */
$paytmParams["amount"] = $_POST["TXN_AMOUNT"];

/* Enter Purpose of transfer, possible values are: SALARY_DISBURSEMENT, REIMBURSEMENT, BONUS, INCENTIVE, OTHER */
$paytmParams["purpose"] = "PURPOSE";

/* Enter the date for which you wants to disburse the amount. Required if purpose is SALARY_DISBURSEMENT or REIMBURSEMENT */
$paytmParams["date"] = "2019-11-24";

/* prepare JSON string for request body */
$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

/**
* Generate checksum by parameters we have in body
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$checksum = getChecksumFromString($post_data, "m_Cz2Q1lLckcYQC2");

/* Find your MID in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys */
$x_mid = "KoCdrX05784724784722";

/* put generated checksum value here */
$x_checksum = $checksum;

/* for Staging */
$url = "https://staging-dashboard.paytm.com/bpay/api/v1/disburse/order/bank";

/* for Production */
// $url = "https://dashboard.paytm.com/bpay/api/v1/disburse/order/bank";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "x-mid: " . $x_mid, "x-checksum: " . $x_checksum)); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$response = curl_exec($ch);



