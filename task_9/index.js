console.log('Instruction:');
console.log('Registration: atm.reg({login: your_login, pin: your_pin})');
console.log('Authorization: atm.auth({login: your_login, pin: your_pin})');
console.log('Load money: atm.loadCash(amount_of_money)');
console.log('Get money: amt.getCash(amount_of_money)');
console.log('Get balsnce: atm.getBalance()');
console.log('Exit: atm.exit()');
var atm = {
	user: [],

	curentUser:0,

	isUserAuth:false,

	allCashInAtm: 100000,

	reg: function (info) {
		atm.user.push(info);
		info.debet = 0;
		console.log('You have successfully registered');
	}, 

	auth: function (info) {
		for (var i = 0; i < atm.user.length; i++) {
			if(atm.user[i]['login'] == info.login){
				//console.log('invalid pass');
				if(atm.user[i]['pin'] == info.pin){
					atm.isUserAuth = true;
					atm.curentUser = info.login;
					console.log('You have successfully authorized');
				}
			}
		}
	},

	loadCash: function (cash) {
		if(atm.verificationForUserAuth() == true){
			var CurrentUserNumber = atm.getCurrentUserNumber();
			atm.user[CurrentUserNumber]['debet'] = atm.user[CurrentUserNumber]['debet'] + cash;
			atm.allCashInAtm = allCashInAtmtm + cash;
			console.log('Your balance: ' + atm.user[CurrentUserNumber]['debet'] + '$');
		}
		else{
			console.log('You are not authorized');
		}
		
	},

	getCash: function (cash) {
		if(atm.verificationForUserAuth() == true){
			var CurrentUserNumber = atm.getCurrentUserNumber();
			atm.user[CurrentUserNumber]['debet'] = atm.user[CurrentUserNumber]['debet'] - cash;
			atm.allCashInAtm = allCashInAtmtm - cash;
			console.log('Your balance: ' + atm.user[CurrentUserNumber]['debet'] + '$');
		}
		else{
			console.log('You are not authorized');
		}
	},

	getCurrentUserNumber: function () {
		for (var i = 0; i < atm.user.length; i++) {
			if(atm.user[i]['login'] == atm.curentUser){
				return i;
			}
		}
	},

	getBalance: function () {
		if(atm.verificationForUserAuth() == true){
			var CurrentUserNumber = atm.getCurrentUserNumber();
			console.log('Your balance: ' + atm.user[CurrentUserNumber]['debet'] + '$');
		}
		else{
			console.log('You are not authorized');
		}
	},

	exit: function () {
		console.log('you exited successfully');
		atm.curentUser = false;
		atm.isUserAuth = false;
	},


	verificationForUserAuth: function () {
		if(atm.isUserAuth == false){
			return false
		}
		else{
			return true
		}
	}
}
