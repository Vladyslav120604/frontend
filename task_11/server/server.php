<?php
	$input = $_POST['input'];
	$value = $_POST['value'];
	$x = $_POST['x'];
	$y = $_POST['y'];

	echo $x . $y;

	$data = json_decode(file_get_contents("data.json"), true);
	$infoFromInput = $value;
	$data[$input] = array('value' => $value, 'x' => $x, 'y' => $y);
	file_put_contents("data.json", json_encode($data));
?>