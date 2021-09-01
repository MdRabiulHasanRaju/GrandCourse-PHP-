<?php
include "../login/config.php";
	$comId = $_REQUEST['comId'];
	$comment_reply_sql = "select * from comments_reply where parent_com_id = ?";
	$comment_reply_stmt = mysqli_prepare($conn,$comment_reply_sql);
	mysqli_stmt_bind_param($comment_reply_stmt,"i",$param_parent_com_id);
	$param_parent_com_id = $comId;
	mysqli_stmt_execute($comment_reply_stmt);
	mysqli_stmt_store_result($comment_reply_stmt);


	if(mysqli_stmt_num_rows($comment_reply_stmt)==0){
		echo 'Empty reply!';
	}else{
	mysqli_stmt_bind_result($comment_reply_stmt,$com_reply_id,$com_reply_parent_id,$reply_content,$reply_userid,$reply_username,$reply_post_id);
	while(mysqli_stmt_fetch($comment_reply_stmt)){
		echo "Name: ".$reply_username."</br>";
		echo '<p style="color:black;">'.$reply_content.'</p>';
		}
	}	
?>