$().ready(function(){

	$("#nuevoPost").validate({

		rules:{
			titulo : {
				required: true,
			    minlength: 3
			    

			},
			descripcion : {
				required: true,
				minlength: 15
				
			},
			textComentario:{
				required: true,
			}


			

		},
		messages:{
			titulo : {
				required: "Debe tener un titulo",
				minlength :"Debe tener minimo 3 letras",
				
			},
			descripcion:{
				required :"Porfavor escribe una descripcion",
				minlength: "Debe contener minimo 15 caracteres"
			},
			textComentario:"Es requerido"
		}
	});


});