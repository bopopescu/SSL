<?php
require_once('models/userMod.php');
$uMod=new usersModel();
if(isset($_GET['yaPass'])){
	$uMod->login($_GET['yaName'],$_GET['yaPass']);
}elseif(isset($_GET['userId'])){
	$clients = $uMod->getClients();
	require_once('views/userpage.php');
}elseif(isset($_GET['delClient'])){
	$uMod->deleteClient($_GET['delClient']);
	header('Location: ./');
}elseif(isset($_GET['update'])){
	$uMod->update($_GET['id'],$_GET['title'],$_GET['message']);
	header('Location: ./?clientId='.$clientId);
}elseif(isset($_GET['delete'])){
	$uMod->delete($_GET['id']);
	header('Location: ./?clientId='.$_GET['clientId']);
}elseif(isset($_GET['title'])){
	$uMod->insert($_GET['clientId'],$_GET['title'],$_GET['message']);
	header('Location: ./?clientId='.$_GET['clientId']);
}elseif(isset($_GET['signout'])){
	session_destroy();
	header('Location: index.php');
}elseif(isset($_GET['newClient'])){
	$uMod->newClient($_GET['newClient']);
	header('Location: index.php');
}elseif(isset($_GET['clientId'])){
	$messages = $uMod->getMsgs($_GET['clientId']);
	require_once('views/msgview.php');
}elseif(isset($_SESSION['userId'])){
	$clients = $uMod->getClients();
	require_once('views/userpage.php');
}else{
	echo "No session is currently set";
}


// switch($_GET){
// case isset($_GET['yaPass']):
// 	$uMod->login($_GET['yaName'],$_GET['yaPass']);
// 	break
// case isset($_GET['update']:
// 	$uMod->update($_GET['id'],$_GET['title'],$_GET['message']);
// 	break
// case isset($_GET['delete'])){
// 	$uMod->delete($_GET['id']:
// 	break
// case isset($_GET['title'])){
// 	$uMod->insert($_GET['title'],$_GET['message']);
// 	break
// case isset($_GET['signout']):
// 	session_destroy();
// 	header('Location: index.php');
// 	break
// case isset($_SESSION['userId']):
// 	$messages = $uMod->getMsgs();
// 	require_once('views/msgview.php');
// 	break
// default:
// 	echo "No session is currently set";
// }

 //for debugging only!
?>