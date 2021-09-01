<?php ob_start(); $active = 'home'; include "inc/header.php" ?>
<?php 
	if(!isset($_REQUEST['search']) || $_REQUEST['search']==NULL ){
		header("location:404.php");
	}else{
		$search = $_REQUEST['search'];
	}
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear" id="scroll_x">
      <?php  $query = "SELECT * FROM tbl_post WHERE title LIKE '%$search%' or body LIKE '%$search%'";
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
            <?php } } else { ?>
	            <p class="clear" style="display:block;">No match found!!</p>
            <?php }?>
        </div>
<?php include "inc/sidebar.php" ?>
<?php include "inc/footer.php"; ob_end_flush(); ?>