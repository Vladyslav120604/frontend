<?php  
	$a = json_decode(file_get_contents("data.json"), true);
	if(isset($_POST['1'])){
		$a['cat']++;
	}
	if(isset($_POST['2'])){
		$a['dog']++;
	}
	if(isset($_POST['3'])){
		$a['parrot']++;
	}
	file_put_contents("data.json", json_encode($a));
?>
<html>
  <head>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    $.ajax({
		type: "POST",
		url: "getData.php",
		dataType: "json",
		data: "name=John&location=Boston",
		success: function (msg, textStatus) {
		    var numberOfCat = msg.cat;
		    var numberOfDog = msg.dog;
		    var numberOfParrot = msg.parrot;
		    google.charts.load('current', {'packages':['corechart']});
		    google.charts.setOnLoadCallback(drawChart)
		    function drawChart() {
				var data = new google.visualization.DataTable();
				data.addColumn('string', 'Topping');
				data.addColumn('number', 'Slices');
				data.addRows([
					['Котики', numberOfCat],
					['Собачки', numberOfDog],
					['Попугаи', numberOfParrot],
				]);
				var options = {'title':'Жывотные',
					'width':400,
					'height':300};
				var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
				chart.draw(data, options);
			}
	    }  
	});
    </script>
  </head>
  <body>
    <div id="chart_div"></div>
  </body>
</html>
