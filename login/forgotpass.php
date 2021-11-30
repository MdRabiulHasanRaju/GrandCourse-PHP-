<?php
session_start();

if(isset($_SESSION['username']))
{
    header("location: ../index.php");
    exit;
}
require_once "config.php";

$username = $err = $otpPage = $newPassPage = "";
$mainPage = true;
	if(isset($_GET['otpPage'])){
		$otpPage = true;
		$mainPage = false;
		$newPassPage = false;
	}
	if(isset($_GET['newPassPage'])){
		$newPassPage = true;
		$otpPage = false;
		$mainPage = false;
	}


if ($_SERVER['REQUEST_METHOD'] == "POST"){
	if(isset($_POST['username'])){
		if(empty(trim($_POST['username'])))
		{
			$err = "Please enter username";
		}
		else{
			$username = htmlspecialchars(trim($_POST['username']));
		}


if(empty($err))
{
    $sql = "SELECT username,id FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
 

    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
					mysqli_stmt_bind_result($stmt, $username, $id);
					$otp = rand(1000,100000);
						$to_email = $username;
						$subject = "Verification code from GrandCourse";
						$body = "Your OTP code is $otp";
						$headers = "From: grandcourse";

						if (mail($to_email, $subject, $body, $headers)) {
							$_SESSION['OTP'] = $otp;
							$_SESSION['recoverEmail'] = $username;
							$_SESSION['recoverId'] = $id;
							header("location: forgotpass.php?otpPage=true");
						} else {
						}
					

                }else{
					$err = "Please enter valid email!";
				}


    }
}    
}
	if(isset($_POST['otpfield'])){
		$userOTP = htmlspecialchars(trim($_POST['otpfield']));

		if($userOTP == $_SESSION['OTP']){
			unset($_SESSION['OTP']);
			header("location: forgotpass.php?newPassPage=true");
		}else{
			$err = "Wrong OTP";
		}
	}


	if(isset($_POST['confirmNewPass']) && isset($_POST['newPass'])){

		if(empty(trim($_POST['newPass']))){
			$err = "Password cannot be blank";
		}
		elseif(strlen(trim($_POST['newPass'])) < 5){
			$err = "Password cannot be less than 5 characters!";
		}
		else{
			$newPass = trim($_POST['newPass']);
		}

		if(trim($_POST['newPass']) !=  trim($_POST['confirmNewPass'])){
			$err = "Passwords should match!";
		}

		if(empty($err)){
			$recoverMail = $_SESSION['recoverEmail'];
			$sql = "UPDATE users SET password=? WHERE username = ?";
			$stmt = mysqli_prepare($conn, $sql);
			mysqli_stmt_bind_param($stmt, "ss", $param_password,$param_username);
			$param_username = $recoverMail;
			$param_password = password_hash($newPass, PASSWORD_DEFAULT);
			if(mysqli_stmt_execute($stmt)){
				session_start();
				unset($_SESSION['recoverEmail']);
				unset($_SESSION['recoverId']);
				header("location: login.php");
				die();
			}
		}

	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="icon" href="../images/logo.png">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
	<div class="logo-img logo-img-login">
		<img height="86px" width="100px" src="../images/logo.png" alt="GrandCouse"/>
	</div>
	<h1 class="gc" style="top: 130px;">GrandCourse</h1>
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<?php 
				if($mainPage == true){ ?>
			<div class="card-header">
				<h3>Forgot Password</h3>
			</div>
			<div class="card-body">
				<form action="" method="post" >
					<p class="forgot-pass-text">Enter your email below in the input box. We will send to you an OTP to recover your account.</p>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" class="form-control" placeholder="Enter Your Email" required>
							
						</div>
						<span style="color:red"><?php echo $err;?></span>
						<div class="form-group">
							<input type="submit" value="Send OTP" class="btn float-right login_btn">
						</div>
						
				<?php }
				if($newPassPage == true){ ?>
			<div class="card-header">
				<h3>Confim Your New Password</h3>
			</div>
			<div class="card-body">
				<form action="" method="post" >
					<p class="forgot-pass-text">Enter New Password</p>
						<div class="input-group form-group">
							
							<input type="password" name="newPass" class="form-control" placeholder="Enter New Password" required>
							
						</div>
						<br>
						<p class="forgot-pass-text">Confirm New Password</p>
						<div class="input-group form-group">
							
							<input type="password" name="confirmNewPass" class="form-control" placeholder="Confirm New Password" required>
							
						</div>
						<span style="color:red"><?php echo $err;?></span>
						<div class="form-group">
							<input type="submit" value="Change" class="btn float-right login_btn">
						</div>
				<?php }
				
				if($otpPage == true){ ?>
			<div class="card-header">
				<h3>OPT Confirmation</h3>
			</div>
			<div class="card-body">
				<form action="" method="post" >
					<p class="forgot-pass-text">Enter The OTP</p>
						<div class="input-group form-group">
							
							<input type="text" name="otpfield" class="form-control" placeholder="Enter The OTP" required>
							
						</div>
						<span style="color:red"><?php echo $err;?></span>
						<div class="form-group">
							<input type="submit" value="Confirm" class="btn float-right login_btn">
						</div>
						
				<?php }
				?>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="register.php">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center links">
					<a class=" home-page" href="../index.php">Back To Home Page</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>