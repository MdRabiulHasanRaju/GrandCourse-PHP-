<?php
session_start();

		/*Comment insert section start*/
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$id = $_POST['postid'];
			$i = $_POST['i'];
		include "../login/config.php";			
			if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
						if(isset($_POST['reply_submit']) && isset($_REQUEST['comment_reply']) && isset($_REQUEST['comID'.$i])){
							$sql = "select * from users_info where userid = ?";
							$stmt = mysqli_prepare($conn, $sql);
							mysqli_stmt_bind_param($stmt, "i" , $reply_U_id);
							$reply_U_id = $_SESSION['id'];
							mysqli_stmt_execute($stmt);
							mysqli_Stmt_store_result($stmt);
							mysqli_stmt_bind_result($stmt,$puserInfoId,$puserId,$puserName,$puserAddress,$pmobile);
							mysqli_stmt_fetch($stmt);
							
							
							
							
							$reply_insert = "insert into comments_reply(parent_com_id,content,userid,username,reply_postid) values(?,?,?,?,?)";
							$reply_stmt = mysqli_prepare($conn,$reply_insert);
							mysqli_stmt_bind_param($reply_stmt, "isisi", $param_parent_com_id, $param_reply_content, $param_reply_userid, $param_reply_username, $param_post_id);
							$param_parent_com_id  = $_REQUEST['comID'.$i];
							$param_reply_content  = $_REQUEST['comment_reply'];
							$param_reply_userid   = $puserId;
							$param_reply_username = $puserName;
							$param_post_id        = $id;
							if(mysqli_stmt_execute($reply_stmt)){
								header("location: ../post.php?id=$id");
								die();
							}else{ 
								$loginAlert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">You should create your profile first from <strong>MY ACCOUNT MENU</strong>.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
								
								$_SESSION["loginAlert"] = $loginAlert;
								header("location: ../post.php?id=$id");
								die();
				             }
						}else{ 
							// echo "comment not submitted!"
						;}
					}else{
						if(isset($_POST['reply_submit']) && isset($_REQUEST['comment_reply']) && isset($_REQUEST['comID'.$i])){
							$loginAlert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">You must login first.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
							
							$_SESSION["loginAlert"] = $loginAlert;
							header("location: ../post.php?id=$id");
							die();
							} 
						 } 
		}else{
	
			header("location: ../post.php?id=$id");
			die();
		}		

?>