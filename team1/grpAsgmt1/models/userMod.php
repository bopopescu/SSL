<?php
// //db.php
// class db{
// 	public function __construct(){
// 		$db = PDO()...
// 		$conn = $db;
// 	}
// }
// This is a demo as how to make a single connection that each one will have through ' extends db' 
// //userM.php
// include 'db.php';
				/*extends db{*/
class usersModel {
	function login($username,$pass){
		global $conn;
			// $this->
		$sqlstmt=$conn->prepare("select * from users where yaName='$username'and yaPass='$pass';");
		$sqlstmt->execute();
		$results=$sqlstmt->fetchAll(PDO::FETCH_ASSOC);
		if(isset($results[0]['id'])){
			$_SESSION['userId']=$results[0]['id'];
			$_SESSION['username']=$username;
			//grabs the client page
			header('Location:index.php?userId=true');
			exit();
		}else{
			require_once('views/home.php');
		} 
	}
	
	function insert($clientId,$title,$message){
		global $conn;
	    $stmt=$conn->prepare("INSERT INTO notes (clientId, title, words) VALUES (:clientId,:title,:message);");
	    $stmt->bindParam(':clientId',$clientId);
	    $stmt->bindParam(':title',$title);
	    $stmt->bindParam(':message',$message);
	    $stmt->execute();
	}
	function newClient($clientName){
		global $conn;
	    $stmt=$conn->prepare("INSERT INTO clients (userId, name) VALUES (:userId, :name)");
	    $stmt->bindParam(':userId',$_SESSION['userId']);
	    $stmt->bindParam(':name',$clientName);
	    $stmt->execute();
	}
	function getMsgs($clientId){
		global $conn;
		$uArray=array();
	    //calling the table data    $sql = 'SELECT name, color FROM fruit_table ORDER BY name';
	    foreach($conn->query("SELECT * FROM notes WHERE clientId = '".$clientId."' ORDER BY title;")as $row){
	        $obj = array("id"=>$row['id'], "title"=>$row['title'], "message"=>$row['words'], "clientId"=>$clientId);
	        array_push($uArray,$obj);
	    }
	    return $uArray;
	}
	
	function getClients(){
		global $conn;
		$clients=array();
	    //calling the table data    $sql = 'SELECT name, color FROM fruit_table ORDER BY name';
	    foreach($conn->query("SELECT * FROM clients WHERE userId = '".$_SESSION['userId']."' and statusId = 1 ORDER BY name;")as $row){
	        $obj = array("id"=>$row['id'], "name"=>$row['name']);
	        array_push($clients,$obj);
	    }
	    return $clients;
	}
	function delete($id){
		global $conn;
	    $sth=$conn->prepare('DELETE FROM notes WHERE id = :id');
	    $sth->bindParam(':id',$id, PDO::PARAM_STR);
	    $sth->execute();
	}
	function deleteClient($id){
		global $conn;
	    $sth=$conn->prepare('UPDATE clients SET statusId=2 WHERE id = :id;');
	    $sth->bindParam(':id',$id);
	    $sth->execute();
	}
	//fix for later user
	function update($id,$title,$msg){
		global $conn;
	    
	    $sth = $conn->prepare('UPDATE notes SET title=:title WHERE id = :id; UPDATE notes SET words=:words WHERE id = :id;');
	    $sth ->bindParam(':id',$id);
	    $sth ->bindParam(':title',$title);
	    $sth ->bindParam(':words',$msg);
	    $sth->execute();

	    if($sth -> errorCode() ==0){
	    	header('Location: index.php');
	    }else{
	        $errors=$stmt->errorInfo();
	        echo($errors[2]);
	    }
	}
};
?>