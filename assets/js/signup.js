$().ready(function(){

jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Solo letras"); 


jQuery.validator.addMethod("notEqual", function(value, element, param) {
 return this.optional(element) || value != $(param).val();
}, "Tiene que ser  diferente...");

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
			},
			secreta : {
				required: true,
				minlength: 5,
                notEqual: "#password",
                lettersonly: true
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
			},
			secreta:{
				required :"Porfavor escribe tu palabra secreta",                                                                        
				minlength: "Debe contener minimo 5 caracteres",
				notEqual: "No debe ser la misma que el password",
				lettersonly: "Solo letras"
			}
		}
	});




});