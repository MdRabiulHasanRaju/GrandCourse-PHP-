<?php ob_start(); $active = 'course'; include "inc/header.php"?>
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
				<h2 style="text-align:center">All Courses</h2>
				<?php 
					$query = "select id,image,course_cat,title,sub_title from courses";
					$post = $db->select($query);
					if($post){
				?>
				<div class="container">
					<div class="row course-cat">
						<div class="cat-head">
							Course Category:
						</div>
						<div class="dropdown show d">
						  <a class="btn btn-secondary dropdown-toggle d" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							ALL
						  </a>

						  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						  <?php 
						  $sql = "select * from course_category";
						  $cat_post = $db->select($sql);
						  if($cat_post){
							while($cat_result = $cat_post->fetch_assoc()){
						  $cat_id = $cat_result['id'];
						  $individual_cat_totol = "select course_cat from courses where course_cat = $cat_id";
						  $individual_cat = $db->select($individual_cat_totol);
						  if($individual_cat){
							$total_result = mysqli_num_rows($individual_cat);		  
						  }else{
							$total_result = 0;
						  }
						  ?>
							<a class="dropdown-item" href="#"><?=$cat_result['name'];?> (<?=$total_result;?>)</a>
						  <?php } } ?>
						  </div>
						</div>
						  <form class="form-inline cat-search">
							<input class="form-control mr-sm-2" type="search" placeholder="Search Course" aria-label="Search" required>
							<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
						  </form>	
					</div>
				</div>
				<div class="container">
					<div class="row col-md-12 lefts FadeIN-Left">
					<?php
						while($result = $post->fetch_assoc()){
					?>
						<div class="course-field col-md-4">
							<a href="course_details.php?id=<?=$result['id'];?>">
								<div class="top">
									<img src="images/courseImg/<?=$result['image'];?>" alt="html css img" />
								</div>
								<div class="middle">
									<h1><?=$result['title'];?></h1>
									<p><?=$result['sub_title'];?></p>
								</div>
								<div class="bottom">
									<p>3 Course Bundle</p>
								</div>
							</a>
						</div>						
					<?php } ?>
					</div>
			</div>
			<?php }else{
					header("Location : 404..php");
					} ?>	
		</div>
	</div>

<?php include "inc/footer.php"; ob_end_flush();?>