$().ready(function(){

jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Solo letras"); 

	$("#recuperar").validate({

		rules:{
			email : {
				required: true,
				email : true
			},
			secreta : {
				required: true,
				minlength: 5,
				lettersonly:true
			}
			

		},
		messages:{
			email : {
				required: "Porfavor escribe tu email ",
				email :"No es un correo valido"
			},
			secreta:{
				required :"Porfavor escribe la palabra secreta",
				minlength: "Debe contener minimo 5 caracteres",
				lettersonly:"Solo letras"
			}
		}
	});




});