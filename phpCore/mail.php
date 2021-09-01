<?php
	function validate($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}	
		
	$err = "";
	$name = $email = $subject = $content = "";
	
		$name = validate($_GET['name']);
		$email = validate($_GET['email']);
		$subject = validate($_GET['subject']);
		$content = validate($_GET['content']);
	  
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		
	  if (filter_var($email, FILTER_VALIDATE_EMAIL)){
	    $email = validate($_GET['email']);
	  } else {
	    $err = "*Enter valid email address!";
		echo'<p style="color:red;font-weight:bold" >'.$err.'</p>';
	  }

	  if (empty($_GET['name'])) {
		$err = "*Name is required!";
		echo'<p style="color:red;font-weight:bold" >'.$err.'</p>';
	  } else {
		$name = validate($_GET['name']);
	  }

	  if (empty($_GET['email'])) {
		$err = "*Email is required!";
		echo'<p style="color:red;font-weight:bold" >'.$err.'</p>';
	  } else {
		$email = validate($_GET['email']);
	  }

	  if (empty($_GET['subject'])) {
		$err = "*Subject is required!";
		echo'<p style="color:red;font-weight:bold" >'.$err.'</p>';
	  } else {
		$subject = validate($_GET['subject']);
	  }

	  if (empty($_GET['content'])) {
		$err = "*Message is required!";
		echo'<p style="color:red;font-weight:bold" >'.$err.'</p>';
	  } else {
		$content = validate($_GET['content']);
	  }

	  if(empty($err)){
		$toEmail = "rhr2416@gmail.com";
		$mailHeaders = "From: " . $name . "<". $email .">\r\n";
			if(mail($toEmail, $subject, $content, $mailHeaders)) {
				$message = "Your information is received successfully.";
				echo'<p style="color:green;font-weight:bold" >'.$message.'</p>';
			}else{
				$err = "Failed to sent your information!";
				echo'<p style="color:red;font-weight:bold" >'.$err.'</p>';
			}
		}
?>