<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Merchant Check Out Page</title>
<meta name="GENERATOR" content="Evrsoft First Page">
</head>
<body>
	<h1>Merchant Check Out Page</h1>
	<pre>
	</pre>
	<form method="post" action="pgRedirect.php">
		<table border="1">
			<tbody>
				
				<tr>
					
					<td><label>TxnAmount* </label></td>
					<td><input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="1">
					</td>

				</tr>
<tr>
<td><label>Account Number* </label></td>
<td><input type="text" name="ACC_NMBR" required></td>
</tr>
<tr>
<td><label>IFSC* </label></td>
<td><input type="text" name="IFSC" required></td>
</tr>
<tr>
<td><label>Full Name* </label></td>
<td><input type="text" name="FULL_NAME" required></td>
</tr>
<tr>
<td><label>Email* </label></td>
<td><input type="email" name="EMAIL" required></td>
</tr>
<tr>
<td><label>Phone Number* </label></td>
<td><input type="tel" name="PH_NMBR" required></td>
</tr>
				<tr>
					<td></td>
					<td><input value="CheckOut" type="submit"	onclick=""></td>

				</tr>
			</tbody>
		</table>
		* - Mandatory Fields
	</form>
</body>
</html>
