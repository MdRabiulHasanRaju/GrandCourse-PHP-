<?php ob_start();
session_start();

if(isset($_SESSION['username']))
{
    header("location: ../user.php");
    exit;
}
$err="";
if(isset($_SESSION["err"])){
	$err = $_SESSION["err"];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>

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
			<div class="card-header">
				<h3>Sign In</h3>
			</div>
			<div class="card-body">
				<form method="post" action="loginCore.php">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="username" class="form-control" placeholder="Email" required />
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" class="form-control" placeholder="password" required>
					</div>
					<div class="forgot-pass" >
						<a href="forgotpass.php">Forgot Password</a>
					</div>
					<span style="color:red"><?php echo $err; unset($_SESSION['err']); ?></span>
					<div class="form-group">
						<input name="submit" type="submit" value="Login" class="btn float-right login_btn">
					</div>
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
<?php ob_end_flush(); ?>