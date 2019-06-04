
<?php

$curl = curl_init();

curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transferrecipient",
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
    "Postman-Token: 24ee1fde-41c9-41d9-8180-57868183eefc,7eeef516-1456-4406-9c07-81fa6c3883dc",
    "User-Agent: PostmanRuntime/7.13.0",
    "accept-encoding: gzip, deflate",
    "cache-control: no-cache",
    "cookie: __cfduid=d098b6629f0b2a7bc17f826cb190197081559457317; sails.sid=s%3AeRPa1-NkVN6zPkKi-PZXYtY264KVde95.siWoIWiSWLWFX3sFujDyt4p5XVj2IVsrZutr59q8PQQ"
  ),
));

$response = curl_exec($curl);
$php_response = json_decode($response, true);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {

  ?>
<!DOCTYPE html>
<html>
<head>
  <title>All Suppliers</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container">
  <h1>All Suppliers</h1>
</div>
<div class="container">
  <table class="table table-responsive-sm table-bordeered">
    <thead>
      <tr>
        <th>S/N</th>
        <th>Name</th>
        <th>Recipient Code</th>
        <th>Description</th>
        <th></th>
      </tr>
    </thead>
    <?php
        for($j = 0; $j < count($php_response['data']); $j++){
          
    ?>
    <tbody>
      <tr>
        <td><?php  echo $j + 1; ?></td>
        <td><?php echo $php_response['data'][$j]['name']; ?></td>
        <td><?php echo $php_response['data'][$j]['recipient_code']; ?></td>
        <td><?php echo $php_response['data'][$j]['description'];  ?></td>
        <td><a href="transfer.php?<?php echo $php_response['data'][$j]['recipient_code'];?>">Transfer</a></td><?php }} ?>
      </tr>
    </tbody>
  </table>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
