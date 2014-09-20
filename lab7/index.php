<?php
session_start();
//creating  the connection 
$conn = new PDO('mysql:host=localhost;dbname=ssl-aperature;port=8889;','root','root');
//checking for currently open session then bringeng them to their data
//if username and password match the database, then relocate to the user page
if(isset($_SESSION['userId'])||isset($_GET['username'])||isset($_POST['uname'])){
	require_once('app/controllers/users.php');
}else{
	require_once('app/views/home.php');
}
// var_dump($_SESSION);

?>