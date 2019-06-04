
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php
	if(isset($_POST['otp']) ){
		$otp = $_POST['otp'];
		$transfer_code = $_POST['transfer_code'];

			$curl = curl_init();

			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

			$post_otp = array('transfer_code' => $transfer_code, 'otp' => $otp);
			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.paystack.co/transfer/finalize_transfer",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => json_encode($post_otp),
			  CURLOPT_HTTPHEADER => array(
			    "Accept: */*",
			    "Authorization: Bearer sk_test_422f1ec39f7a1b61e536c77188ac24e79e3a596b",
			    "Cache-Control: no-cache",
			    "Connection: keep-alive",
			    "Content-Type: application/json",
			    "Host: api.paystack.co",
			    "Postman-Token: 1172eed7-cc8f-4dec-bc9e-315a40f32552,47c1bc0e-ed76-4f5c-a6d9-14b1c736d950",
			    "User-Agent: PostmanRuntime/7.13.0",
			    "accept-encoding: gzip, deflate",
			    "cache-control: no-cache",
			    "cookie: __cfduid=d098b6629f0b2a7bc17f826cb190197081559457317; sails.sid=s%3AEBQqcPjlwcojafXn_NZ8AhQ89FMkxDU8.rpm8EE9y3lX3anJmwr3O8JrGaJbqYJHHOc41SmysSOQ"
			  ),
			));

			$response = curl_exec($curl);
			$otp_response = json_decode($response, TRUE);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  if ($otp_response['data']['status'] == 'success'){
			  	echo "<h1> transfer Succesful </h1>";
			}

	}
}
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>