<?php
$error = '';

if(isset($_POST['comment'])){
	$title = $_POST['title'];
	$comment = $_POST['comment'];
	$userId = $_POST['userId'];

	if($error == ''){
		$userCheck = '';
		$conn = new PDO('mysql:host=localhost;dbname=ssl_users;port=8889', 'root', 'root');
		$usersql = 'SELECT * FROM users;';
		$comsql = 'SELECT * FROM comments;';
		$commentArray = array();

		$stmt = $conn->prepare("INSERT INTO comments (userId, title, comment) values(:userId,:title,:comment);");
		$stmt->bindParam(':userId',$userId);
		$stmt->bindParam(':title',$title);
		$stmt->bindParam(':comment',$comment);
		$stmt->execute();

		foreach ($conn->query($usersql) as $row){
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
		<a id='logout' href=''>logout</a>
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
}else{
	$userCheck = '';
	$conn = new PDO('mysql:host=localhost;dbname=ssl_users;port=8889', 'root', 'root');
	$usersql = 'SELECT id, username, password, thumb, image FROM users;';
	$comsql = 'SELECT id, userId, comment FROM comments;';
	$commentArray = array();

	$stmt = $conn->prepare("INSERT INTO comments (userId, comment) values(:userId,:comment);");
	$stmt->bindParam(':userId',$userId);
	$stmt->bindParam(':comment',$comment);
	$stmt->execute();

	foreach ($conn->query($usersql) as $row){
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
		<a id='logout' href=''>logout</a>
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
		</div class='push'></div>
	</div>
</html>";
}
?>