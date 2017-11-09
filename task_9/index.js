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
				if(atm.user[i]['pin'] == info.pin){
					atm.isUserAuth = true;
					atm.curentUser = info.login;
					console.log('You have successfully authorized');
				}
			}
		}
	},

	loadCash: function (cash) {
		if(atm.isNsumnberCorrect(cash) == false){
			console.error('incorrect number');
			return false;
		}
		if(atm.verificationForUserAuth() == true){
			var CurrentUserNumber = atm.getCurrentUserNumber();
			atm.user[CurrentUserNumber]['debet'] = atm.user[CurrentUserNumber]['debet'] + cash;
			atm.allCashInAtm = atm.allCashInAtmtm + cash;
			console.log('Your balance: ' + atm.user[CurrentUserNumber]['debet'] + '$');
		}
		else{
			console.info('You are not authorized');
		}
	},

	getCash: function (cash) {
		var CurrentUserNumber = atm.getCurrentUserNumber();

		if (cash > atm.allCashInAtm) {
			console.info('not enough money in an ATM');
			return false;
		}

		else if(cash > atm.user[CurrentUserNumber]['debet']){
			console.info('not enough money in your bank account');
			return false;
		}
		if(atm.verificationForUserAuth() == true){
			atm.user[CurrentUserNumber]['debet'] = atm.user[CurrentUserNumber]['debet'] - cash;
			atm.allCashInAtm = atm.allCashInAtmtm - cash;
			console.log('Your balance: ' + atm.user[CurrentUserNumber]['debet'] + '$');
		}
		else{
			console.info('You are not authorized');
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
	},

	isNsumnberCorrect: function (cash){
		var regExpForNumber = /^\d+$/g;
		if (regExpForNumber.test(cash) == false || cash < 0) {
			return false;
		}
		else{
			return true;
		}
	}
}
