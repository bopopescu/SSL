<?php
session_start();
//creating  the connection 
$conn = new PDO('mysql:host=localhost;dbname=ssl-lab5;port=8889;','root','root');
//checking for currently open session then bringeng them to their data
//if username and password match the database, then relocate to the user page
if(isset($_SESSION['userId'])||isset($_GET['yaName'])){
	require_once('controllers/users.php');
	//header('Location:views/userpage.php');
}else{
	include 'views/home.php';
}
// var_dump($_SESSION);

?>