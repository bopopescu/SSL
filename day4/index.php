<?php
$dbh = new PDO('mysql:host=localhost;dbname=fruits;port=8889', 'root', 'root');

$stmt = $dbh->prepare("select * from fruit_table");
$stmt->execute();
$fruits = $stmt->fetchAll();

function xml($fruits){
	//  DIPLAY DATA FROM TABLE IN XML
	header('Content-type:xml/text');
	echo '<?xml version="1.0"?>
	<fruits>';
	foreach($fruits as $fruit){
		echo "<id>".$fruit["id"]."</id>
		<fruitname>".$fruit["name"]."</fruitname>
		<fruitcolor>".$fruit["color"]."</fruitcolor>";
	}
	echo "</fruits>";
}
// xml($fruits);

function json($fruits){
	//  DISPLAY DATA FROM TABLE IN JSON
	header("Content-type: application/json");
	echo json_encode($fruits);
}
json($fruits);
?>