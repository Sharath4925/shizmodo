<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");


$checkSum = "";
$paramList = array();
$time=time();
$date=date("Ymd");
$ORDER_ID = "ORDS" . $date . $time . rand(10000,99999999);
$CUST_ID = "CUST" .rand(10000,99999999) . $date . $time . rand(10000,99999999);
$INDUSTRY_TYPE_ID = "Retail";
$CHANNEL_ID = "WEB";
$TXN_AMOUNT = $_POST["TXN_AMOUNT"];
$EMAIL= $_POST["EMAIL"];
$ACC_NMBR= $_POST["ACC_NMBR"];
$IFSC= $_POST["IFSC"];
$PH_NMBR= $_POST["PH_NMBR"];
$NAME=$_POST["FULL_NAME"];

// Create an array having all required parameters for creating checksum.
$paramList["MID"] = "srauxY48529306435177";
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $CUST_ID;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
$paramList["WEBSITE"] = "DEFAULT";
$paramList["CALLBACK_URL"] = "http://localhost/PaytmKit/pgResponse.php";
$paramList["EMAIL"] = $EMAIL; //Email ID of customer
echo("Clear");
/*

$paramList["MSISDN"] = $MSISDN; //Mobile number of customer

$paramList["VERIFIED_BY"] = "EMAIL"; //
$paramList["IS_USER_VERIFIED"] = "YES"; //

*/



$dbData=$_POST;




//Here checksum string will return by getChecksumFromArray() function.
$checkSum = getChecksumFromArray($paramList,"EcHvkdNHuPOP&p#H");

?>
<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>
