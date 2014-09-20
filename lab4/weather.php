<?php
	$city=$_POST['city'];
	$cityq=str_replace(' ', "",$_POST['city']);
	$jsonURL='http://api.openweathermap.org/data/2.5/weather?q='.$cityq;
	$json=file_get_contents($jsonURL);
	$obj=json_decode($json, true);
	//echo $obj;

	$condition = $obj['weather'][0]['main'];
	$tempK = $obj['main']['temp'];
	$tempF = (9/5)*($tempK-273)+32;
	$humidity = $obj['main']['humidity'];
	$windSpeed = $obj['wind']['speed'];
	$windDeg = $obj['wind']['deg'];

	if ($windDeg>348.75 && $windDeg<11.25){
		$windDir = 'N';
	}
	else if ($windDeg>11.25 && $windDeg<33.75){
		$windDir = 'NNE';
	}
	else if ($windDeg>33.75 && $windDeg<56.25){
		$windDir = 'NE';
	}
	else if ($windDeg>56.25 && $windDeg<78.75){
		$windDir = 'ENE';
	}
	else if ($windDeg>78.75 && $windDeg<101.25){
		$windDir = 'E';
	}
	else if ($windDeg>101.25 && $windDeg<123.75){
		$windDir = 'ESE';
	}
	else if ($windDeg>123.75 && $windDeg<146.25){
		$windDir = 'SE';
	}
	else if ($windDeg>146.25 && $windDeg<168.75){
		$windDir = 'SSE';
	}
	else if ($windDeg>168.75 && $windDeg<191.25){
		$windDir = 'S';
	}
	else if ($windDeg>191.25 && $windDeg<213.75){
		$windDir = 'SSW';
	}
	else if ($windDeg>213.75 && $windDeg<236.25){
		$windDir = 'SW';
	}
	else if ($windDeg>236.25 && $windDeg<258.75){
		$windDir = 'WSW';
	}
	else if ($windDeg>258.75 && $windDeg<281.25){
		$windDir = 'W';
	}
	else if ($windDeg>281.25 && $windDeg<303.75){
		$windDir = 'WNW';
	}
	else if ($windDeg>303.75 && $windDeg<326.25){
		$windDir = 'NW';
	}
	else if ($windDeg>326.25 && $windDeg<248.75){
		$windDir = 'NNW';
	}

	echo '<html>
<head>
	<title>Weather</title>

	<link rel="stylesheet" href="main.css">

	<script  src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
</head>
<body>
	<h2>Check Your Weather</h2>
	<form id="commenting" method="POST" action="weather.php">
		<input type="text" name="city" id="city" placeholder="Enter City Name"  onkeyup="checkcity(this.value)">
		<input type="submit">
	</form>
	<div id="cityresponse"></div>

	<div id="weather">
		<h3>'.$city.'</h3>
		<li>Weather Condition: '.$condition.'</li>
		<li>Temperature: '.$tempF.'&deg; F</li>
		<li>Humidity: '.$humidity.'&#37;</li>
		<li>Wind: '.$windSpeed.'mph '.$windDir.'</li>
	</ul>

	<script src="main.js"></script>
</body>
</html>'
?>