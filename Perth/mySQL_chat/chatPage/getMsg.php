<?php  
	include '../errors/errors.php';

	function printResult($result_set,$dbh){
		$array = array();
		while(($row = $result_set->fetch_assoc()) != false){
			$array[] = $row; 
		}
 		echo json_encode($array);
	}

        $user = 'vsergeevdb';
        $pass = 'dfpflfyysrpwtytienrb';
        $dbh = new mysqli('localhost', $user, $pass, 'vsergeevdb');
        $result_set = $result_set = $dbh->query("SELECT * FROM `messages`");
        printResult($result_set, $dbh);
    
	$dbh -> close();
?>