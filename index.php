<?php ob_start(); $active = 'home'; include "inc/header.php" ?>
<?php include "inc/slider.php" ?>
	<div class="container contentsection  clear">
		<div class="maincontent clear">
			<?php 
			if (isset($_REQUEST['page'])) {
				$page = $_REQUEST['page'];
			}
			else{
				$page = 1;
			}
				$per_page = 3;
				$star_from = ($page-1)*$per_page;
				$query = "select * from tbl_post ORDER BY id DESC limit $star_from,$per_page";
				$post = $db->select($query);
				if ($post) {
					while($result = $post->fetch_assoc()){
			?>
			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
				<h4><?php echo $format->formatDate($result['date']);?> <a href="#"> By <?php echo $result['author'];?> </a></h4>
				 <a href="post.php?id=<?php echo $result['id'];?>"><img src="admin/upload/<?php echo $result['image'];?> " alt="post image"/></a>
				<?php echo $format->short_text($result['body']);?> 
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id'];?>">Read More</a>
				</div>
			</div>
<?php }?> <!--end while loop-->
<?php
	$query =  "select * from tbl_post";
	$result = $db->select($query);
	$total_rows = mysqli_num_rows($result);
	$total_page = ceil($total_rows/$per_page);
	echo " <span class = 'pagination'> ";
	for ($i=1; $i <= $total_page ; $i++) { 
			echo "<a class='page' href='index.php?page=$i'>$i</a>";
			if($i == $page){ ?>
			<script type="text/javascript">
			 var page = document.getElementsByClassName("page")[<?=$i-1;?>];
				page.classList.add("active-page");
			</script>				
			<?php  }
	}
	echo "</span>";
?>

<?php } else{ header("location: 404.php");} ?>
		</div>

<?php include "inc/sidebar.php" ?>
<?php include "inc/footer.php"; ob_end_flush(); ?>
	