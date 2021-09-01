<?php $active = 'contact'; include "inc/header.php"?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="card FadeIN-Left">
								<div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Contact us.
								</div>
								<div class="card-body">
									<form id="form_id" method="post" action="" >
										<div class="form-group">
											<label for="name">Name</label>
											<input id="name" name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name" required>
										</div>
										<div class="form-group">
											<label for="email">Email address</label>
											<input id="email" name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
										</div>
										<div class="form-group">
											<label for="subject">Subject</label>
											<input id="subject" name="subject" type="text" class="form-control" id="subject" aria-describedby="emailHelp" placeholder="Enter Subject" required>
										</div>
										<div class="form-group">
											<label for="message">Message</label>
											<textarea name="content" class="form-control" id="message" rows="6" required></textarea>
										</div>
										<div class="mx-auto">
										<span id="msgAlert"></span>
										<button id="formsubmitbtn" name="send" type="submit" class="btn btn-primary text-right">Submit</button>
										
										<button style="display:none" id="spinner" type="submit" class="btn btn-primary text-right"><i class='fas fa-spinner fa-spin'></i></button>
										
										<span style="display:none; width: fit-content;" id="sendok" class="btn btn-primary text-right"><i class="fas fa-check-circle"></i></span>
										
										</div>
									</form>		
									
			<script type="text/javascript">
				let formsubmitbtn = document.getElementById("formsubmitbtn");
				let spinner = document.getElementById("spinner");
				let sendok = document.getElementById("sendok");
				
				let form_id = document.getElementById("form_id");
				
				let msgAlert = document.getElementById("msgAlert");
				
				form_id.addEventListener("submit", function(event){
					
					showSpinner();
					
					let name = document.getElementById("name").value;
					
					let email = document.getElementById("email").value;
					
					let subject = document.getElementById("subject").value;
					
					let message = document.getElementById("message").value;
					
					event.preventDefault();

					const xhr = new XMLHttpRequest;
					
					xhr.open("POST","phpCore/mail.php?name="+name+"&email="+email+"&subject="+subject+"&content="+message+"",true);
					
					
					function showSpinner() {
						spinner.style.display = "block";
						formsubmitbtn.style.display = "none";
						sendok.style.display = "none";
					}
					
					function showOk() {
						sendok.style.display = "block";
						formsubmitbtn.style.display = "none";
						spinner.style.display = "none";
					}

					xhr.onreadystatechange = function() {
						if (xhr.readyState == 2) {
							showSpinner();
						}
						if (xhr.readyState == 4 && xhr.status == 200) {
							showOk();
							msgAlert.innerHTML = this.responseText;
						}
					};

					xhr.open("POST","phpCore/mail.php?name="+name+"&email="+email+"&subject="+subject+"&content="+message+"",true);
					
					xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
					xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
					
					xhr.send();
					
				});
			</script>
										
									
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-4 FadeIN-Right">
							<div class="card bg-light mb-3">
								<div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Address</div>
								<div class="card-body">
									<p>Chittagong,</p>
									<p>Chittagong,</p>
									<p>Bangladesh</p>
									<p>Email : ask@grandcourse.com</p>
									<p>Phone. +88012332434</p>

								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php include "inc/sidebar.php"?>
<?php include "inc/footer.php"?>