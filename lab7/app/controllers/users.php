<?php
require_once('./app/models/userMod.php');
$uMod=new usersModel();

if(isset($_POST['fname'])){
	$uMod->register($_POST['fname'],$_POST['lname'],$_POST['uname'],$_POST['pass'],$_POST['email'],$_POST['terms']);
}elseif(isset($_GET['password'])){
	$uMod->login($_GET['username'],$_GET['password']);
}elseif(isset($_FILES['userfile'])){  
	$imageUp = $uMod->upload($_SESSION['userId'],$_SESSION['username'],$_FILES['userfile'],$_POST['title'],$_POST['description']);
	$images = $uMod->getImgs($_SESSION['userId']);
	header("Location: ./");
}elseif(isset($_GET['logout'])){
	session_destroy();
	header("Location: ./");
}elseif(isset($_SESSION['userId']) && !isset($_GET['photostream']) && !isset($_GET['upload'])){
	$images = $uMod->getImgs($_SESSION['userId']);
	require_once('app/views/photostream.php');
}elseif(isset($_SESSION['userId']) && isset($_GET['photostream'])){
	$images = $uMod->getImgs($_SESSION['userId']);
	require_once('app/views/photostream.php');
}elseif(isset($_SESSION['userId']) && isset($_GET['upload'])){
	require_once('app/views/upload.php');
}
?>