<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		li{
			list-style-type: none;
		}

		div{
			width: 50px;
			height: 50px;
			background: black;
			display: inline-block;
			border: 2px solid black;
		}

		ol{
			font-size: 0;
		}

		li:nth-child(odd) div:nth-child(odd){
			background: white;
		}
		li:nth-child(even) div:nth-child(even){
			background: white;
		}
	</style>
</head>
<body>
	<?php 
		echo"<h1>Task_1</h1>";
		for ($result = 0, $i = -1000; $i <= 1000; $i++) {
    		$result =  $result + $i;
		}
		echo "Вот сумма все чисел от -1000 до 1000: " . $result . "<br/>" ;

		//  Task_2  //

		echo"<h1>Task_2</h1>";
		for ($result = 0, $i = -20; $i<= 20; $i++){
			if($i % 10 == 2 || $i % 10 == 3 || $i % 10 == 7 || $i % 10 == -2 || $i % 10 == -3 || $i % 10 == -7 || $i / 1 == 2 || $i / 1 == 3 || $i / 1 == 7){
				$result = $result + $i;
			}
		}
		echo "Вот сумма все чисел которые заканчиваются на 2,3 или 7 от -1000 до 1000: " . $result . "<br/>" ;

		//  Task_3  //

		print("<h1>Task_3</h1>");
		$star = "";
		for($i = 0; $i <= 50; $i++){
			$star = $star . "*";
			echo"<li>$star</li>";
		}
	?>
	<h1>Task_4</h1>
	<form method="post">
		<p>Введите ширину шахматной доски</p>
		<input type="text" name="width">
		<p>Введиьте высоту шахматной доски</p>
		<input type="text" name="height"><br>
		<input type="submit" name="task_4_submit" value="Узнать"><br><br>
	</form>
	<?php  
		If(isset($_POST['task_4_submit'])){
			$width = $_POST['width'];
			$height = $_POST['height'];
			echo "<ol>";
			for($i = 0, $numberOfDiv = 0, $div = ""; $i < $height; $i++){
				$numberOfDiv = 0;
				$div = ""; 
				while($numberOfDiv < $width){
					$div = $div . "<div></div>";
					$numberOfDiv++;
				}
				echo "<li>$div</div>";
			}
			echo "</ol>";
		}
	?>
	<h1>Task_5</h1>
	<form method="post">
		<p>Введите число</p>
		<input type="text" name="number"><br><br>
		<input type="submit" name="task_5_submit"><br>
	</form>
	<?php  
		If(isset($_POST['task_5_submit'])){
			$number = $_POST['number'];
			for ($i=0, $result = 0;$number > 0;) { 
				$result += $number % 10;
				$number = floor($number/10);
			}
			echo "Сумма цифр: " . $result; 
		}
	?>
	<h1>Task_6</h1>
	<p>Сгенирировать сто случайных чисел</p>
	<!--<form>
		<input type="submit" name="task_5_submit"><br>
	</form>-->
	<?php  
		If(isset($_POST['task_5_submit'])){
			echo "Вот массив до сортировки и разворота:";
			for ($i=0, $array = array(); $i <= 100; $i++) { 
				$array[$i] = rand(1, 10);
				//echo $array[$i];
				echo $array[$i] . ", ";
			}
			echo "<br>";
			rsort($array);
			for ($i=0; $i < 100; $i++) { 
				if ($array[$i] == $array[$i+1]) {
					unset($array[$i]);
				}
			}
			rsort($array);
			$i = 0;
			echo "Вот массив после сортировки и разворота: ";
			while($i < 10){
				echo $array[$i] . ", ";
				$i++;
			}
		}
	?>
</body>
</html>