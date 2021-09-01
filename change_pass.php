<?php $active = 'account'; include "inc/header.php"?>
<?php include "configforuser.php" ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php
				if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
					$incorrect = "";
					$length = "";
					$match = "";
					$err = "";
					$success = "";
						if(isset($_POST['ppass']) && isset($_POST['npass']) && isset($_POST['cnpass'])){

							$ppass = trim($_POST['ppass']);
							$npass = trim($_POST['npass']);
							$cnpass = trim($_POST['cnpass']);	
																						
							$usersql = "SELECT password FROM users WHERE id = ?";
							$userstmt = mysqli_prepare($conn, $usersql);
							mysqli_stmt_bind_param($userstmt,"i",$param_userid);
							$param_userid = $_SESSION['id'];
							
							if(mysqli_stmt_execute($userstmt)){
								mysqli_stmt_store_result($userstmt);
								mysqli_stmt_bind_result($userstmt, $hashed_password);
									if(mysqli_stmt_fetch($userstmt))
									{ 
										if(password_verify($ppass, $hashed_password)){
											if((strlen($npass)<5 || strlen($cnpass)<5)){
												$length = "Password cannot be less than 5 characters!";
											}else{
												if($npass!=$cnpass){
													$match = "Passwords should match";
												}else{
													$update_sql = "update users set password=? where id = ?";
													$update_stmt = mysqli_prepare($conn,$update_sql);
													mysqli_stmt_bind_param($update_stmt,"si",$param_pass,$param_userid);
													$param_userid = $_SESSION['id'];
													$param_pass = password_hash($cnpass, PASSWORD_DEFAULT);
													if(mysqli_stmt_execute($update_stmt)){
														$success = "<p style='color: green; font-weight:bold; text-align:center;'>Your password has been changed.</p>";
													}
													else{
														$err = "something went wrong!";
													} 
												}	
											}		
										}else{
											$incorrect = "Previous Password Is Incorrect!";
										}
									}
								}
							}
						?>
						
				<div class="update-profile">
					<h2>Change Your Password <a href="user.php">Back To Profile</a></h2> 
						<form action="" method="post">
							<table>
								<tr>
								<?php if(isset($success)){ echo '<p style="color: green; font-weight:bold; text-align:center; font-size:14px;">'.$success.'</p>';}?>
									<td>Current Password:</td>
									<td>
									<input id="name" type="password" name="ppass" placeholder="Current Password" required/>
									</td>
									<?php if(isset($incorrect)){ echo '<p style="color: red; font-weight:bold; text-align:center; font-size:14px;">'.$incorrect.'</p>';}?>
								</tr>
								<tr>
									<td>New Password:</td>
									<td>
									<input id="PassEntry" type="password" name="npass" placeholder="New Password" required/>
									<span id="StrengthDisp" class="strength" >Weak password</span>
									</td>
								</tr>				
								<tr>
									<td>Confirm New Password:</td>
									<td>
									<input type="password" name="cnpass" placeholder="Confirm New Password" required/>
									</td>
									<?php if(isset($length)){ echo '<p style="color: red; font-weight:bold; text-align:center; font-size:14px;">'.$length.'</p>';}?>
									<?php if(isset($match)){ echo '<p style="color: red; font-weight:bold; text-align:center; font-size:14px;">'.$match.'</p>';}?>
								</tr>
								<tr>
									<td></td>
									<td>
									<input type="submit" name="submit" value="Change Password"/>
									</td>
								</tr>
						</table>
					</form>	
				</div>
						
				<?php	} ?>
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

        StrengthChecker(password.value);

        if(password.value.length == 0){
            strengthBadge.style.display = 'none'
        }
    });
</script>
		
			
<?php include "inc/sidebar.php"?>
<?php include "inc/footer.php"?>