
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php
	if(isset($_POST['supplier_name']) && isset($_POST['s_account_number']) && isset($_POST['bank_code'])){
		$s_name = $_POST['supplier_name'];
		$s_account_number = $_POST['s_account_number'];

		if(isset($_POST['description'])){
			$description = $_POST['description'];
		}
		else{
			$description = '';
		}
		$bank_code = $_POST['bank_code'];


		$curl = curl_init();
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);


		$post_arr = array('type' => 'nuban', 'name' => $s_name, 'description' => $description, 'account_number' => $s_account_number, 'bank_code' => $bank_code, 'currency' => 'NGN');


		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.paystack.co/transferrecipient",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => json_encode($post_arr),
		  CURLOPT_HTTPHEADER => array(
		    "Accept: */*",
		    "Authorization: Bearer sk_test_422f1ec39f7a1b61e536c77188ac24e79e3a596b",
		    "Cache-Control: no-cache",
		    "Connection: keep-alive",
		    "Content-Type: application/json",
		    "Host: api.paystack.co",
		    "Postman-Token: 83c77587-d266-4110-8614-869bb4bd7902,c6c5a974-d870-47bc-aca2-3188d55ad3fb",
		    "User-Agent: PostmanRuntime/7.13.0",
		    "accept-encoding: gzip, deflate",
		    "cache-control: no-cache",
		    "cookie: __cfduid=d098b6629f0b2a7bc17f826cb190197081559457317; sails.sid=s%3AAEb4Wlmv4JaDumDR60QcnR9UckWp1kSU.y%2FHDI2BmrheSvs6sYfQfTqoGrxy1EdihAJiBkK8jang"
		  ),
		));

		$response = curl_exec($curl);
		$de_response = json_decode($response, true);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo var_dump($de_response); ?>
		  <h1> <?php echo $de_response['message']; ?></h1>
		  <a href='all_suppliers.php' class='btn btn-primary' role='button'>View all Suppliers</a>
		<?php }


	}
 ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>