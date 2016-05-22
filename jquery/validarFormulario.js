	//validacion de formulario
		$(function(){
			var campos=$("input");
			alertas=$(".alerta");
			function reconstituir(){
				campos.end();
				alertas.end();				
			}

			$("form").submit(function(){
					var validar=true;
					alertas.css("visibility","hidden");
					if(campos.eq(0).val()==""){
						alertas.eq(0).css("visibility","visible");
						alertas.eq(0).fadeOut(2500);
						validar=false;
					}

					reconstituir();

					if(campos.eq(1).val()==""){
						alertas.eq(1).css("visibility","visible");
						alertas.eq(1).fadeOut(2500);
						validar=false;
					}

					reconstituir();

					if(campos.eq(2).val().length<4){
						alertas.eq(2).css("visibility","visible");
						alertas.eq(2).fadeOut(2500);
						validar=false;
					}

					if(campos.eq(3).val()!=campos.eq(2).val()){
						alertas.eq(3).css("visibility","visible");
						alertas.eq(3).fadeOut(2500);
						validar=false;
					}

					reconstituir();
					return validar;	
				});

		});

