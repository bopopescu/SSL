<?php
	$conn = new PDO('mysql:host=localhost;dbname=ads;port=8889;','root','root');
	$sqlstmt=$conn->prepare("SELECT image, link from additems ORDER BY rand() LIMIT 0,1");
	$sqlstmt->execute();
	$results=$sqlstmt->fetchAll(PDO::FETCH_ASSOC);

	$image = json_encode($results);

	echo $image
?>