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

		$username = $password = "";
		$err = "";
			
			if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
			{
				$err = "Please enter username and password";
				$_SESSION["err"] = $err;
				header("location: login.php");
				die();
			}
			else{
				$username = htmlspecialchars(trim($_POST['username']));
				$password = trim($_POST['password']);
			}


		if(empty($err))
		{
			$sql = "SELECT id, username, password FROM users WHERE username = ?";
			$stmt = mysqli_prepare($conn, $sql);
			mysqli_stmt_bind_param($stmt, "s", $param_username);
			$param_username = $username;
			
			

			if(mysqli_stmt_execute($stmt)){
				mysqli_stmt_store_result($stmt);
				if(mysqli_stmt_num_rows($stmt) == 1)
						{
							mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
							if(mysqli_stmt_fetch($stmt))
							{
								if(password_verify($password, $hashed_password))
								{
									$ssql = "select otp from email_verify where email = ?";
									$sstmt = mysqli_prepare($conn, $ssql);
									mysqli_stmt_bind_param($sstmt, "s", $sparam_username);
									$sparam_username = $username;
									mysqli_stmt_execute($sstmt);
									mysqli_stmt_store_result($sstmt);
									mysqli_stmt_bind_result($sstmt, $otp);
									mysqli_stmt_fetch($sstmt);
									if($otp){
										header("location: ../email_verify.php?email=$username");
										die();
									}else{
										session_start();
										$_SESSION["username"] = $username;
										$_SESSION["id"] = $id;
										$_SESSION["loggedin"] = true;

										header("location: ../user.php");
										die();
									}
								}
								else{
									$err = "Wrong password!";
									$_SESSION["err"] = $err;
									header("location: login.php");
									die();
								}
							}

						}else{
							$err = "Please enter valid email!";
							$_SESSION["err"] = $err;
							header("location: login.php");
							die();
							
						}
			}
		}    

	}
}else{
	
	header("location: login.php");
	die();
}
?>