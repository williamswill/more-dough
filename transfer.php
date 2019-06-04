<!DOCTYPE html>
<html>
<head>
	<title>Transfer</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php
	$r_code = $_SERVER['QUERY_STRING'];

	if(isset($_POST['amount'])){
	$amount = $_POST['amount'];
	$amount = $amount * 100;
	$curl = curl_init();

curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

$post_body = array('source' => 'balance', 'resaon' => 'money fall on you', 'amount' => $amount, 'recipient' => $r_code);

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transfer",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($post_body),
  CURLOPT_HTTPHEADER => array(
    "Accept: */*",
    "Authorization: Bearer sk_test_422f1ec39f7a1b61e536c77188ac24e79e3a596b",
    "Cache-Control: no-cache",
    "Connection: keep-alive",
    "Content-Type: application/json",
    "Host: api.paystack.co",
    "Postman-Token: c3412ef3-504c-43fd-9807-4e82d35f37b7,a6ea27b7-f4c5-4bf0-93d3-5d4d481e5d66",
    "User-Agent: PostmanRuntime/7.13.0",
    "accept-encoding: gzip, deflate",
    "cache-control: no-cache",
    "cookie: __cfduid=d098b6629f0b2a7bc17f826cb190197081559457317; sails.sid=s%3A5walk7SI54sbzIpYESvgCC4USAijOKGo.m%2BZIVopWxbJgAT7HQ06%2BoFdKr0zdRnnEawQsReVpT7Y"
  ),
));

$response = curl_exec($curl);
$transfer_response = json_decode($response, TRUE);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $transfer_code = $transfer_response['data']['transfer_code'];
 ?>
 <div class="container py-4">
 	<form action="final.php" method="post">
 		<div class="form-group">
				<label for="otp"> Enter OTP sent to you to confirm this transfer: </label>
				<input type="text" name="otp" id="otp">
				<input type="hidden" name="transfer_code" value="<?php echo $transfer_code; ?>">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
 	</form>
 </div>
<?php } } ?>
<div class="container p-4">
	<form action="" method="post">
			<div class="form-group">
				<label for="account_number"> Enter Amount to transfer: </label>
				<input type="text" name="amount" id="amount">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>