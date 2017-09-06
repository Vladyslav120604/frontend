<?php  
	$msg = json_decode(file_get_contents("history.json"), true);
	echo json_encode($msg);
?>