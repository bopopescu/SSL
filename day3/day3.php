<?php
$user="root";
$pass="root";
$dbh=new PDO('mysql:host=localhost;dbname=fruits;port=8889',$user,$pass);

function addFruit($dbh){
	$stmt=$dbh->prepare("INSERT INTO fruit_table(name, color)
		VALUES(:name, :color)");
	$stmt->bindParam(':name', $name);
	$stmt->bindParam(':color', $color);
	$name='apple';
	$color='red';
	$stmt->execute();
}

//addFruit($dbh);

function getFruit($dbh){
	$sql='SELECT name, color FROM fruit_table ORDER BY name';
	foreach($dbh->query($sql) as $ $row){
		echo $row['name']."\t";
		echo $row['color']."\t";
	}
}

//getFruit($dbh);

function update($dbh){
	$name = 'tangerine';
	$color = 'orange';
	$sth = $dbh->prepare('UPDATE fruit_table SET color=:color WHERE name=:name');
	$sth->bindParam(':name', $name);
	$sth->bindParam(':color', $color);
	$sth->execute();
}

//update($dbh);

function delete($dbh){
	$name = 'tangerine';
	$sth = $dbh->prepare('DELETE FROM fruit_table WHERE name = :name');
	$sth->bindParam(':name', $name);
	$sth->execute();
}

//delete($dbh);

echo "DONE";
?>