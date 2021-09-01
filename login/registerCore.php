<?php 
session_start();
if($_SERVER['REQUEST_METHOD'] == "POST"){	
	if(isset($_POST['submit'])){
		if(isset($_SESSION['username']))
		{
			header("location: ../user.php");
			exit;
		}
		require_once "config.php";

		$username = $password = $confirm_password = "";
		$username_err = $password_err = $confirm_password_err = "";

		if ($_SERVER['REQUEST_METHOD'] == "POST"){


			if(empty(trim($_POST["username"]))){
				$username_err = "Username cannot be blank";
				$_SESSION["username_err"] = $username_err;
				header("location: register.php");
				die();
			}
			else{
				$sql = "SELECT id FROM users WHERE username = ?";
				$stmt = mysqli_prepare($conn, $sql);
				if($stmt)
				{
					mysqli_stmt_bind_param($stmt, "s", $param_username);


					$param_username = htmlspecialchars(trim($_POST['username']));


					if(mysqli_stmt_execute($stmt)){
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt) == 1)
						{
							$username_err = "This username is already taken!"; 
							$_SESSION["username_err"] = $username_err;
							header("location: register.php");
							die();
						}
						else{
							$username = trim($_POST['username']);
						}
					}
					else{
						echo "Something went wrong";
					}
				}
			}

			mysqli_stmt_close($stmt);



		if(empty(trim($_POST['password']))){
			$password_err = "Password cannot be blank";
			$_SESSION["password_err"] = $password_err;
			header("location: register.php");
			die();
		}
		elseif(strlen(trim($_POST['password'])) < 5){
			$password_err = "Password cannot be less than 5 characters!";
			$_SESSION["password_err"] = $password_err;
			header("location: register.php");
			die();
		}
		else{
			$password = trim($_POST['password']);
		}


		if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
			$password_err = "Passwords should match!";
			$_SESSION["password_err"] = $password_err;
			header("location: register.php");
			die();
		}



		if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
		{	$username = strtolower($username);
			$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
			$stmt = mysqli_prepare($conn, $sql);
			if ($stmt)
			{
				mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);


				$param_username = $username;
				$param_password = password_hash($password, PASSWORD_DEFAULT);

		 
				if (mysqli_stmt_execute($stmt))
				{	
					$otp = rand(1000,100000);
					
					
					
						$to_email = $username;
						$subject = "Verification code from GrandCourse";
						$body = "Your OTP code is $otp";
						$headers = "From: grandcourse";

						if (mail($to_email, $subject, $body, $headers)) {
							//echo "Email successfully sent to $to_email...";
						} else {
							//echo "Email sending failed...";
						}

					
					
					
					$verifysql = "insert into email_verify(otp,email) values('$otp','$username')";
					$query = $conn->query($verifysql);
					header("location: ../email_verify.php?email=$username");
				   // header("location: login.php");
				}
				else{
					echo "Something went wrong... cannot redirect!";
				}
			}
			mysqli_stmt_close($stmt);
		}
		mysqli_close($conn);
		}
		
	}
}else{
	
	header("location: register.php");
	die();
}
?>