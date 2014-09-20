<?php
function insert($name,$entry){
	global $conn;
    $stmt=$conn->prepare("INSERT INTO blog (name, entry) VALUES (:name,:entry);");
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':entry',$entry);
    $stmt->execute();
}
function delete($id){
	global $conn;
    $sth=$conn->prepare('DELETE FROM notes WHERE id = :id');
    $sth->bindParam(':id',$id, PDO::PARAM_STR);
    $sth->execute();
}
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
?>