</div>




<section class="footers bg-light pt-5 pb-3">
   <div class="container pt-5">
       <div class="row">
           <div class="col-xs-12 col-sm-6 col-md-4 ">
    		    <div class="footers-logo">
    		        <img height="86px" width="100px" class="d-none d-lg-block d-xl-block" src="images/logo.png" alt="GrandCouse"/>
    		    </div>
    		    <div class="footers-info mt-3">
    		        <p>GrandCourse is a learning website.</p>
    		    </div>
    		    <div class="social-icons"> 
					<a href=""><i id="social-fb"  class="fab fa-facebook-square fa-2x social"></i></a>
					<a href="mailto:"><i id="social-em" class="fa fa-envelope-square fa-2x social"></i></a>
				</div>
    		</div>
    	   <div class="col-xs-12 col-sm-6 col-md-2 footers">
    		    <h5>Pages </h5>
    		    <ul class="list-unstyled">
    			 <li><a href="index.php">Home</a></li>
    			 <li><a href="course.php">Course</a></li>
    			 <li><a href="contact.php">Contact Us</a></li>
    			 <li><a href="about.php">About Us</a></li>
				<?php
				if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ==true){?>
					<li class="nav-item">
						<a href="user.php">My Account</a>
					</li>
				<?php }
				else{?>
				<li class="nav-item">
					<a href="login/login.php">My Account</a>
				</li>
				
				<?php }?> 
    			</ul>
    		</div>
    	   <div class="col-xs-12 col-sm-6 col-md-2 footers">
    		    <h5>User Information </h5>
    		    <ul class="list-unstyled">
				
				
					<?php
						if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ==true){?>
							<a href="user.php"><i class="fas fa-user-circle"></i> <?php echo $_SESSION['username']?></a>
					<?php }
						else{?>
						<li><a href="login/register.php">Register</a></li>
						<?php }?>

					<?php
						if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ==true){ ?>
							<li><a style="color:red;" href="login/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
						
					<?php }else{ ?>
                        <li><a href="login/login.php">Login</a></li>
						<?php }?>
				 
				 
                 <li><a href="#">Policy</a></li>
    			 <li><a href="#">Terms And Conditions</a></li>
    			</ul>
    		</div>

    	   <div class="col-xs-12 col-sm-6 col-md-2 footers">
    		    <h5>Where to find US </h5>
    		    <ul class="list-unstyled">
    			 <li><a href="#">GrandCourse</a></li>
    			 <li><a href="#">Chittagong,</a></li>
    			 <li><a href="#">Eidgah, Amtol</a></li>
    			 <li><a href="#">Fokir Golli</a></li>
    			 <li><a href="#">HOUSE NO </a></li>
    			</ul>
    		</div>
    		
       </div>
   </div>
</section>
<section class="disclaimer bg-light border">
    <div class="container">
        <div class="row ">
            <div class="col-md-12 py-2">
                <small>
                   Disclaimer: 
               </small>
            </div>
        </div>
    </div>
</section>
<section class="copyright border">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12 pt-3">
                <p class="text-muted">© 2021 GrandCourse</p>
            </div>
        </div>
    </div>







	<div class="fixedicon clear">
		<a href="http://www.facebook.com"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="http://www.twitter.com"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="http://www.linkedin.com"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="http://www.google.com"><img src="images/gl.png" alt="GooglePlus"/></a>
	</div>
	<script type="text/javascript" src="js/scrolltop.js"></script>
	<script type="text/javascript" src="js/popper.js"></script>
    <script src="bootstrap/jquery/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
	
</body>
</html>