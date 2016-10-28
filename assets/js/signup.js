$().ready(function(){

	$("#formularioRegistrar").validate({

		rules:{
			usuario : {
				required: true,
				minlength : 3
			},
			password : {
				required: true,
				minlength: 5
			},
			email: {
				required: true,
				email : true
			}

		},
		messages:{
			usuario : {
				required: "Porfavor escribe un nombre de usuario",
				minlength :"Debe tener minimo 3 letras"
			},
			password:{
				required :"Porfavor escribe una contraseña",
				minlength: "Debe contener minimo 5 caracteres"
			},

			email:{
				required: "Provee un correo",
				email:"No es un correo valido"
			}
		}
	});




});