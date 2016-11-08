$().ready(function(){
 

	$("#nueva").validate({

		rules:{
			password : {
				required: true,
				minlength: 5
			}

		},
		messages:{
			password : {
				required: "Porfavor escribe la nueva password ",
				minlength :"Al menos 5 caracteres"
			}
		}
	});




});