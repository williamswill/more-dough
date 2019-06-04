<?php

// $curl = curl_init();
// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);


// $post_arr = array('type' => 'nuban', 'name' => 'Williams Emmanuel', 'description' => 'New API', 'account_number' => '0766307230', 'bank_code' => '044', 'currency' => 'NGN');


// curl_setopt_array($curl, array(
//   CURLOPT_URL => "https://api.paystack.co/transferrecipient",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => "",
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "POST",
//   CURLOPT_POSTFIELDS => json_encode($post_arr),
//   CURLOPT_HTTPHEADER => array(
//     "Accept: */*",
//     "Authorization: Bearer sk_test_422f1ec39f7a1b61e536c77188ac24e79e3a596b",
//     "Cache-Control: no-cache",
//     "Connection: keep-alive",
//     "Content-Type: application/json",
//     "Host: api.paystack.co",
//     "Postman-Token: 83c77587-d266-4110-8614-869bb4bd7902,c6c5a974-d870-47bc-aca2-3188d55ad3fb",
//     "User-Agent: PostmanRuntime/7.13.0",
//     "accept-encoding: gzip, deflate",
//     "cache-control: no-cache",
//     "cookie: __cfduid=d098b6629f0b2a7bc17f826cb190197081559457317; sails.sid=s%3AAEb4Wlmv4JaDumDR60QcnR9UckWp1kSU.y%2FHDI2BmrheSvs6sYfQfTqoGrxy1EdihAJiBkK8jang"
//   ),
// ));

// $response = curl_exec($curl);
// $de_response = json_decode($response, true);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
//   echo "cURL Error #:" . $err;
// } else {
//   echo var_dump($de_response);

// }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Add New Supplier</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
	<div class="container">
		<h1>Enter New Supplier</h1>
	</div>
	<div class="container">
		<form action="">
			<div class="form-group">
				<label for="supplier_name"> Enter Name: </label>
				<input type="text" name="supplier_name" id="supplier_name">
			</div>
			<div class="form-group">
				<label for="description"> Enter Description: </label>
				<input type="text" name="description" id="description">
			</div>
			<div class="form-group">
				<label for="account_number"> Enter Account Number: </label>
				<input type="text" name="account_number" id="account_number">
			</div>
			<div class="form-group">
					<label for="banks"> Enter Bank</label>
				  	<select name="banks" class="custom-select">
				  	<?php
				  		$curl = curl_init();
						curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
						curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

						curl_setopt_array($curl, array(
						  CURLOPT_URL => "https://api.paystack.co/bank",
						  CURLOPT_RETURNTRANSFER => true,
						  CURLOPT_ENCODING => "",
						  CURLOPT_MAXREDIRS => 10,
						  CURLOPT_TIMEOUT => 30,
						  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						  CURLOPT_CUSTOMREQUEST => "GET",
						  CURLOPT_HTTPHEADER => array(
						    "Accept: */*",
						    "Authorization: Bearer sk_test_422f1ec39f7a1b61e536c77188ac24e79e3a596b",
						    "Cache-Control: no-cache",
						    "Connection: keep-alive",
						    "Host: api.paystack.co",
						    "Postman-Token: ca71bbad-f82f-4099-9cf6-77a420656c6b,5e44304c-e85c-4e39-a6a0-4eabb5310cef",
						    "User-Agent: PostmanRuntime/7.13.0",
						    "accept-encoding: gzip, deflate",
						    "cache-control: no-cache",
						    "cookie: __cfduid=d098b6629f0b2a7bc17f826cb190197081559457317; sails.sid=s%3AnoB8rDKHACqLi1YpTJgKeuJDIcmeCess.3lFr3fzVlX0JzEja4f5iWHBzv%2FtKmzxjBzDKyAmenEI"
						  ),
						));

						$response = curl_exec($curl);
						$arr_response = json_decode($response, TRUE);
						$err = curl_error($curl);

						curl_close($curl);

						if ($err) {
						  echo "cURL Error #:" . $err;
						} else {
						  // echo var_dump($arr_response);
							for ($j = 0; $j < count($arr_response['data']); $j++){

				  	 ?>
				    <option value="<?php echo $arr_response['data'][$j]['code']; ?>"><?php echo $arr_response['data'][$j]['name']; ?></option><?php }} ?>
				  </select>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
