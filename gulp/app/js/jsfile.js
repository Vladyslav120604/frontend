window.onload = function(){
	var forecast = getValuesFromJSON(1);
};
$('body').on('click', function(){
	alert('hello');
})
function changeForecast(cityId){
	$("select option:selected").each(function () { 
	    var cityId = $(this).val();
	    var forecast = getValuesFromJSON(cityId);
	    return false;
	  });
}

function getValuesFromJSON(cityId) {
	$.ajax({
        method: "POST",
        url: "server/getValuesFromJSON.php",
        data: ({cityId:cityId}),
        dataType: "json",
        success: function (data) {
        	console.log(data);
        	setValuesOnPage(data);
        	return data; 
        }
    });
}

$('#forecast').on('click', '.hourly-forecast', function(e){
	console.log(this);
});

function setValuesOnPage(forecast){
	var block = $('.hourly-forecast');
	var date = new Date();
	document.getElementById('weather-icon').src = 'icons/' + forecast[1]['icon'] + '-s.png';
	document.getElementById('current-temperature').innerHTML = forecast[1]['temperature'] + '&deg';
	document.getElementById('date').innerHTML = date.toLocaleString('en', {weekday: 'long'});
	
	for (var i = 0; i < (forecast.length-1); i++) {
		var unixTimestamp = forecast[i]['timestamp'];
		var date = new Date(unixTimestamp * 1000 );
		var hours = date.getHours();
		var minutes = date.getMinutes();
		var time = hours + ':' + minutes + '0';

		var hourlyBlock = block[i];
		var now = new Date();
		var a = hourlyBlock.childNodes[2];
		var temp = $('.forecast-temperature');
		var icon = $('.icon');
		var humm = $('.humm');
		var wind_speed = $('.wind_speed');
		
		hourlyBlock.childNodes[1].innerHTML = time;
		humm[i].innerHTML = forecast[i]['humidity'];
		wind_speed[i].innerHTML = forecast[i]['wind_speed'];
		temp[i].innerHTML = forecast[i]['temperature'] + '&deg;';
		icon[i].src = 'icons/' + forecast[i]['icon'] + '-s.png';

	}
}