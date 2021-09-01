<?php $active = 'account'; include "inc/header.php"?>
<?php include "configforuser.php" ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php
				if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
					$view_sql = "select * from users_info where userid = ? ";
					$view_stmt = mysqli_prepare($conn,$view_sql);
					mysqli_stmt_bind_param($view_stmt,"i",$param_userid);
					$param_userid = $_SESSION['id'];
					if(mysqli_stmt_execute($view_stmt)){
						mysqli_stmt_store_result($view_stmt);
						mysqli_stmt_bind_result($view_stmt,$id,$userid,$name,$address,$mobile);
						mysqli_stmt_fetch($view_stmt); 
						
						
						
						if(isset($_POST['name']) && isset($_POST['address']) && isset($_POST['mobile'])){
							$name = htmlspecialchars($_POST['name']);
							$address = htmlspecialchars($_POST['address']);
							$mobile = htmlspecialchars($_POST['mobile']);
							$update_sql = "update users_info set name=?,address=?,mobile=? where userid = ?";
							$update_stmt = mysqli_prepare($conn,$update_sql);
							mysqli_stmt_bind_param($update_stmt,"ssii",$param_name,$param_address,$param_mobile,$param_userid);
							$param_userid = $_SESSION['id'];
							$param_name = $name;
							$param_address = $address;
							$param_mobile = $mobile;
							if(mysqli_stmt_execute($update_stmt)){
								echo "<p style='color: green; font-weight:bold; text-align:center;'>Information Updated.</p>";
							}
							else{
								echo "something went wrong!";
							} }
						?>
						
				<div class="update-profile">
					<h2>Update Your Profile Information <a href="user.php">Back To Profile</a></h2> 
						<form action="" method="post">
							<table>
								<tr>
									<td>Name:</td>
									<td>
									<input value="<?php echo $name;?>" id="name" type="text" name="name" placeholder="Change your Name" required/>
									</td>
								</tr>
								<tr>
									<td>Address:</td>
									<td>
									<input value="<?php echo $address;?>" type="text" name="address" placeholder="Change your Address" required/>
									</td>
								</tr>				
								<tr>
									<td>Mobile:</td>
									<td>
									<input value="<?php echo $mobile;?>" type="text" name="mobile" placeholder="Change your Mobile Number" required/>
									</td>
								</tr>
								<tr>
									<td></td>
									<td>
									<input type="submit" name="submit" value="Save Changes"/>
									</td>
								</tr>
						</table>
					<form/>	
				</div>
						
				<?php	} }?>
			</div>
		</div>
			
<?php include "inc/sidebar.php"?>
<?php include "inc/footer.php"?>