<?php
if (isset($this->session->userdata['logged_in'])) {

header("location: http://proyectoprueba.com/controllers/Usuarios_autenticacion/proceso_registro");
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/iniciosesion.css"">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<title>Iniciar Sesion</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
           
            <div class="wrap">
                <p class="form-title">
                    Inicia Sesion  </p>
                 <p class="form-title" >  <?php
					if (isset($message_display)) {
					echo "<div class='message'>";
					echo $message_display;
					echo "</div>";
						} 

echo "<div class='error_msg'>";
if (isset($error_message)) {
echo $error_message;
}
echo validation_errors();
echo "</div>";
?> </p>
 <form class="login" name="form" action="<?php base_url() ?>/Usuarios_autenticacion/proceso_registro" method="post">
 <label for="Usuario">Usuario:</label>
  <input type="text" placeholder="Usuario" name="usuario" />
  <label for="pass">Contrase&ntilde;a</label>
  <input type="password" placeholder="Contrase&ntilde;a" name="password" />
  <input type="submit" value="Log in" class="btn btn-info btn-sm" name="submit" />
  <div class="remember-forgot">
  <div class="row">
  <div class="col-md-6">
 <label>
 <?php echo anchor('Usuarios_autenticacion/mostrar_registrar','No estas registrado? Haz click aqui'); ?>
 </label>
 </div>
                       
 </div>
  </div>
 </form>
</div>
</div>
    </div>
</div>

</body>
</html>