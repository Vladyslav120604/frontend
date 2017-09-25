<?php  
	include '../errors/errors.php';

	function printResult($result_set,$dbh){
		$array = array();
		while(($row = $result_set->fetch_assoc()) != false){
			$array[] = $row; 
		}
 		echo json_encode($array);
	}
	$user = 'root';
    $pass = '';
    $dbh = new mysqli('127.0.0.1', $user, $pass, 'users');
    $result_set = $result_set = $dbh->query("SELECT * FROM `messages`");
    printResult($result_set, $dbh);
    $dbh -> close();
?>