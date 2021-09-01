<?php
include "../login/config.php";
	$search = "%{$_GET['value']}%";
	$sql = "select id,title from tbl_post where title like ? or body like ? limit 7";
	$stmt = mysqli_prepare($conn,$sql);
	mysqli_stmt_bind_param($stmt,'ss',$param_search1,$param_search2);
	$param_search1 = $search;
	$param_search2 = $search;
	mysqli_stmt_execute($stmt);
	mysqli_stmt_store_result($stmt);


	if(mysqli_stmt_num_rows($stmt)==0){
		echo 'No match found!';
	}elseif(mysqli_stmt_num_rows($stmt)>6){
		mysqli_stmt_bind_result($stmt,$id,$title);
		while(mysqli_stmt_fetch($stmt)){
			echo '<a href="post.php?id='.$id.'"><i class="fas fa-search"></i> '.$title.'</a><br/><br/>';
			}
			echo "more...";
	}
	else{
		mysqli_stmt_bind_result($stmt,$id,$title);
		while(mysqli_stmt_fetch($stmt)){
			echo '<a href="post.php?id='.$id.'"><i class="fas fa-search"></i> '.$title.'</a><br/><br/>';
			}
	}	
?>