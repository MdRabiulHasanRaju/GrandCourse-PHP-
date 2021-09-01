<?php
session_start();
if(isset($_SESSION['username']))
{
	header("location: ../user.php");
	exit;
}
$username_err = $password_err = $confirm_password_err = "";
if(isset($_SESSION["username_err"])){
	$username_err = $_SESSION["username_err"];
}
elseif(isset($_SESSION["password_err"])){
	$password_err = $_SESSION["password_err"];
}
?>

<!doctype html>
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
	<div class="logo-img logo-img-register">
		<img height="86px" width="100px" src="../images/logo.png" alt="GrandCouse"/>
	</div>

	<h1 class="gc">GrandCourse</h1>
	<div class="d-flex justify-content-center h-100">
		<div class="card" style="height:434px;">
			<div class="card-header">
				<h3>Register</h3>
			</div>
			<div class="card-body">
				<form action="registerCore.php" method="post" >
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="email" name="username" class="form-control" placeholder="Email" required>
						
					</div>
					<span style="color:red"><?php echo $username_err; unset($_SESSION['username_err'])?></span>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input id="PassEntry" type="password" name="password" class="form-control" placeholder="password" required>
					</div>
					<span id="StrengthDisp" class="strength" >Weak password</span>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="confirm_password" class="form-control" placeholder="confirm password" required>
					</div>
					<span style="color:red"><?php echo $password_err; unset($_SESSION['password_err'])?></span>
					<div class="form-group">
						<input name="submit" type="submit" value="Register" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Already have an account? <a href="login.php">Sign In</a>
				</div>
				<div class="d-flex justify-content-center links">
					<a class=" home-page" href="../index.php">Back To Home Page</a>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    let password = document.getElementById('PassEntry')
    let strengthBadge = document.getElementById('StrengthDisp')

    let strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})')
    let mediumPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))')
    
    function StrengthChecker(PasswordParameter){

        if(strongPassword.test(PasswordParameter)) {
            strengthBadge.style.color = "#25e825"
            strengthBadge.textContent = 'Strong password'
        } else if(mediumPassword.test(PasswordParameter)){
            strengthBadge.style.color = '#0c9db5'
            strengthBadge.textContent = 'Medium password'
        } else{
            strengthBadge.style.color = '#ff6363'
            strengthBadge.textContent = 'Weak password'
        }
    }


    password.addEventListener("input", () => {

        strengthBadge.style.display= 'block'

        StrengthChecker(password.value)

        if(password.value.length == 0){
            strengthBadge.style.display = 'none'
        }
    });
</script>   
</body>
</html>
