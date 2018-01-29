window.ಠ_ಠ889 = function(){
	var ಠ_ಠ865 = ಠ_ಠ887(1);
};

function ಠ_ಠ886(ಠ_ಠ866){
	$("select option:selected").each(function () { 
	    var ಠ_ಠ866 = $(this).val();
	    var ಠ_ಠ865 = ಠ_ಠ887(ಠ_ಠ866);
	    return false;
	  });
}

function ಠ_ಠ887(ಠ_ಠ866) {
	$.ajax({
        method: "POST",
        url: "server/ಠ_ಠ887.php",
        ಠ_ಠ895: ({ಠ_ಠ866:ಠ_ಠ866}),
        dataType: "json",
        ಠ_ಠ894: function (ಠ_ಠ895) {
        	console.log(ಠ_ಠ895);
        	ಠ_ಠ888(ಠ_ಠ895);
        	return ಠ_ಠ895; 
        }
    });
}

$('#ಠ_ಠ865').on('click', '.hourly-ಠ_ಠ865', function(ಠ_ಠ896){
	console.log(this);
});

function ಠ_ಠ888(ಠ_ಠ865){
	var ಠ_ಠ868 = $('.hourly-ಠ_ಠ865');
	var ಠ_ಠ869 = new ಠ_ಠ870();
	document.getElementById('weather-ಠ_ಠ883').ಠ_ಠ890 = 'icons/' + ಠ_ಠ865[1]['ಠ_ಠ883'] + '-s.png';
	document.getElementById('current-temperature').ಠ_ಠ891 = ಠ_ಠ865[1]['temperature'] + '&deg';
	document.getElementById('ಠ_ಠ869').ಠ_ಠ891 = ಠ_ಠ869.toLocaleString('en', {weekday: 'long'});
	
	for (var ಠ_ಠ871 = 0; ಠ_ಠ871 < (ಠ_ಠ865.length-1); ಠ_ಠ871++) {
		var ಠ_ಠ872 = ಠ_ಠ865[ಠ_ಠ871]['timestamp'];
		var ಠ_ಠ869 = new ಠ_ಠ870(ಠ_ಠ872 * 1000 );
		var hours = ಠ_ಠ869.getHours();
		var ಠ_ಠ876 = ಠ_ಠ869.getMinutes();
		var ಠ_ಠ877 = hours + ':' + ಠ_ಠ876 + '0';

		var ಠ_ಠ879 = ಠ_ಠ868[ಠ_ಠ871];
		var ಠ_ಠ880 = new ಠ_ಠ870();
		var ಠ_ಠ881 = ಠ_ಠ879.childNodes[2];
		var ಠ_ಠ882 = $('.ಠ_ಠ865-temperature');
		var ಠ_ಠ883 = $('.ಠ_ಠ883');
		var ಠ_ಠ884 = $('.ಠ_ಠ884');
		var ಠ_ಠ885 = $('.ಠ_ಠ885');
		
		ಠ_ಠ879.childNodes[1].ಠ_ಠ891 = ಠ_ಠ877;
		ಠ_ಠ884[ಠ_ಠ871].ಠ_ಠ891 = ಠ_ಠ865[ಠ_ಠ871]['humidity'];
		ಠ_ಠ885[ಠ_ಠ871].ಠ_ಠ891 = ಠ_ಠ865[ಠ_ಠ871]['ಠ_ಠ885'];
		ಠ_ಠ882[ಠ_ಠ871].ಠ_ಠ891 = ಠ_ಠ865[ಠ_ಠ871]['temperature'] + '&deg;';
		ಠ_ಠ883[ಠ_ಠ871].ಠ_ಠ890 = 'icons/' + ಠ_ಠ865[ಠ_ಠ871]['ಠ_ಠ883'] + '-s.png';

	}
}