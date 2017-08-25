<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		print("<h1>Task_1</h1>");
		for ($result = 0, $i = -1000; $i <= 1000; $i++) {
    		$result =  $result + $i;
		}
		echo "Вот сумма все чисел от -1000 до 1000: " . $result . "<br/>" ;

		//  Task_2  //

		print("<h1>Task_2</h1>");
		for ($result = 0, $i = -20; $i<= 20; $i++){
			if($i % 10 == 2 || $i % 10 == 3 || $i % 10 == 7 || $i % 10 == -2 || $i % 10 == -3 || $i % 10 == -7 || $i / 1 == 2 || $i / 1 == 3 || $i / 1 == 7){
				$result = $result + $i;
			}
		}
		echo "Вот сумма все чисел которые заканчиваются на 2,3 или 7 от -1000 до 1000: " . $result . "<br/>" ;
	?>
</body>
</html>