
<!DOCTYPE html>
<html>
<head>	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/registrar.css"">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<title>Registrate</title>

	<script type="text/javascript">
		
		function validaciones()
		{
            user = document.forms["formularioRegistrar"]["usuario"].value;
            pass = document.forms["formularioRegistrar"]["password"].value;
            correo = document.forms["formularioRegistrar"]["email"].value;

			if(user == null || valor.length == 0 || /^\s+$/.test(valor))
			{
				alert("Verifica los campos, no pueden ir vacios");
				return false;

			}
            if(pass == null || valor.length == 0 || /^\s+$/.test(valor))
			{    alert("Verifica los campos, no pueden ir vacios");
				return false;
			}
            if( !(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/.test(correo)) ) {
            	alert("Verifica tu correo, no es admitido");
              return false;
             }
             
             return true;
		}
	</script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
           
            <div class="wrap">
                <p class="form-title">
                    Registrate!  </p>
                
 <form class="login" onsubmit="return validaciones()" name="formularioRegistrar" action="<?php base_url() ?>/Usuarios_autenticacion/registrar_nuevo" method="post" >
  <input type="text" placeholder="Nombre de Usuario" name="usuario" id="usuario" />
  <input type="password" placeholder="Pon una Contrase&ntilde;a" name="password" id="password" />
  <input type="email" placeholder="Tu Email" name="email" id="email" />
  <input type="submit" value="Registrar" class="btn btn-danger btn-sm" name="submit" />
  
  <div class="row">
  <div class="col-md-6">
 <label>
 <?php echo anchor('Usuarios_autenticacion/mostrar_iniciar','Inicia Sesion aqui'); ?>
 </label>
 </div>
                       
 </div>

 </form>
</div>
</div>
    </div>
</div>

</body>
</html>