<?php
session_start();
if(isset($_SESSION['username'])){
	include "upload.php";
}else{
	echo '<link rel="stylesheet" href="main.css">';
	echo '
	<div id="signup">
		<h3>Sign Up</h3>
		<form enctype="multipart/form-data" action="upload.php" method="POST">
			<label>Username:</label> <input name="username" type="text" required="required"/><br/>
			<label>Password:</label> <input name="password" type="Password" required="required"/><br/>
			<label>Avatar:</label> <input name="userfile" type="file" required="required" /><br />';
		include "cap.php";
		echo '	<input type="submit" value="Sign Up" />
		</form>
	</div>
	<div id="signin">
		<h3>Sign In</h3>
		<form enctype="multipart/form-data" action="login.php" method="POST">
			<label>Username:</label> <input name="username" type="text" required="required"/><br/>
			<label>Password:</label> <input name="password" type="Password" required="required"/><br/>
			<input name="login" type="submit" value="Sign In" />
		</form>
	</div>';
}
?>