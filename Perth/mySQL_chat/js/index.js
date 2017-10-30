function get_time(){
			var date = new Date();
			var year = date.getFullYear();
			var month = date.getMonth();
			var day = date.getDate();
			var hour = date.getHours();
			var minutes = date.getMinutes();
			var seconds = date.getSeconds();
			var time = year + '/' + month + '/' + day + ' ' + hour + ':' + minutes + ':' + seconds; 
			return time; 
		}

		function logging(user_login, result) {
			var time = get_time();
			var log = time + '  ' + user_login + '  ' + result;
			console.log(log);
		}

		function redirectOrEntrance(data, user_login) {
			 $('#invalidPass').html(' ');
			 $('#redirect').html(data);
				setTimeout(function (){
					window.location.href = 'chatPage/chatPage.php?name='+user_login;
				}, 2000)
				logging(user_login ,data);
		}
		$('#submit').click(function(){
			var user_login = $('#user_login').val();
			var user_pass = $('#user_pass').val();
			$.ajax({
					method: "POST",
					url: "../server.php",
					data: ({name:user_login, pass:user_pass}),
					success: function (data) {
						console.log(data);
						if(data == 'redirect'){
							redirectOrEntrance('check in...', user_login)
						}
						if(data == 'invalidPass'){
							  $('#invalidPass').text('invalid pass');
						}
						if(data == 'entrace'){
							redirectOrEntrance('entrance...', user_login);
						}
					}
			});
		});