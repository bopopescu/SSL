<?php
session_start();
if(isset($_SESSION['username'])){
	include "upload.php";
}else{
	echo '<link rel="stylesheet" href="main.css">';
	echo '
	<form enctype="multipart/form-data" action="upload.php" method="POST">
		<label>Avatar:</label> <input name="userfile" type="file" required="required" /><br />
		<label>Username:</label> <input name="username" type="text" required="required"/><br/>
		<label>Password:</label> <input name="password" type="Password" required="required"/><br/>';
	include 'cap.php';
	echo '	<input type="submit" value="Sign Up" />
	</form>';
}
?>