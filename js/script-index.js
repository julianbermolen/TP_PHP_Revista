$(document).ready(function(){
	var contenedorDeDiarios = $("#contenedorDeDiarios");//escondo por defecto el contenedor de los diarios
	var contenedorDeRevistas = $("#contenedorDeRevistas");
	var tiposDeProductos = $("ul.navbar-nav > li");

	$("li>a").click(function(event){
		event.preventDefault();
	});

	contenedorDeDiarios.hide(0);

	tiposDeProductos.eq(0).click(function(){
		tiposDeProductos.removeClass("active");
		$(this).addClass("active");
		contenedorDeDiarios.hide(0);
		contenedorDeRevistas.show(0);
	});

	tiposDeProductos.eq(1).click(function(){
		tiposDeProductos.removeClass("active");
		$(this).addClass("active");
		contenedorDeDiarios.show(0);
		contenedorDeRevistas.hide(0);
	});

		//varibles para mostrar los popup de los productos

	var contenedoresDeArticulos = $(".contenedorDeArticulo");

	contenedoresDeArticulos.hover(
		function(){$(this).find(".descripcion").css("visibility","visible");},
		function(){$(this).find(".descripcion").css("visibility","hidden");}
		);

});