<? include 'header.php' ?>
			<main id="landing">
				<div id="slider1_container">
					<div class="slides" u="slides">
				        <div class="slide">
				        	<img u="image" src="assets/images/userImages/holly_1/View Out the Back of the Fueler Djibouti, Africa.jpg" />
				        </div>
				        <div class="slide">
				        	<img u="image" src="assets/images/userImages/holly_1/_DSC1517.jpg" />
				        </div>
				        <div class="slide">
				        	<img u="image" src="assets/images/userImages/holly_1/Aircrew Along for the Ride 2 Djibouti, Africa.jpg" />
				        </div>
				        <div class="slide">
				        	<img u="image" src="assets/images/userImages/holly_1/Flying over Lake Assal, Djibouti, Africa.jpg" />
				        </div>
				        <div class="slide">
				        	<img u="image" src="assets/images/userImages/holly_1/Sling Load Djibouti, Africa.jpg" />
				        </div>
				    </div>
					<img id="bg" >
				</div>
				<div class="width">
					<div class="signReg">
						<form class="signIn" method="GET" action="./?photostream=true">
							<div>
								<label for="username">Username</label>
								<input name="username" id="username" type="text" placeholder="holly" autofocus>
							</div>
							<div>
								<label for="password">Password</label>
								<input name="password" id="password" type="password" placeholder="pass">
							</div>
							<input type="submit" value="Log In">
						</form>
						<div class="register">
							<h3>Not a Member Yet?</h3>
							<p class="registerButton button">Register</p>
						</div>
					</div>
				</div>
				<div class="modalWindow registerModalWindow">
					<div class="registerModal modal">
						<p class="registerModalClose">X</p>
						<h3>Register</h3>
						<form class="signIn" method="POST" action="./">
							<div>
								<label for="fname">First Name</label>
								<input name="fname" id="fname" type="text" placeholder="First Name">
							</div>
							<div>
								<label for="lname">Last Name</label>
								<input name="lname" id="lname" type="text" placeholder="Last Name">
							</div>
							<div>
								<label for="uname">Username</label>
								<input name="uname" id="uname" type="text" placeholder="Username">
							</div>
							<div>
								<label for="pass">Password</label>
								<input name="pass" id="pass" type="password" placeholder="Password">
							</div>
							<!-- <div>
								<label for="pass2">Re-Type Password</label>
								<input name="pass2" id="pass2" type="password" placeholder="Re-Type Password">
							</div> -->
							<div>
								<label for="email">Email</label>
								<input name="email" id="email" type="email" placeholder="ex. email@domain.com">
							</div>
							<div class="terms">
								<small>I agree to the Terms</small>
								<input type="checkbox" name="terms" value="1" required>
							</div>
							<input type="submit" value="Register">
						</form>
					</div>
				</div>
			</main>
<? include 'footer.php' ?>