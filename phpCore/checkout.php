<?php
session_start();
$title = $_GET["title"];
$image = $_GET["image"];
$price = $_GET["price"];
$discount_price = $_GET["discount_price"];
$email = $_SESSION['username'];
$orderid = "GRNDCRS".rand(10000,9999999);;
$address = $_SESSION['address'];
$phone = $_SESSION['mobile'];
$name = $_SESSION['name'];
/* PHP */
$post_data = array();
$post_data['store_id'] = "grand610d0e2d825b7";
$post_data['store_passwd'] = "grand610d0e2d825b7@ssl";
$post_data['total_amount'] = $discount_price;
$post_data['currency'] = "BDT";
$post_data['tran_id'] = "SSLCZ_TEST_".uniqid();
$post_data['success_url'] = "http://www.grandcourse.com/grandcourse/success.php?price=".$price."&orderid=".$orderid."&title=".$title."&image=".$image."&discount_price=".$discount_price."";
$post_data['fail_url'] = "http://www.grandcourse.com/grandcourse/course.php";
$post_data['cancel_url'] = "http://www.grandcourse.com/grandcourse/course.php";
# $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

# EMI INFO
$post_data['emi_option'] = "1";
$post_data['emi_max_inst_option'] = "9";
$post_data['emi_selected_inst'] = "9";

# CUSTOMER INFORMATION
$post_data['cus_name'] = $name;
$post_data['cus_email'] = $email;
$post_data['cus_add1'] = $address;
$post_data['cus_add2'] = "";
$post_data['cus_city'] = "";
$post_data['cus_state'] = "";
$post_data['cus_postcode'] = "1000";
$post_data['cus_country'] = "Bangladesh";
$post_data['cus_phone'] = $phone;
$post_data['cus_fax'] = $phone;

# SHIPMENT INFORMATION
$post_data['ship_name'] = "testgrandztmr";
$post_data['ship_add1 '] = "Dhaka";
$post_data['ship_add2'] = "Dhaka";
$post_data['ship_city'] = "Dhaka";
$post_data['ship_state'] = "Dhaka";
$post_data['ship_postcode'] = "1000";
$post_data['ship_country'] = "Bangladesh";

# OPTIONAL PARAMETERS
$post_data['value_a'] = "ref001";
$post_data['value_b '] = "ref002";
$post_data['value_c'] = "ref003";
$post_data['value_d'] = "ref004";

# CART PARAMETERS
$post_data['cart'] = json_encode(array(
    array("product"=>"DHK TO BRS AC A1","amount"=>"200.00"),
    array("product"=>"DHK TO BRS AC A2","amount"=>"200.00"),
    array("product"=>"DHK TO BRS AC A3","amount"=>"200.00"),
    array("product"=>"DHK TO BRS AC A4","amount"=>"200.00")
));
$post_data['product_amount'] = "100";
$post_data['vat'] = "5";
$post_data['discount_amount'] = "5";
$post_data['convenience_fee'] = "3";
















# REQUEST SEND TO SSLCOMMERZ
$direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";


$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $direct_api_url );
curl_setopt($handle, CURLOPT_TIMEOUT, 30);
curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($handle, CURLOPT_POST, 1 );
curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


$content = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle))) {
	curl_close( $handle);
	$sslcommerzResponse = $content;
} else {
	curl_close( $handle);
	echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
	exit;
}

# PARSE THE JSON RESPONSE
$sslcz = json_decode($sslcommerzResponse, true );

if(isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL']!="" ) {
        # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
        # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
	echo "<meta http-equiv='refresh' content='0;url=".$sslcz['GatewayPageURL']."'>";
	# header("Location: ". $sslcz['GatewayPageURL']);
	exit;
} else {
	echo "JSON Data parsing error!";
}







?>