<?php  
 	$msg = $_POST['msg'];
 	$email = $_POST['email'];
 	$a = json_decode(file_get_contents("history.json"), true);
 	$a = array();
 	$a[$email] = $msg;
 	file_put_contents("history.json", json_encode($a));
 	echo $a;
?>