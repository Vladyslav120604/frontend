function auth(){
	var pin = document.getElementById('pin').value;
	var number = document.getElementById('number').value;

	 foo = localStorage.foo ? JSON.parse(localStorage.foo) : [];
	 for (var i = 0; i < foo.length; i++) {
	 	if(foo[i]["number"] == number){
	 		if(foo[i]['pin'] === pin){
	 			localStorage.is_auth = JSON.stringify(true);
    			localStorage.number = JSON.stringify(number);
    			
    			location.replace("index.html");

    			break
    		}
    		else{
    			alert('invalid pass');
    		}
	 	}
	 }
}
