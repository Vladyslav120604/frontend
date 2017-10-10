


var ATM = { 

    randomNumber:function(){
        var rand_numbers = localStorage.rand ? JSON.parse(localStorage.rand) : [];
        var randomNumber = my_rand(rand_numbers);
        
        function my_rand(rand_numbers) {
            while (true) {
                var result = Math.floor(Math.random() * (9999 - 1000 + 1)) + 1000;
                if (rand_numbers.indexOf(result) == -1) {
                    rand_numbers.push(result);
                    localStorage.rand = JSON.stringify(rand_numbers);
                    return result;
                }
            }
        }
        alert(rand_numbers);
        return randomNumber; 
    },

    reg: function(form){
        
        var number = ATM.randomNumber(); 
        var pin = document.getElementById('pin').value;
        userInfo = {"number": number,"pin":  pin};

        ATM.setInfoToBD(userInfo);
        localStorage.is_auth = JSON.stringify(true);
        localStorage.number = JSON.stringify(number);
        location.replace("index.html") 
        
    },
    setInfoToBD:function(userInfo){
        foo = localStorage.foo ? JSON.parse(localStorage.foo) : [];
        userInfoJSON = userInfo;
        foo.push(userInfoJSON);
        localStorage.foo = JSON.stringify(foo);
    },

};