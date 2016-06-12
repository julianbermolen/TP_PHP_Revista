$(document).ready(function(){
	var contenedoresDeArticulos = $(".contenedorDeArticulo");
	if($(window).width()>768){
		contenedoresDeArticulos.hover(
			function(){$(this).find(".descripcion").css("visibility","visible");},
			function(){$(this).find(".descripcion").css("visibility","hidden");}
		);
	}
});