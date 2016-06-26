/*

}
*/
var APIurl;
var datosClimaticos;
$(document).ready(function(){

	
	
	navigator.geolocation.getCurrentPosition(optenerUbicacion);

	function optenerUbicacion(position){

		$.ajax({
			type: "GET",
			url:"api.openweathermap.org/data/2.5/weather?lat="+position.coords.latitude+"&lon="+position.coords.latitude,
			dataType: "json",
			//data:position.coords,
			//el servidor no envia nada error 404
			success: function(data){
				console.log(data);
			},
			error: function(){
				console.log("no se recibio nada");
			}
			
		});


		//console.log(APIurl);
	}
	
	$.ajax({

		url : APIurl,
		dataType : 'json',
		//dataType: json,
		success : function(data){

			datosClimaticos = data;
			console.log(datosClimaticos);
		}
	});

});


