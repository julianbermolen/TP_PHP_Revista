

	//validacion de formulario
	$(document).ready(function(){
		$("#validarForm").validate({
			
			//reglas de validacion
			rules:{
				
				email:{
					
					required:true,
					email:true
					
				},	

				username:{
					
					required:true,
					minlength:2
				},
				

				password: {
					
					required:true,
					minlength:2

				},

				confirm_password: {

					required:true,
					minlength: 2,
					equalTo: "#password"

				},
				//no se envia, hasta que se corrijan los errores
				agree:"required"
			},

			//mensajes de error
			messages:{

				username: {

					required:"Por favor ingrese un usuario",
					minlength:"Tu usuario debe tener 2 caracteres como minimo"

				},

				password: {

					required:"Por favor ingrese una contrase&ntildea",
					minlength:"Tu contrase&ntildea debe tener 2 caracteres como minimo"

				},

				confirm_password: {

					required:"Por favor ingrese una contrase&ntildea",
					minlength:"Tu contrasenia debe tener 2 caracteres como minimo",
					equalTo:"Por favor ingrese la misma contrase&ntildea"

				},

				email:{
					
					required:"Por favor ingrese un email",
					email:"Por favor ingrese un email valido"

				}
			}


		});


		$("#validarForm2").validate({
			rules:{
				
				email:{
					
					required:true,
					email:true
					
				},

				username:{
					
					required:true,
					minlength:2
				},

				password_nuevo: {
					
					required:true,
					minlength:2

				},

				confirm_password_nuevo: {

					required:true,
					minlength: 2,
					equalTo: "#password_nuevo"

				},
			//no se envia, hasta que se corrijan los errores
				agree:"required"
			},
				
		messages:{

				username: {

					required:"Por favor ingrese un usuario",
					minlength:"Tu usuario debe tener 2 caracteres como minimo"

				},

				password_nuevo: {

					required:"Por favor ingrese una contrase&ntildea",
					minlength:"Tu contrase&ntildea debe tener 2 caracteres como minimo"

				},

				confirm_password_nuevo: {

					required:"Por favor ingrese una contrase&ntildea",
					minlength:"Tu contrasenia debe tener 2 caracteres como minimo",
					equalTo:"Por favor ingrese la misma contrase&ntildea"

				},

				email:{
					
					required:"Por favor ingrese un email",
					email:"Por favor ingrese un email valido"

				}
			}

		});


	});


