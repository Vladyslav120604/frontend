<?php
	function getInfoFromAPI($city_id_in_API, $city_id){
		//$city_id = 1;
		$json = file_get_contents('http://dataservice.accuweather.com/forecasts/v1/hourly/12hour/'.$city_id_in_API.'?apikey=keE2CKNR5DZqtpC6CezHNEiF8UskF4LL&language=ru&details=true&metric=true');
		//$json = $json . file_get_contents('http://dataservice.accuweather.com/forecasts/v1/hourly/12hour/'.$city_id_in_API.'?apikey=keE2CKNR5DZqtpC6CezHNEiF8UskF4LL&language=ru&details=true&metric=true');
		setInfoToBD($json, $city_id);
	}

	function printResult($result_set,$dbh){
		$array = array();
		while(($row = $result_set->fetch_assoc()) != false){
			$array[] = $row;
		}
		for ($i=0; $i < count($array); $i++) { 
			getInfoFromAPI($array[$i]['city_id_in_API'], $array[$i]['id']); 
		} 
 		
	}

    $user = 'vsergeevdb';
    $pass = 'dfpflfyysrpwtytienrb';
    $dbh = new mysqli('localhost', $user, $pass, 'vsergeevdb');
    $result_set = $result_set = $dbh->query("SELECT * FROM `cities`");
    $dbh->query("DELETE FROM `forecast`");
    printResult($result_set, $dbh);
    $dbh -> close();

    function setInfoToBD($weather, $city_id){
    	$obj = json_decode($weather);
    	
    	$user = 'vsergeevdb';
	    $pass = 'dfpflfyysrpwtytienrb';
	    $dbh = new mysqli('localhost', $user, $pass, 'vsergeevdb');
    	for ($i=0; $i < count($obj); $i++) {  
		    $obj = json_decode($weather);
		    //$date = time() * 1000;
		    $timeInAPI = $obj[$i] -> {'DateTime'};
		    //$time = date('d-h', $date);
		    echo $timeInAPI;
		    //$date = date("d.m.Y", strtotime($date)) . '         ';
			$timestamp = $obj[$i] -> {'EpochDateTime'};
			$temperature = $obj[$i] -> {'Temperature'} -> {'Value'};
			$wind_speed = $obj[$i]-> {'Wind'} -> {'Speed'} -> {'Value'};
			$wind_deg = $obj[$i]-> {'Wind'} -> {'Direction'} -> {'Degrees'};
			$rain_Possability = $obj[$i] ->{'Rain'} -> {'Value'};
			$snow_Possability = $obj[$i] ->{'Snow'} -> {'Value'};
			$clouds = $obj[$i]-> {'CloudCover'};
			$icon = $obj[$i] -> {'WeatherIcon'};

		    $dbh-> query ("INSERT INTO `forecast` (timeInAPI,city_id, timestamp , temperature, wind_speed, wind_deg, humidity, rain_possibility, snow_possibility, pressure, icon , clouds) VALUES ('".$timeInAPI."','".$city_id."','".$timestamp."', '".$temperature."', '".$wind_speed."', '".$wind_deg."', '1', '".$rain_Possability."', '".$snow_Possability."', '1','".$icon."' , '".$clouds."')") or die("Ошибка 11".mysqli_error($dbh));
    	}
    }


?>