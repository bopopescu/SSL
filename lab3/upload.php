<?php
$data = file('dictionary.txt');
$error = '';

if(isset($_POST['cap'])){
	if($_POST['cap']<9){$post=$_POST['captcha']."
";}
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
		$userCheck = '';
		$conn = new PDO('mysql:host=localhost;dbname=ssl_users;port=8889', 'root', 'root');
		$sql = 'SELECT id, username, password, thumb, image FROM users;';
		$comsql = 'SELECT id, userId, comment FROM comments;';
		foreach ($conn->query($sql) as $row){
			$userCheck = $row['username'];
		}
		if($userCheck==$_POST['username']){
			$error='That username already exits';
		}

		// salt and hasing
		// dynamic based on user
		$salt = $_POST['username'];
		$password = $_POST['password'];

		$rand = rand() . "\n";
		// user info
		$username = $_POST['username'];
		$password = md5($salt.$password);
		$thumb = "uploads/thumb_".$_FILES['userfile']['name'];
		$img = "uploads/".$_FILES['userfile']['name'];

		// sql calls
		// userId, username, password, thumb, image
		$stmt = $conn->prepare("insert into users (userId, username, password,image,thumb) values(:userId,:username,:password,:img,:thumb);");
		$stmt->bindParam(':userId',$userId);
		$stmt->bindParam(':username',$username);
		$stmt->bindParam(':password',$password);
		$stmt->bindParam(':thumb',$thumb);
		$stmt->bindParam(':img',$img);
		$stmt->execute();

		//physical path on Apache
		$uploaddir = 'uploads/';
		$uploadfile = $uploaddir.basename($_FILES['userfile']['name']);

		if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)){
			imageResize("uploads/".$_FILES['userfile']['name'], 'uploads/thumb_'.$_FILES['userfile']['name'],100,100);
		}
	}
}

if($error == ''){
	foreach ($conn->query($sql) as $row) {
		$userId = $row['id'];
		$username = $row['username'];
		$password = $row['password'];
		$img = $row['image'];
		$thumb = $row['thumb'];
	}

	foreach ($conn->query($comsql) as $row){
		$comId = $row['id'];
		$comUserId = $row['userId'];
		$title = $row['title'];
		$titleArray[] = $title;
		$comment = $row['comment'];
		$commentArray[] = $comment;
	}

	echo "<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
	<link rel='stylesheet' href='main.css'>
</head>
<html>
	<header>
		<img class='thumb' src='".$thumb."' /><br />
		<h3>Welcome ".$username."</h3>
		<a href='http://localhost:8888/ssl/lab3'>logout</a>
	</header>
	<div id='comment'>
		<form id='commenting' method='POST' action='comment.php'>
			<input name='title' type='text' placeholder='Title'>
			<textarea name='comment' rows=7 cols=78 required='required'></textarea>
			<input name='userId' type='hidden' value=".$userId.">
			<input type='submit'>
		</form>
		<ul id='comments'>";
	for($i=0; $i<count($commentArray)-1; $i++){
		echo "<li class='comment'><h3>".$titleArray[$i]."</h3><p>".$commentArray[$i]."</p><div class='acont'><a class='edit' href=''>Edit</a><a class='delete' href=''>Delete</a></div></li>";
	}
		echo "</ul>
		<div class='push'></div>
	</div>
</html>";
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