<?php
$data = file('dictionary.txt');
$error = '';

if(isset($_POST['cap'])){
	if($_POST['cap']<9){$post=$_POST['captcha']."
";}else{$post=$_POST['captcha'];}
	if(preg_match('^[a-zA-Z0-9]^', $_POST['username'])){}
	else{
		$error = "Your Username was typed incorrectly.";
	}
	if(preg_match('^[a-zA-Z0-9]^', $_POST['password'])){}
	else{
		$error = "Your Password was typed incorrectly.";
	}
	if($data[$_POST['cap']] != $post){
		$error = "Your Captcha was typed incorrectly.";
	}

	if($error == ''){
		// salt and hasing
		// dynamic based on user
		$salt = $_POST['username'];
		$password = $_POST['password'];

		// user info
		$username = $_POST['username'];
		$password = md5($salt.$password);
		$thumb = "uploads/thumb_".$_FILES['userfile']['name'];
		$img = "uploads/".$_FILES['userfile']['name'];

		// session calls
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['img'] = $img;
		$_SESSION['thumb'] = $thumb;

		//physical path on Apache
		$uploaddir = 'uploads/';
		$uploadfile = $uploaddir.basename($_FILES['userfile']['name']);

		if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)){
			imageResize("uploads/".$_FILES['userfile']['name'], 'uploads/thumb_'.$_FILES['userfile']['name'],100,100);
		}
	}
}

if($error == ''&& isset($_SESSION['username'])){
	echo "<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
	<link rel='stylesheet' href='main.css'>
</head>
<html>
	<center>
		<img class='thumb' src='".$_SESSION['thumb']."' /><br />
		<h3>Username: ".$_SESSION['username']."</h3>
		<p>Password Key:".$_SESSION['password']."</p><br />
		<img class='big' src='".$_SESSION['img']."' />
	</center>
</html>";
	session_destroy();
}else{
	include "index.php";
	echo "<span>$error</span>";
}

function imageResize($file, $name, $h, $w){
	// Get File Extension
	$type=substr($file, -3);
	switch($type){
		case $type == 'jpg':
			$canvas = imagecreatefromjpeg($file);
			break;
		case $type == 'png':
			$canvas = imagecreatefrompng($file);
			break;
		case $type == 'bmp':
			$canvas = imagecreatefromwbmp($file);
			break;
		case $type == 'gif':
			$canvas = imagecreatefromgif($file);
			break;
	}
	// getimagesize(); => returns arr[width,height]
	$size = getimagesize($file);
	$fileWidth = $size[0];
	$fileHeight = $size[1];
	// imagecreatetruecolor(width, height)
	$content = imagecreatetruecolor($w, $h);
	// imagecopyresampled(dst_image, src_image, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
	imagecopyresampled($content,$canvas,0,0,0,0,$w,$h,$fileWidth,$fileHeight);
	// imagepng($content, src file, quality 0-9);
	imagepng($content,$name,9);
	// Frees up the resources by remove the canvas from the RAM
	imagedestroy($canvas);
}
?>