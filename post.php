<?php ob_start(); $active = 'home'; 
include "inc/header.php";
include "configforuser.php";

 ?>
<?php 
	if(!isset($_REQUEST['id']) || $_REQUEST['id']==NULL ){
		header("location:404.php");
	}else{
		$id = $_REQUEST['id'];
	}
$loginAlert="";
if(isset($_SESSION["loginAlert"])){
	$loginAlert = $_SESSION["loginAlert"];
}
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear" id="scroll_x">
			<div class="about">
				<?php
					$query = "select * from tbl_post where id = $id ";
					$post = $db->select($query);
					if($post){
						$result = $post->fetch_assoc();
				?>
				<h2><?php echo $result['title'];?></h2>
				<h4><?php echo $format->formatDate($result['date']);?>, By <?php echo $result['author'];?></h4>
				<img src="admin/upload/<?php echo $result['image'];?>" alt="MyImage"/>
				<?php echo $result['body'];?>
				
			
			<!--comment section start-->
			<div id="login-alert"><?php echo $loginAlert; unset($_SESSION["loginAlert"]);?></div>
				<div class="comment-section">
					<i class="fas fa-comment"></i><h3>Comment...</h3>
					<form action="phpCore/comment.php" method="post">
						<textarea placeholder="Write your comment here.." name="comment" id="" cols="30" rows="10" required></textarea>
						<input class="btn btn-success" value="Submit" type="submit" name="comment_submit" />
						<input name="postid" type="hidden" value="<?=$id;?>" />
					</form>
				</div>
				<div class="show-comment">
				<p class="allcomment">All Comments</p>
		<?php 
		
		/*Comment show section start*/
		$i=1;
		$comment_sql = "select * from comments where postid = ?";
		$comment_stmt = mysqli_prepare($conn,$comment_sql);
		mysqli_stmt_bind_param($comment_stmt,"i",$param_postId);
		$param_postId = $id;
		mysqli_stmt_execute($comment_stmt);
		mysqli_stmt_store_result($comment_stmt);
		if(mysqli_stmt_num_rows($comment_stmt)==0){
			echo '<p>Empty Comment!</p>';
		}else{
		mysqli_stmt_bind_result($comment_stmt,$comId,$comName,$comContent,$comUserId,$comPostId); 
		
		while(mysqli_stmt_fetch($comment_stmt)){ 

		/*Comment insert section end*/
		
		
		
		 // view reply start
			$comment_reply_sql = "select * from comments_reply where parent_com_id = ?";
			$comment_reply_stmt = mysqli_prepare($conn,$comment_reply_sql);
			mysqli_stmt_bind_param($comment_reply_stmt,"i",$param_parent_com_id);
			$param_parent_com_id = $comId;
			mysqli_stmt_execute($comment_reply_stmt);
			mysqli_stmt_store_result($comment_reply_stmt);
			$reply_comment_counter = mysqli_stmt_num_rows($comment_reply_stmt);
		?>
					<h5>Name: <?= $comName?></h5>
					<div class="child-comment">
						<p><?= $comContent?></p>
						<span class="reply<?=$i;?>">Reply || </span>
						<span class = "view-all-reply<?=$i;?>">View all replys<span class="reply-counter">[<?=$reply_comment_counter;?>]</span></span><br/>
						
						
						
						<!-- view reply start-->
						<div class="view-all-reply-content view-all-reply-content<?=$i;?> reply_form_active">
							<h5 class="reply_name reply_name<?=$i;?>"></h5>
							<input class="hiddencom<?=$i;?>" type="hidden" value="<?=$comId;?>" />
						</div>
						
						<script type="text/javascript">
							var xhr = new XMLHttpRequest();
								var hiddencom = document.querySelector('.hiddencom<?=$i;?>').value;
								

								
								
								xhr.onload = function(){
								var reply_name = document.querySelector('.reply_name<?=$i;?>');
								
								
									reply_name.innerHTML = this.responseText;
									

								};
								
								xhr.open("POST","phpCore/show_comment_reply.php?comId="+hiddencom+"",true);
								
								xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								
								xhr.send();
								
								
							</script>
						<!--< view reply end-->
						
						

						
						<!--< insert reply start-->
						<form class="reply_form<?=$i;?> reply_form_active" action="phpCore/insert_comment_reply.php" method="post">
							<textarea class="reply_box" placeholder="Do reply......." name="comment_reply" id="" cols="30" rows="10" required></textarea>
							<input class="comIDD" type="hidden" value="<?=$comId;?>" name="comID<?=$i;?>" />
							<input class="btn btn-success" value="Reply" type="submit" name="reply_submit" />
							<input name="i" type="hidden" value="<?=$i;?>"/>
							<input name="postid" type="hidden" value="<?=$id;?>" />
						</form>
						<!--< insert reply end-->
						
					</div>
					<script type="text/javascript">
						// for inserting comment reply
						var reply = document.querySelector(".reply<?=$i;?>");
						reply.addEventListener('click',function(){
							var reply_form = document.querySelector(".reply_form<?=$i;?>");
							reply_form.classList.toggle("reply_form_active");

						});
						
						// for showing commnet reply
						var show_reply_btn = document.querySelector(".view-all-reply<?=$i;?>");
						show_reply_btn.addEventListener('click',function(){
							var show_reply = document.querySelector(".view-all-reply-content<?=$i;?>");
							show_reply.classList.toggle("reply_form_active");

						});
					</script>
		<?php $i++; } }?>
				</div>
				

			<!--comment section end-->
				

				<div class="relatedpost clear">
				<h2>Related articles</h2>
					<?php 
					$catId = $result['cat'];
						$relQuery = "select * from tbl_post where cat = $catId order by rand() limit 6";
						$relPost = $db->select($relQuery);
						if($relPost){
						while($relResult = $relPost->fetch_assoc()){
					?>
					<a href="post.php?id=<?php echo $relResult['id'];?>"><img src="admin/upload/<?php echo $relResult['image'];?>" alt="post image"/></a>
					<?php } }else{
							echo "No related post available!";
					}?>
				</div>
				<?php }else{
					header("Location : 404.php");
				}?>
	</div>

		</div>

<?php include "inc/sidebar.php" ?>
<?php include "inc/footer.php"; ob_end_flush(); ?>		