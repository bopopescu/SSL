<?php
$error = '';
if(isset($_POST['username'])){
	if(preg_match('^[a-zA-Z0-9]^', $_POST['username'])){}
	else{
		$error = "Your Username was typed incorrectly.";
	}
	if(preg_match('^[a-zA-Z0-9]^', $_POST['password'])){}
	else{
		$error = "Your Password was typed incorrectly.";
	}

	if ($error == ''){
		# salt and hashing
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password = md5($username.$password);
	}
}elseif(isset($_COOKIE['username'])){
	$username = $_COOKIE['username'];
}
if ($error=='') {
	$conn = new PDO('mysql:host=localhost;dbname=ssl_users;port=8889', 'root', 'root');
	$sql = 'SELECT * FROM users;';
	$comsql = 'SELECT * FROM comments;';

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
	echo "<span>$error</span>";
	include "index.php";
}
?>