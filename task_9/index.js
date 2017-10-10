alert(localStorage.is_auth ? JSON.parse(localStorage.is_auth) : []);
if((localStorage.is_auth ? JSON.parse(localStorage.is_auth) : []) == false){
	location.replace("authorization.html");
	alert(55);
}


var ATM = {
	loadcash: function(){

	},
};