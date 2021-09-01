<?php
// $val_id=urlencode($_POST['val_id']);
// $store_id=urlencode("grand610d0e2d825b7");
// $store_passwd=urlencode("grand610d0e2d825b7@ssl");
// $requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

// $handle = curl_init();
// curl_setopt($handle, CURLOPT_URL, $requested_url);
// curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
// curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

// $result = curl_exec($handle);

// $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

// if($code == 200 && !( curl_errno($handle)))
// {

	// # TO CONVERT AS ARRAY
	// # $result = json_decode($result, true);
	// # $status = $result['status'];

	// # TO CONVERT AS OBJECT
	// $result = json_decode($result);

	// # TRANSACTION INFO
	// $status = $result->status;
	// $tran_date = $result->tran_date;
	// $tran_id = $result->tran_id;
	// $val_id = $result->val_id;
	// $amount = $result->amount;
	// $store_amount = $result->store_amount;
	// $bank_tran_id = $result->bank_tran_id;
	// $card_type = $result->card_type;

	// # EMI INFO
	// $emi_instalment = $result->emi_instalment;
	// $emi_amount = $result->emi_amount;
	// $emi_description = $result->emi_description;
	// $emi_issuer = $result->emi_issuer;

	// # ISSUER INFO
	// $card_no = $result->card_no;
	// $card_issuer = $result->card_issuer;
	// $card_brand = $result->card_brand;
	// $card_issuer_country = $result->card_issuer_country;
	// $card_issuer_country_code = $result->card_issuer_country_code;

	// # API AUTHENTICATION
	// $APIConnect = $result->APIConnect;
	// $validated_on = $result->validated_on;
	// $gw_version = $result->gw_version;	

// } else {

	// echo "Failed to connect with SSLCOMMERZ";
// }
?>
<?php   ob_start(); $active = 'course';
		include "inc/header.php"; 
		include "configforuser.php" ?>
<style type="text/css">
	.maincontent {
		background: rgb(255, 255, 255);
		border: 1px solid #ded4c5;
		margin: 0 15px 15px 0;
		padding: 8px 15px;
		box-shadow: 2px 2px 14px -2px darkgray !important;
		width: 100%;
		display: inline-table;
	}
	.footers {
		border-left: 1px dashed darkgray;
	}
	
</style>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2 style="text-align:center">Confirmation</h2>
				<?php
					$title = $_GET['title'];
					$image = $_GET['image'];
					$price = $_GET['price'];
					$discount_price = $_GET['discount_price'];
					$status = "Paid";
					$email = $_SESSION['username'];
					$orderid = $_GET['orderid'];
					$address = $_SESSION['address'];
					$phone = $_SESSION['mobile'];
					$name = $_SESSION['name'];
					$date = date("Y-m-d");
					
					$sql = "insert into orders(invoice, price, status, name, email, mobile, address, date) values(?,?,?,?,?,?,?,?)";
					$stmt = mysqli_prepare($conn,$sql);
					if($stmt){
					mysqli_stmt_bind_param($stmt,"sisssiss",$param_invoice, $param_price, $param_status, $param_name, $param_email, $param_mobile, $param_address, $param_date);
					$param_invoice = $orderid;
					$param_price = $discount_price;
					$param_status = $status;
					$param_name = $name;
					$param_email = $email;
					$param_mobile = $phone;
					$param_address = $address;
					$param_date = $date;
					mysqli_stmt_execute($stmt);}
				?>
<style type="text/css">
.logo {
    background-color: #eeeeeea8
}

.totals tr td {
    font-size: 13px
}

.footer {
    background-color: #eeeeeea8
}

.footer span {
    font-size: 12px
}

.product-qty span {
    font-size: 12px;
    color: #dedbdb
}
</style>				
				
<div class="container mt-1 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="invoice p-5">
                    <h5>Your order Confirmed!</h5> <span class="font-weight-bold d-block mt-4">Hello, <?=$name;?></span> <span>You order has been confirmed and please check your email for further instructions.</span>
					<a target="_blank" style="text-decoration:none; font-weight:bold;" href="user.php"><i class="fas fa-external-link-square-alt"></i> See your order list</a>
                    <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Order Date</span> <span><?=$date;?></span> </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Order No</span> <span style="font-weight:bold;"><?=$orderid;?></span> </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Payment Stataus</span> <span style="color:green!important;font-weight:bold;"><?=$status;?></span> </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Address</span> <span><?=$address;?></span> </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="product border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td width="20%"> <img style="height:unset;" src="images/courseImg/<?=$image;?>" width="90"> </td>
                                    <td width="60%"> <span class="font-weight-bold"><?=$title;?></span>
                                    </td>
                                    <td width="20%">
                                        <div class="text-right"> <span class="font-weight-bold">৳ <?=$price;?></span> </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="col-md-5">
                            <table class="table table-borderless">
                                <tbody class="totals">
                                    <tr>
                                        <td>
                                            <div class="text-left"> <span class="text-muted">Subtotal</span> </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span>৳ <?=$price;?></span> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-left"> <span class="text-muted">Discount Price</span> </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span class="text-success">৳ <?=$discount_price;?></span> </div>
                                        </td>
                                    </tr>
                                    <tr class="border-top border-bottom">
                                        <td>
                                            <div class="text-left"> <span class="font-weight-bold">Total</span> </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span class="font-weight-bold">৳ <?=$discount_price;?></span> </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p class="font-weight-bold mb-0">Thanks for with us!</p> <span>GrandCourse Team</span>
                </div>
                <div class="d-flex justify-content-between footer p-3"> <span>Need Help? <a href="contact.php">Contact with us</a></span> <span><?=$date;?></span> </div>
            </div>
        </div>
    </div>
</div>
<?php
	$subject = "GrandCourse Order Invoice";	
	$message = '<html>
					<head>
						<meta charset="utf-8">
					</head>
					<body>

					<table width=500>
						<table border=1  width=500>
						<th>
							<header>
								<h1 style="color:green">GrandCourse</h1>
								<h3>Invoice</h2>
							</header>
						</th>
						</table>

							<table border=1 width=500>
								<tr>
									<th><span contenteditable>Order Id</span></th>
									<td><span contenteditable>'.$orderid.'</span></td>
								</tr>				
								<tr>
									<th><span contenteditable>Item</span></th>
									<td><span contenteditable>'.$title.'</span></td>
								</tr>
								<tr>
									<th><span contenteditable>Date</span></th>
									<td><span contenteditable>'.$date.'</span></td>
								</tr>
								<tr>
									<th><span contenteditable>Payment Status</span></th>
									<td><span contenteditable>'.$status.'</span></td>
								</tr>
								<tr>
									<th><span contenteditable>Name</span></th>
									<td><span contenteditable>'.$name.'</span></td>
								</tr>
								<tr>
									<th><span contenteditable>Email</span></th>
									<td><span contenteditable>'.$email.'</span></td>
								</tr>
								<tr>
									<th><span contenteditable>Phone</span></th>
									<td><span contenteditable>+880'.$phone.'</span></td>
								</tr>
								<tr>
									<th><span contenteditable>Offer Price</span></th>
									<td><span contenteditable>৳ '.$discount_price.'</span></td>
								</tr>
								<tr>
									<th><span contenteditable>Price</span></th>
									<td><span contenteditable>৳ '.$price.'</span></td>
								</tr>
								<tr>
									<th><span contenteditable>Amount Due</span></th>
									<td><span contenteditable>৳ 0</span></td>
								</tr>
								<tr>
									<th><span contenteditable>Total Amount</span></th>
									<td><span contenteditable>৳ '.$discount_price.'</span></td>
								</tr>
							</table>
						<table  border=1 width=500>
							<td>
							<center>
								<h1><span contenteditable>Thank You</span></h1>
								<div contenteditable>
									<p>Grandcourse is always with you.</p>
								</div>
							</center>
							</td>
						</table>
					</table>
					</body>
				</html>';
	$from = "usenormal775@gmail.com";
	$toEmail = $email;
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	 
	// Create email headers
	$headers .= 'From: '.$from."\r\n". 'Reply-To: '.$from."\r\n" . 'X-Mailer: PHP/' . phpversion();
	if(mail($toEmail, $subject, $message, $headers)) {
	    $message = "Your contact information is received successfully.";
	    $type = "success";
	}else{
		$err = "Failed to sent mail.";
	}
	?>			
		</div>
	</div>

<?php include "inc/footer.php"; ob_end_flush();?>