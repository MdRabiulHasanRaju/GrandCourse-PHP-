<?php
session_start();

		/*Comment insert section start*/
		if($_SERVER['REQUEST_METHOD'] == "POST"){
		include "../login/config.php";	
				$id = $_POST['postid'];		
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
			if(isset($_REQUEST['comment_submit']) && isset($_POST['comment'])){
				$comment = $_POST['comment'];
				
				/*for user information*/
				$userId = $_SESSION['id'];
				$user_info_sql = "select * from users_info where userid=?";
				$user_info_stmt = mysqli_prepare($conn,$user_info_sql);
				mysqli_stmt_bind_param($user_info_stmt,"i",$param_userId);
				$param_userId = $_SESSION['id'];
				mysqli_stmt_execute($user_info_stmt);
				mysqli_stmt_store_result($user_info_stmt);
				mysqli_stmt_bind_result($user_info_stmt,$userInfoId,$userId,$userName,$userAddress,$mobile);
				mysqli_stmt_fetch($user_info_stmt);
				/*for user information*/
				

				
				/*storing comment*/
				$query = "insert into comments(name,content,userid,postid) values(?,?,?,?)";
				$stmt = mysqli_prepare($conn,$query);
				mysqli_stmt_bind_param($stmt,"ssii",$name,$content,$userid,$postid);
				$name = $userName;
				$content = $comment;
				$userid = $userId;
				$postid = $id;
				if(mysqli_stmt_execute($stmt)){
					header("location: ../post.php?id=$id");
					die();
				}
				else{ 
					$loginAlert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">You should create your profile first from <strong>MY ACCOUNT MENU</strong>.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
					$_SESSION["loginAlert"] = $loginAlert;
					header("location: ../post.php?id=$id");
					die();
				}
				/*storing comment*/
				}
				
		}else{
			if(isset($_REQUEST['comment_submit']) && isset($_POST['comment'])){
				$loginAlert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">You must login first.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
				$_SESSION["loginAlert"] = $loginAlert;
				header("location: ../post.php?id=$id");
				die();
			 }
		}/*Comment insert section end*/
		}else{
	
			header("location: ../post.php?id=$id");
			die();
		}

?>