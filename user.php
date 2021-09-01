<?php ob_start(); $active = 'account';
include "inc/header.php" ?>	
<?php include "configforuser.php" ?>	
<?php
	if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin']!=true){
		header("location: login/login.php");
		exit;
	}
?>
	<div class="contentsection contemplete clear" >
		<div class="maincontent clear" id="scroll_x">
			<div class="about">
				<?php
						if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
							$i=0;
							$sql = "select * from users_info where userid = ?";
							$stmt = mysqli_prepare($conn,$sql);
							mysqli_stmt_bind_param($stmt,"s",$param_id);
							$param_id = $_SESSION['id'];
							if(mysqli_stmt_execute($stmt)){
								if(mysqli_stmt_store_result($stmt)){
									if(mysqli_stmt_num_rows($stmt)==0){
										
										if(isset($_POST['name']) && isset($_POST['address']) && isset($_POST['mobile'])){
											$name = htmlspecialchars($_POST['name']);
											$address = htmlspecialchars($_POST['address']);
											$mobile = htmlspecialchars($_POST['mobile']);
											$insert_sql = "insert into users_info(userid,name,address,mobile) values(?,?,?,?)";
											$insert_stmt = mysqli_prepare($conn,$insert_sql);
											mysqli_stmt_bind_param($insert_stmt,"issi",$param_userid,$param_name,$param_address,$param_mobile);
											$param_userid = $_SESSION['id'];
											$param_name = $name;
											$param_address = $address;
											$param_mobile = $mobile;
											if(mysqli_stmt_execute($insert_stmt)){
											$_SESSION["mobile"] = $mobile;
											$_SESSION["name"] = $name;
											$_SESSION["address"] = $address;
											$i++;?>
											
											<div class="container FadeIN-Middle">
												<div class="main-body">
													  <nav aria-label="breadcrumb" class="main-breadcrumb">
														<ol class="breadcrumb">
														  <li class="breadcrumb-item active" aria-current="page">User Profile</li>
														</ol>
													  </nav>
													  <div class="row gutters-sm">
														<div class="col-md-4 mb-3">
														  <div class="card">
															<div class="card-body cardHeight">
															  <div class="d-flex flex-column align-items-center text-center">
																<img src="images/logo.png" alt="Admin" class="rounded-circle" width="150">
																<div class="mt-3">
																  <h4>GrandCourse</h4>
																  <a class="btn btn-primary" href="update_profile.php" >Edit</a>
																  <a href="change_pass.php" class="btn btn-outline-primary">Change Password</a>
																</div>
															  </div>
															</div>
														  </div>
														</div>
														<div class="col-md-8">
														  <div class="card mb-3">
															<div class="card-body cardHeight">
															  <div class="row">
																<div class="col-sm-3">
																  <h6 class="mb-0">Full Name :</h6>
																</div>
																<div class="col-sm-9 text-secondary">
																  <?php echo $name;?>
																</div>
															  </div>
															  <hr>
															  <div class="row">
																<div class="col-sm-3">
																  <h6 class="mb-0">Email :</h6>
																</div>
																<div class="col-sm-9 text-secondary">
																  <?php echo $_SESSION['username'];?>
																</div>
															  </div>
															  <hr>

															  <div class="row">
																<div class="col-sm-3">
																  <h6 class="mb-0">Mobile :</h6>
																</div>
																<div class="col-sm-9 text-secondary">
																  <?php echo $mobile;?>
																</div>
															  </div>
															  <hr>
															  <div class="row">
																<div class="col-sm-3">
																  <h6 class="mb-0">Address :</h6>
																</div>
																<div class="col-sm-9 text-secondary">
																  <?php echo $address;?>
																</div>
															  </div>
															</div>
														  </div>
														</div>
													</div>
												</div>
											</div>	
											<?php } } ?>	
											
							<?php if(($i===0) && mysqli_stmt_num_rows($stmt)==0){ ?>

							<div class="create-profile">
								<h2>Create Your Profile Information</h2>
									<form action="" method="post">
										<table>
											<tr>
												<td>Name:</td>
												<td>
												<input id="name" type="text" name="name" placeholder="Enter your Name" required="1"/>
												</td>
											</tr>	
											<tr>
												<td>Address:</td>
												<td>
												<input type="text" name="address" placeholder="Enter your Address" />
												</td>
											</tr>				
											<tr>
												<td>Mobile:</td>
												<td>
												<input type="text" name="mobile" placeholder="Enter your Mobile Number" />
												</td>
											</tr>
											<tr>
												<td></td>
												<td>
												<input type="submit" name="submit" value="Create"/>
												</td>
											</tr>
									</table>
								<form/>	
							</div>
							<?php } ?>	
							
								<?php } else{
									$view_sql = "select * from users_info where userid = ? ";
									$view_stmt = mysqli_prepare($conn,$view_sql);
									mysqli_stmt_bind_param($view_stmt,"i",$param_userid);
									$param_userid = $_SESSION['id'];
									if(mysqli_stmt_execute($view_stmt)){
										mysqli_stmt_store_result($view_stmt);
										mysqli_stmt_bind_result($view_stmt,$id,$userid,$name,$address,$mobile);
										mysqli_stmt_fetch($view_stmt);
											$_SESSION["mobile"] = $mobile;
											$_SESSION["name"] = $name;
											$_SESSION["address"] = $address;
										?>
										
									<div class="container FadeIN-Middle">
										<div class="main-body">
											  <nav aria-label="breadcrumb" class="main-breadcrumb">
												<ol class="breadcrumb">
												  <li class="breadcrumb-item active" aria-current="page">User Profile</li>
												</ol>
											  </nav>
											  <div class="row gutters-sm">
												<div class="col-md-4 mb-3">
												  <div class="card">
													<div class="card-body cardHeight">
													  <div class="d-flex flex-column align-items-center text-center">
														<img src="images/logo.png" alt="Admin" class="rounded-circle" width="150">
														<div class="mt-3">
														  <h4>GrandCourse</h4>
														  <a class="btn btn-primary" href="update_profile.php" >Edit</a>
														  <a href="change_pass.php" class="btn btn-outline-primary">Change Password</a>
														</div>
													  </div>
													</div>
												  </div>
												</div>
												<div class="col-md-8">
												  <div class="card mb-3">
													<div class="card-body cardHeight">
													  <div class="row">
														<div class="col-sm-3">
														  <h6 class="mb-0">Full Name :</h6>
														</div>
														<div class="col-sm-9 text-secondary">
														  <?php echo $name;?>
														</div>
													  </div>
													  <hr>
													  <div class="row">
														<div class="col-sm-3">
														  <h6 class="mb-0">Email :</h6>
														</div>
														<div class="col-sm-9 text-secondary">
														  <?php echo $_SESSION['username'];?>
														</div>
													  </div>
													  <hr>

													  <div class="row">
														<div class="col-sm-3">
														  <h6 class="mb-0">Mobile :</h6>
														</div>
														<div class="col-sm-9 text-secondary">
														  <?php echo $mobile;?>
														</div>
													  </div>
													  <hr>
													  <div class="row">
														<div class="col-sm-3">
														  <h6 class="mb-0">Address :</h6>
														</div>
														<div class="col-sm-9 text-secondary">
														  <?php echo $address;?>
														</div>
													  </div>
													</div>
												  </div>
												</div>
											</div>
										</div>
									</div>	
									<!--For order history-->
									<div class="container FadeIN-Middle">
										<div class="main-body">
											  <nav aria-label="breadcrumb" class="main-breadcrumb">
												<ol class="breadcrumb">
												  <li class="breadcrumb-item active" aria-current="page">Purchase History</li>
												</ol>
											  </nav>	
											<div class="col-md-12"  style="padding:0px;">
												<div class="card mb-3">
													<div class="card-body cardHeight" style="height:unset!important;">
													  <div class="row">
														<div class="col-sm-3">
														  <h6 class="mb-0">Order Number</h6>
														</div>
														<div class="col-sm-3">
														  <h6 class="mb-0">Price</h6>
														</div>
														<div class="col-sm-3">
														  <h6 class="mb-0">Status</h6>
														</div>
														<div class="col-sm-3">
														  <h6 class="mb-0">Date</h6>
														</div>
													  </div>
													  <hr>
													  
													  
				<?php
					$ordersql = "select id,invoice,price,status,date from orders where email = ? order by id desc";
					$order_stmt = mysqli_prepare($conn,$ordersql);
					if($order_stmt){
						mysqli_stmt_bind_param($order_stmt,"s",$param_mail);
						$param_mail = $_SESSION['username'];
						if(mysqli_stmt_execute($order_stmt)){
							mysqli_stmt_store_result($order_stmt);
							mysqli_stmt_bind_result($order_stmt, $iid, $orderid, $price, $status, $date);
							while(mysqli_stmt_fetch($order_stmt)){ ?>
													  <div class="row">
														<div class="col-sm-3">
														  <h6 class="mb-1"><?=$orderid;?></h6>
														</div>
														<div class="col-sm-3">
														  <h6 class="mb-1">৳ <?=$price;?></h6>
														</div>
														<div class="col-sm-3">
														  <h6 class="mb-1 green"><?=$status;?></h6>
														</div>
														<div class="col-sm-3">
														  <h6 class="mb-1"><?=$date;?></h6>
														</div>
													  </div>
													  <hr>
				<?php		}
						}
					}
				if(mysqli_stmt_num_rows($order_stmt)==0){
				?>	
					<div class="row">
						<h6 style="margin:auto" class="mb-0">Empty!</h6>
					</div>
					<hr>
				<?php } ?>								</div>
												</div>
											</div>
										</div>	
									</div>	
								<?php	} ?>

								<?php }
								}else{}
							}else{}
						}
						else{ ?>	

				<?php 	} ?>	
			</div>
		</div>
<?php include "inc/sidebar.php"?>
<?php include "inc/footer.php";
ob_end_flush(); ?>