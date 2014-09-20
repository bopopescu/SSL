<?php
//cityresponse.php

$cityentered=trim($_GET['cityget']).'%';
$dbh = new PDO('mysql:host=localhost;dbname=worldcities;port=8889', 'root', 'root');

$stmt=$dbh->prepare('SELECT city, region FROM cities WHERE city_ascii LIKE :cityentered AND country = "us" ORDER BY city_ascii LIMIT 20;');
$stmt->bindParam(':cityentered', $cityentered);
$stmt->execute();
$result=$stmt->fetchAll();

//print_r($result);

//echo json_encode($result);

for($i=0; $i<count($result)-1; $i++){
	$city = json_encode($result{$i}['city']);
	$state = json_encode($result{$i}['region']);
	echo "<p class='city".$i."'>".str_replace('"', "", $city).", ".str_replace('"', "", $state)."</p>";
}


?>