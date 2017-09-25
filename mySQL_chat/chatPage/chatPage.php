<?php  
	$name = $_GET['name'];
	//logging('dsfas', $name);
	//echo $name;
	function logging($result, $name){
        $date = date('Y-m-d H:i:s');
        $f = fopen('../log/info.php', 'a');
        if (!empty($f)) {
             //$filename  =str_replace($_SERVER['DOCUMENT_ROOT'],'',$filename);
             $err  = "[ $date ]   $name   $result\r\n";
              fwrite($f, $err);
               fclose($f);
        }
    }
    logging('visited a chat page', 'name');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Easy chat</title>
	<link rel="stylesheet" type="text/css" href="css/chat.css">
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
<body>
	<header>
		<div class="headerDiv" style="background-color: #635960"></div>
		<div class="headerDiv" style="background-color: #8b8e59"></div>
		<div class="headerDiv" style="background-color: #eada7d"></div>
		<div class="headerDiv" style="background-color: #fffecd"></div>
		<div class="headerDiv" style="background-color: #7bc3ab"></div>
		<div class="headerDiv" style="background-color: #635960"></div>
		<div class="headerDiv" style="background-color: #8b8e59"></div>
		<div class="headerDiv" style="background-color: #eada7d"></div>
		<div class="headerDiv" style="background-color: #fffecd"></div>
		<div class="headerDiv" style="background-color: #7bc3ab"></div>

	</header>
	<div id="content">
		<p id="logo">Easy chat</p>
		<div id="chatField">
			<div id="history"></div>
		</div>
			<input type="text" name="mesagge" id="entryField">
			<button id="send" onclick='sendMsg()'>send</button>
			
	</div>
	
<script type="text/javascript">
	try{
		var name = '<?php echo $name ?>';
		var regExpSmile = /:\)/g;
		var regExpSadSmile = /:\(/g;
		var smile = ' <img src="img/smile.png" class="smile"> ';
		var sadSmile = ' <img src="img/sadSmile.png" class="smile"> ';
		setInterval(function(){
			$.ajax({
				method: "POST",
				url: "getMsg.php",
				dataType: 'json',
				success: function(data){
					$('#history').html('');
					timeInMs = Math.round(new Date().getTime()/1000.0);
					for (var i = 0; i < data.length-1; i++) {
						if ((timeInMs - data[i]['time']) < 3600) {
							var msg = '[ ' + data[i+1]['jsTime'] + ' ] ' + '<b>' +data[i+1]['name'] + '</b>'+ ' ' + data[i+1]['message'] + '<br>';
							$('#history').append(msg);
						}
					}
				}
			});
		}, 1);

		function sendMsg(){
			var msg = $('#entryField').val();
			var date = new Date();
			var hour = date.getHours();
			var minutes = date.getMinutes();
			var seconds = date.getSeconds();
			var allTime = hour+':'+minutes+':'+seconds;
			var msgAfter = msg.replace(regExpSadSmile, sadSmile);
			msgAfter = msgAfter.replace(regExpSmile, smile);
			$.ajax({
				method: "POST",
				url: "setMsg.php",
				data: ({jsTime:allTime, msg:msgAfter, name:name}),
			});
		    $('#entryField').val('');
	    }

		$("#entryField").keyup(function(event){
		    if(event.keyCode == 13){
		    	sendMsg();
	    	}
		});
		}
		catch(e){
			var dateError = new Date();
    		console.log(dateError + ': '+ e.name + ': ' + e.message);
		}
	</script>
</body>
</html>
