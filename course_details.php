<?php ob_start(); $active = 'course'; include "inc/header.php"?>
<?php
	if(!isset($_REQUEST['id']) || $_REQUEST['id']==NULL ){
		header("location: 404.php");
	}else{
		$id = $_REQUEST['id'];
	}

 ?>
<style type="text/css">
.maincontent {
	background: rgb(255, 255, 255);
	border: 1px solid #ded4c5;
	margin: 0 15px 15px 0;
	padding: 8px 15px;
	box-shadow: 2px 2px 14px -2px darkgray !important;
	width: 100%;
	display: inline-table;
}
.footers {
	border-left: 1px dashed darkgray;
}
</style>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2 style="text-align:center;color:rgb(249, 109, 116);">Course Details</h2>
				<?php 
					$query = "select * from courses where id = $id ";
					$post = $db->select($query);
					if($post){
						$result = $post->fetch_assoc();
				?>
			<div class="container">
				<div class="row col-md-12 lefts FadeIN-Right">
					<div class="course-details">
						<div class="background" style="background:url(images/courseImg/<?=$result['image'];?>);background-size: cover;border-radius: 6px;">
							<div class="top-details">
								<h1><?=$result['title'];?></h1>
								<h3><?=$result['sub_title'];?></h3>
								<a href="#purchaseid">
									<button class="btn btn-primary" ><i class="fas fa-shopping-cart"></i> Enroll Now</button>
								</a>
							</div>
						</div>
						<div class="row col-md-12 top-details-2">
						<!--Motivation of this course start-->
							<div class="top-details-2-1 col-md-6 ">
								<?=$result['motivational_des'];?>
								<a href="#purchaseid">
									<button class="btn btn-primary" ><i class="fas fa-shopping-cart"></i> Enroll Now</button>
								</a>
							</div>
						<!--Motivation of this course start-->
						
						<!--Course summary start-->
							<div class="top-details-2-2 col-md-6 ">
								<div class="top-color"></div>
								<?=$result['summary'];?>
							</div>
						<!--Course summary end-->
						</div>
						
						<!--course_purpose start-->
						<div class="middle-details-1">
							<h1>By the end of this course, you'll be able to…</h1>
							<?=$result['course_purpose'];?>
						</div>
						<!--course_purpose end-->
						
						<!--Who is this course for? start-->
						<div class="middle-details-2">
							<h1>Who is this course for?</h1>
							<?=$result['for_whom'];?>
						</div>
						<!--Who is this course for? end-->
						
						<!--No prior knowledge needed! start-->
						<div class="middle-details-3">
							<h1>No prior knowledge needed!</h1>
							<?=$result['pre_idea'];?>
						</div>
						<!--No prior knowledge needed! end-->
					
						<!--Instructor start-->
						<div class="bottom-details-1">
							<h1>Your Instructor</h1>
							<div class="instructor-details-2">
								<?=$result['instructor'];?> 
							</div>
						</div>
						<!--Instructor end-->
						
						<!--purchase part start-->
						<div class="bottom-details-2" id="purchaseid">
							<h1><?=$result['purchase_title'];?> </h1>
							<div class="purchase">
								<h2><?=$result['order_box_title'];?> </h2>
								<?=$result['order_box_des'];?>
								<p class="price1">৳<?=$result['discount_price'];?> <del>৳<?=$result['price'];?></del></p>
								
								<?php
								if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ==true){?>
								<a href="phpCore/checkout.php?price=<?=$result['price'];?>&discount_price=<?=$result['discount_price'];?>&title=<?=$result['title'];?>&image=<?=$result['image'];?>">
									<button class="btn btn-primary">Buy Now</button>
								</a>
								<?php }
								else{ ?>
								<a href="login/login.php">
									<button class="btn btn-primary">Buy Now</button>
								</a>
								<?php }?> 	
								
								
							</div>
						</div>
						<!--purchase part start-->
					</div>
				</div>
			</div>
			<?php }else{
					header("Location : 404..php");
					} ?>	
		</div>
	</div>

<?php include "inc/footer.php"; ob_end_flush();?>