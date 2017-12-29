<?php  
	//echo date('j.m.Y H:i:s', strtotime(time()));
	$cityId = $_POST['cityId'];
    function printResult($result_set,$dbh, $cityId){
		$array = array();
		while(($row = $result_set->fetch_assoc()) != false){
			if($row['city_id'] == $cityId){
				$array[] = $row;
			}
		}
		echo json_encode($array);		
	}

    $user = 'vsergeevdb';
    $pass = 'dfpflfyysrpwtytienrb';
    $dbh = new mysqli('localhost', $user, $pass, 'vsergeevdb') or die(mysqli_error($dbh));
    $result_set = $result_set = $dbh->query("SELECT * FROM `forecast`");
    printResult($result_set, $dbh, $cityId);
    $dbh -> close();
?>