<?php
// Holly Springsteen
// SSL - Lab 1 - Form Submission
// 6.3.14

$states=array('AL'=>'Alabama', 'AK'=>'Alaska', 'AZ'=>'Arizona', 'AR'=>'Arkansas', 'CA'=>'California', 'CO'=>'Colorado', 'CT'=>'Connecticut', 'DE'=>'Delaware', 'FL'=>'Florida', 'GA'=>'Georgia', 'HI'=>'Hawaii', 'ID'=>'Idaho', 'IL'=>'Illinois', 'IN'=>'Indiana', 'IA'=>'Iowa', 'KS'=>'Kansas', 'KY'=>'Kentucky', 'LA'=>'Louisiana', 'ME'=>'Maine', 'MD'=>'Maryland', 'MA'=>'Massachusetts', 'MI'=>'Michigan', 'MN'=>'Minnesota', 'MS'=>'Mississippi', 'MO'=>'Missouri', 'MT'=>'Montana', 'NE'=>'Nebraska', 'NV'=>'Nevada', 'NH'=>'New Hampshire', 'NJ'=>'New Jersey', 'NM'=>'New Mexico', 'NY'=>'New York', 'NC'=>'North Carolina', 'ND'=>'North Dakota', 'OH'=>'Ohio', 'OK'=>'Oklahoma', 'OR'=>'Oregon', 'PA'=>'Pennsylvania', 'RI'=>'Rhode Island', 'SC'=>'South Carolina', 'SD'=>'South Dakota', 'TN'=>'Tennessee', 'TX'=>'Texas', 'UT'=>'Utah', 'VT'=>'Vermont', 'VA'=>'Virginia', 'WA'=>'Washington', 'WV'=>'West Virginia', 'WI'=>'Wisconsin', 'WY'=>'Wyoming');

$options= '';
$error = '';
$noform = true;


$values = array('fName'=>'' ,'lName'=>'' ,'address'=>'' ,'city'=>'' ,'zip'=>'' ,'email'=>'' ,'phone'=>'' ,'url'=>'');

// Form Submitted ... What to do
if(isset($_POST['submit'])) {
	$values = array('fName'=> $_POST['firstName'], 'lName'=> $_POST['lastName'],'address'=>$_POST['address'] ,'city'=>$_POST['city'] ,'zip'=>$_POST['zip'] ,'email'=>$_POST['email'] ,'phone'=>$_POST['phone'] ,'url'=>$_POST['url']);
	$val = $states[$_POST['state']];
	// Numbers in name?
	if(preg_match('^[a-zA-Z]^', $values['fName'])){}
	else{
		$error = "Your First Name is wrong. Really!?";
	}

	if(preg_match('^[a-zA-Z]^', $values['lName'])){}
	else{
		$error = "Your Last Name is wrong. Really!?";
	}

	// Check address characters
	if(preg_match('^[a-zA-Z0-9-\.]^', $values['address'])){}
	else{
		$error = "Your Address is incorrect. Why don't you know where you live?";
	}

	// Numbers in city?
	if(preg_match('^[a-zA-Z]^', $values['city'])){}
	else{
		$error = "Try again on that city.";
	}

	// Letters in zip?
	if(preg_match('^[0-9-]^', $values['zip'])){}
	else{
		$error = "Zip Code incorrect.";
	}

	// Filter email
	if(filter_var($values['email'], FILTER_VALIDATE_EMAIL)){}
	else{
		$error = "Your Email was typed incorrectly. We need to know how to contact you.";
	}

	// Letters in your phone number?
	if(preg_match('^[0-9-]^', $values['phone'])){}
	else{
		$error = "Your Phone Number isn't quite right.";
	}

	// Filter url
	if(filter_var($values['url'], FILTER_VALIDATE_URL)){}
	else{
		$error = "Your URL doesn't seem to be working right.";
	}

	$options = "<option value='".$_POST['state']."'>".$val."</option>";
	if($error == ''){
		$noform = false;
		$body = $values['fName']." ".$values['lName']."<br />
".$values['address']."<br />
".$values['city'].", ".$_POST['state']." ".$values['zip']."<br /><br />"."Email: ".$values['email']."<br />Phone: ".$values['phone']."<br />Url: ".$values['url']."<br />";
	}

}else{
	foreach ($states as $key => $val){
		$options = $options."<option value='$key'>$val</option>";
	};
}
// Is there a form on the page?
if($noform == true){
	$body = "	<form method='POST' action='index.php'>
			<p class='error'>".$error."</p>
			<div>
				<label>First Name</label><input type='text' name='firstName' value='".$values['fName']."' />
			</div>
			<div>
				<label>Last Name</label><input type='text' name='lastName' value='".$values['lName']."' />
			</div>
			<div>
				<label>Address</label><input type='text' name='address' value='".$values['address']."' />
			</div>
			<div>
				<label>City</label><input type='text' name='city' value='".$values['city']."' />
			</div>
			<div>
				<label>State</label>
				<select name='state'>".$options."
				</select>
			</div>
			<div>
				<label>Zip:</label><input type='text' name='zip' value='".$values['zip']."' maxlength= '10'/>
			</div>
			<div>
				<label>Email:</label><input type='text' name='email' value='".$values['email']."' />
			</div>
			<div>
				<label>Phone Number:</label><input type='text' name='phone' value='".$values['phone']."' maxlength= '13' />
			</div>
			<div>
				<label>Web Url:</label><input type='text' name='url' value='".$values['url']."' />
			</div>
			<div>
				<input class='submit' type='submit' name='submit' value='Submit'/>
			</div>
		</form>";
}
// What we want to print to our page (The HTML of course)
	$html = '<!DOCTYPE html>
<html>
	<head>
		<title>Lab 1: Form Submission</title>
		<link rel="stylesheet" href="main.css">
	</head>
	<body>
		'.$body.'
	</body>
</html>';

	echo $html;

?>