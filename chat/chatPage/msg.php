<?php  
 	$a = json_decode(file_get_contents("history.json"), true);
 	$name = $_POST['name'];
 	$msg = $_POST['msg'];
 	$time = $_POST['time'];
 	$size = count($a);
 	
 	$a[$size] = array( 'timestamp' => time(), 'time' => $time, 'name' => $name, 'msg' => $msg);
 	
 	file_put_contents("history.json", json_encode($a));
 		echo '[ '.$a[$size]['time'] . ' ]';
 		echo '<b>' . $a[$size]['name']. ': ' . '</b>';
 		echo $a[$size]['msg'] . '<br>';
 		
?>