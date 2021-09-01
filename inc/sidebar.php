<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2><i class="fa fa-bars" aria-hidden="true"></i> Categories <i class="fas fa-caret-down"></i></h2>
					<ul>
					<?php 
						$query = "select * from tbl_category";
						$category = $db->select($query);
						if($category){
						while($result = $category->fetch_assoc()){
					?>
						<li><a href="posts.php?category=<?php echo $result['id'];?>"><i class="fas fa-chevron-right"></i> <?php echo $result['name'];?></a></li>
					<?php } } else{?>
						<li>Empty Category!</li>
						<?php } ?>
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
				<?php 
						$query = "select * from tbl_post ORDER BY id DESC limit 2";
						$post = $db->select($query);
						if($post){
						while($result = $post->fetch_assoc()){
					?>
					<div class="popular clear">
						<h3><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h3>
						<a href="post.php?id=<?php echo $result['id'];?>"><img src="admin/upload/<?php echo $result['image'];?> " alt="post image"/></a>
						<?php echo $format->short_text($result['body'],100);?> 
					</div>
					<?php } }else{ header("location: 404.php");} ?>
			</div>
			
		</div>