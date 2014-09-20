<?php
session_start();
ini_set('session.gc_maxlifetime', 60);
?>

<html>
	<body>

		<form action="" method="post" enctype="multipart/form-data">
			<input type="text" name="fname" placeholder="First Name">
			<input type="text" name="lname" placeholder="Last Name">
			<input type="file" name="filename">
			<input type="submit">
		</form>

		<?php
		$_SESSION['name'] = $_POST['fname']." ".$_POST['lname'];

		var_dump($_FILES);
		var_dump($_FILES['filename']['name']);

		$uploaddir = 'uploads/'; //physical path on Apache
		$uploadfile = $uploaddir . basename($_FILES['filename']['name']);

		if(move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile)){
			echo "File is valid and was successfully uploaded.\n";
		}else{
			echo "Possible file upload attack!\n";
		}
		print_r($_FILES);
		?>

	</body>
</html>