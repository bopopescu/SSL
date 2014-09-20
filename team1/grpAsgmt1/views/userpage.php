<!doctype html>
<html>
	<head>
		<title>Im here!</title>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link href="http://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<a class="col-md-offset-11 col-md-1" href="./?signout=true">
            <button>Log-out</button>
        </a>
		<h1 id="userH1"><?=$_SESSION['username'];?></h1>
		<section class="box">
			<h3>Users</h3>
			<ul>
				<? foreach($clients as $client){?>
				<li>
					<a id="list"href="./?clientId=<?=$client['id'];?>"><?=$client['name'];?></a> |
					<a id="list" href="./?delClient=<?=$client['id'];?>">Remove</a>
				</li>
				<? } ?>
			</ul>
			<form action="./" method="get">
		        <input name="newClient" class="form-control space" type="text" placeholder="Client Name">
		        <button class="btn btn-default">Create</button>
    		</form>
		</section>
			
	</body>
</html>

