<?php include "helpers/Format.php" ?>
<?php include "lib/Database.php" ?>
<?php
	$db = new Database();
	$format = new Format();
	session_start();
?>





<!DOCTYPE html>
<html>
<head>
	<title>GrandCourse||Boost Your Skill</title>
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<meta name="keywords" content="blog,grandcourse">
	<meta name="author" content="Md Rabiul Hasan">
	
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">-->
	
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	
	<link rel="stylesheet" href="css/mystyle.css">
	<link rel="icon" href="images/logo.png">
	<script src="js/jquery.js" type="text/javascript"></script>
</head>

<body>
	
<style type="text/css">
.card.popupcard {
    margin-top: auto;
    margin-bottom: auto;
    border: 1px solid white;
    width: 400px;
    background-color: rgba(0,0,0,0.5) !important;
}
.card-body.popbody {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
    display: flex;
    text-align: center;
    margin: auto;
}
.social_icon span{font-size: 60px;margin-left: 10px;color: #12e9ff;}

.social_icon span:hover{
color: white;
cursor: pointer;
}

.card-header h3 {
    color: white;
    text-align: center;
}

.social_icon{
position: absolute;
right: 20px;
top: -45px;
}

.input-group-prepend span{width: 50px;background-color: #12e3ff;color: black;border:0 !important;}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}

.remember{
color: white;
}

.remember input
{
width: 20px;
height: 20px;
margin-left: 15px;
margin-right: 5px;
}

.login_btn{color: black;background-color: #12c2ff;width: 100px;}

.login_btn:hover{
color: black;
background-color: white;
}

.links{
color: white;
}

.links a{margin-left: 4px;text-decoration: none;}
a.home-page {
    color: aqua;
    border: 1px solid;
    padding: 4px;
    text-decoration: none;
}
h1.gc {
    text-align: center;
    color: #00e5fc;
    font-weight: bold;
    padding: 10px;
    position: relative;
    background: black;
    top: 0px!important;
    border: 1px solid white;
    margin: auto;
}
.logo-img>img{
	border-radius:10%;
}
.logo-img-register {
    text-align: center;
    position: relative;
    top: 110px;
    margin-bottom: 5px;
}
.logo-img-login {
    text-align: center;
    position: relative;
    top: 130px;
    margin-bottom: 5px;
}
.strength {
	display: none;
	color: red;
	text-align: center;
	margin: 0 auto;
	font-weight: bold;
	position: relative;
	top: -13px;
	font-size: 13px;
	background: black;
	width: 156px;
	float: right;
}
.popuplogin {
    z-index: 10000;
    position: fixed;
    left: 35%;
    top: 30%;
    background: black;
}


.wholepopup {
	display:none;
    height: 100%;
    width: 100%;
    position: fixed;
    z-index: 100000;
    top: 0;
    left: 0;
    overflow: auto;
    background: rgb(0,0,0);
    background: rgb(0,0,0,0.7);
}
span.cross {
    font-size: 53px;
    color: white;
    position: relative;
    right: -49px;
    top: -21px;
    cursor: pointer;
}
span.cross:hover {
    color: gray;
}
.popbody h3 {
    padding: 15px;
    font-size: 27px;
    color: white;
}.popbody a {
    padding: 15px;
}
</style>	
<?php 

if(!isset($_SESSION['loggedin']) && !isset($_SESSION['id'])){
	if(!isset($_COOKIE["user"])){
	setcookie("user","usersetcookie",time()+86400,"/");
?>	
<div class=" wholepopup">
<div class="popuplogin">
	<h1 class="gc" style="top: 130px;">GrandCourse<span class="cross">&times;</span></h1>
	<div class="d-flex justify-content-center h-100">
		<div class="card popupcard">
			<div class="card-header">
				<h3>For better experiance do</h3>
			</div>
			<div class="card-body popbody">
					<a href="login/login.php"><button class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Sign In</button></a>
					<h3>or</h3>
					<a href="login/register.php"><button class="btn btn-primary"><i class="fas fa-user-plus"></i> Register</button></a>
			</div>
		</div>
	</div>
</div>
</div>	
<script type="text/javascript">
var cross = document.getElementsByClassName("cross")[0];
var wholepopup = document.getElementsByClassName("wholepopup")[0];
	window.onload = setTimeout(function(){
		
		wholepopup.style.display="block";
	},3000)
	cross.onclick = function(){
		wholepopup.style.display="none";
		
	}	
	window.onclick=function(event){
		if(event.target == wholepopup){
			wholepopup.style.display="none";
		}
	}
		
</script>	
<?php  } } ?>
    <div id="top"> <!--start top bar-->
        <div class="container">
            <div class="row">
                <div class="col-md-6 offer">
					<?php
						if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ==true){?>
								<a class="btn btn-success btm-sm" href="user.php"><img class="userlogo" src="images/logo.png" alt="" /> <?php echo "Welcome ".$_SESSION['username']?></a>
					<?php }
						else{?>
						<a href="#" class="btn btn-success btm-sm"><i class="fas fa-user-circle"></i> Welcome guest</a>
						<?php }?> 
                </div>
                <div class="col-md-6">
                    <ul class="menu">
					<?php
						if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ==true){?>
							
					<?php }
						else{?>
						<li><a href="login/register.php"><i class="fas fa-user-plus"></i> Register</a></li>
						<?php }?>
                        
						
                        
					<?php
						if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ==true){ ?>
							<li><a style="color:black;" class="btn btn-warning btm-sm" href="login/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
						
					<?php }else{ ?>
                        <li><a href="login/login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
						<?php }?>
						
                    </ul>
                </div>
            </div>
        </div>
    </div><!--end top bar-->

<nav class="navbar navbar-expand-lg navbar-light bg-light" id="myHeader"> <!--navbar start-->
<div class="container">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand home">
                    <img height="86px" width="100px" class="d-none d-lg-block d-xl-block" src="images/logo.png" alt="GrandCouse"/>
                    <img height="50px" width="50px" class="d-block d-sm-block d-md-block d-lg-none" src="images/logo.png" alt="GrandCouse"/>
                </a>
            </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse padding-nav"  id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
						<li class="nav-item <?php if($active == 'home'){echo 'active';}?>">
                            <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="nav-item <?php if($active == 'course'){echo 'active';}?>">
                            <a class="nav-link" href="course.php"><i class="fas fa-graduation-cap"></i> Course</a>
                        </li>
                        <li class="nav-item <?php if($active == 'about'){echo 'active';}?>">
                            <a class="nav-link" href="about.php"><i class="fas fa-address-card"></i> About Us</a>
                        </li>
                        <li class="nav-item <?php if($active == 'contact'){echo 'active';}?>">
                            <a class="nav-link" href="contact.php"><i class="fas fa-file-signature"></i> Contact Us</a>
                        </li>
						
						
						
						<?php
						if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ==true){?>
							<li class="nav-item">
								<a class="nav-link <?php if($active == 'account'){echo 'active';}?>" href="user.php"><i class="fas fa-user-circle"></i> My Account</a>
							</li>
					<?php }
						else{?>
						<li class="nav-item">
                            <a class="nav-link <?php if($active == 'account'){echo 'active';}?>" href="login/login.php"><i class="fas fa-user-circle"></i> My Account</a>
                        </li>
						
						<?php }?> 		
            </ul>
			
            <form class="form-inline my-2 my-lg-0" action="search.php" method="get" >
				<input id="searchid" class="form-control mr-sm-2" name="search" type="search" placeholder="Search articles" aria-label="Search" required/>
				<button name="submit" class="btn btn-outline-primary my-2 my-sm-0 btn-primary" type="submit">Search</button>
            </form>
			
			<div id="realtimesearch" class="real-time-search-box">
				<div class="show-content">
					<p id="showsearch"></p>
				</div>
			</div>
			
			<script type="text/javascript">
				var search = document.getElementById("searchid");
				var showsearch = document.getElementById("showsearch");
				var realtimesearch = document.getElementById("realtimesearch");
				search.addEventListener("input", function(){
					
					showsearch.innerHTML="<i style='font-size:30px;text-align:center;width:100%;' class='fas fa-spinner fa-spin'></i>";

					realtimesearch.style.display = 'block';
					
					var xhr = new XMLHttpRequest;
					
					var value = search.value;
					
					xhr.onload = function(){
						if(this.status === 200){
						showsearch.innerHTML = this.responseText;
						}
					}
					
					xhr.onprogress = function(){
						showsearch.innerHTML="<i class='fas fa-spinner fa-spin'></i>";
						
					}
					
					xhr.open("POST","phpCore/search_real_time.php?value="+value+"",true);
					
					if(value.length === 0){
						realtimesearch.style.display = 'none';
					}
					
					xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					
					xhr.send();
					
				});
			</script>
			
			
        </div>
        </div>
    </nav><!--navbar end-->
		
<style type="text/css">
.sticky {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 2;
    box-shadow: 1px 4px 29px -18px black;
    transition: all 1s;
}
</style>
<script>
	window.onscroll = function() {myFunction()};

	var header = document.getElementById("myHeader");
	function myFunction() {
	  if (pageYOffset > 300) {
		header.classList.add("sticky");
	  } else {
		header.classList.remove("sticky");
	  }
	}
</script>
