<?php
$data = file('dictionary.txt');
$rndNumber = rand(0,count($data)-1);
message($data[$rndNumber]);

echo '<label>Captcha:</label>
	<image src="cap.png" /><br />
	<input name="cap" value="'.$rndNumber.'" type="hidden" />
	<input name="captcha" type="text" placeholder="Text from the black box above"/><br/>';

function message($msg){
	$canvas = imagecreate(270,50);
	$black = imagecolorallocate($canvas, 0,0,0);
	$white = imagecolorallocate($canvas, 255,255,255);
	$font = 'fonts/captcha.ttf';
	// imagefilledrectangle(image, x1, y1, x2, y2, color)
	imagefilledrectangle($canvas, 0,0,250,150,$black);
	// imagefttext(image, size, angle, x, y, color, fontfile, text)
	imagefttext($canvas,30,0,55,38,$white,$font,$msg);
	// imagepng(image)
	imagepng($canvas, 'cap.png');
	// Frees up the resources
	imagedestroy($canvas);
}
?>