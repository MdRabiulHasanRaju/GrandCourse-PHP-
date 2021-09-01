<?php ob_start(); $active = ''; ?>
<?php include "inc/header.php"?>
<?php include "configforuser.php" ?>

<?php
$wrong_otp ="";
 if(isset($_GET["email"])){ 
$email = $_GET["email"];
$ssql = "select otp from email_verify where email = '$email'";
$femail = mysqli_query($conn, $ssql);
$otp = mysqli_fetch_assoc($femail);
if(!$otp['otp']){
	header("location: 404.php");
}

	if(isset($_POST['otp']) && isset($_POST['otpsubmit'])){
		$otp = $_POST['otp'];
		$sql = "select otp from email_verify where email = ?";
		$stmt = mysqli_prepare($conn,$sql);
		mysqli_stmt_bind_param($stmt,"s",$param_email);
		$param_email = $email;
		if(mysqli_stmt_execute($stmt)){
			mysqli_stmt_store_result($stmt);
			mysqli_stmt_bind_result($stmt,$b_otp);
			echo $b_otp;
			if(mysqli_stmt_fetch($stmt)){
				if($otp == $b_otp){
					header("location: login/login.php");
					$delsql = "delete from email_verify where otp = $b_otp";
					$del = $conn->query($delsql);
				}else{
					$wrong_otp = "Please Enter Right OTP";
				}
			}else{
				 header("location: 404.php");
			}
		}else{
			 header("location: 404.php");
		}
	}
?>
<!DOCTYPE HTML>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Confirm Your Account</h2>
				<p>Check your mail: <b><?=$email;?></b> for confirm your account. </p>
				<form action="" method="post">
				<table>
				<tr>
					<td>Enter OTP:</td>
					<td>
					<input type="text" name="otp" placeholder="OTP" required="1"/>
					<span class="strength" style="display:block;float:right;margin-left:6px;"><?php if(isset($wrong_otp)){ echo $wrong_otp;} ?></span>
					</td>
				</tr>			
				<tr>
					<td></td>
					<td>
					<input type="submit" name="otpsubmit" value="Enter OTP"/>
					</td>
				</tr>
		</table>
	</form>		

			</div>
		</div>

<?php  }else{ header("location: 404.php");} ?>
<?php include "inc/sidebar.php"?>
<?php include "inc/footer.php"; ob_end_flush(); ?>