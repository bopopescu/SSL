<?php
class usersModel {
	function login($username,$password){
		$conn = new PDO('mysql:host=localhost;dbname=ssl-aperature;port=8889;','root','root');
		$sqlstmt=$conn->prepare("select * from users where username='$username'and password='$password';");
		$sqlstmt->execute();
		$results=$sqlstmt->fetchAll(PDO::FETCH_ASSOC);
		if(isset($results[0]['id'])){
			$_SESSION['userId']=$results[0]['id'];
			$_SESSION['username']=$username;
			header("Location: ./");
		}else{
			header('Location: ./');
		}
	}
	function register($fname,$lname,$uname,$pass,$email,$terms){
		$terms = intval($terms);
		$key = 'tardis';
		$password = md5($uname.$pass.$key);
		
		global $conn;
		$stmt=$conn->prepare("INSERT INTO users(username, fName, lName, password, email) VALUES (:uname, :fname, :lname, :pass, :email);");
		$stmt->bindParam(':uname', $uname);
		$stmt->bindParam(':fname', $fname);
		$stmt->bindParam(':lname', $lname);
		$stmt->bindParam(':pass', $pass);
		$stmt->bindParam(':email', $email);
		$stmt->execute();
		$results=$stmt->fetchAll(PDO::FETCH_ASSOC);

		header('Location: ./');
	}
	function getImgs($userId){
		global $conn;
		$uArray=array();
	    foreach($conn->query("SELECT * FROM images WHERE userId='".$userId."' ORDER BY id desc;")as $row){
	        $obj = array("id"=>$row['id'], "userId"=>$userId, "title"=>$row['title'], "imgPath"=>$row['imgPath'], "description"=>$row['description'], "views"=>$row['views']);
	        array_push($uArray,$obj);
	    }
	    return $uArray;
	    header("Location: ./");
	}
	function upload($userId,$username,$userfile,$title,$description){
		global $conn;
		$views = 0;
		$img = "./assets/images/userImages/".$username."_".$userId."/".$_FILES['userfile']['name'];
		$uploaddir = './assets/images/userImages/'.$username.'_'.$userId.'/';
		$uploadfile = $uploaddir.basename($_FILES['userfile']['name']);
		if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)){
			$stmt=$conn->prepare('INSERT INTO images(userId, title, imgPath, description, views) VALUES ('.$userId.', "'.$title.'", "'.$img.'", "'.$description.'", '.$views.');');
			$stmt->execute();
		}else{
			header("Location: ./assets/images/userImages/$username"."_"."$userId");
		}

		
	}
};
?>