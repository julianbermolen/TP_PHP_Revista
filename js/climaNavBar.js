$(document).ready(function(){

	navigator.geolocation.getCurrentPosition(optenerUbicacion);

	function optenerUbicacion(position){
		$.ajax({
			type: "GET",
			url:"http://api.openweathermap.org/data/2.5/weather?lat="+position.coords.latitude+"&lon="+position.coords.longitude+"&APPID=a00fb95d2421e81317a8e39f64e0358a",
			dataType: "json",
			success: function(data){
				var temperaturaActual=data.main.temp-273;
				//console.log(data);
				$(".navbar-nav:eq(0)").append("<li><a href='#'>"+temperaturaActual.toFixed(1)+"</a></li>");
				//le resto a la temperatura 273 grados porque la unidad esta expresada en grados kelvin
			},
			error: function(){
				console.log("no se recibio nada");
			}
			
		});
	}
});


