navigator.geolocation.getCurrentPosition(optenerUbicacion);

function optenerUbicacion(position){
	var coordenadas

	latitud=position.coords.latitude;
	longitud=position.coords.longitude;


console.log(latitud);
console.log(longitud);
}


//la api logra acceder a la geolocalizacion pero no optiene las coordenadas
