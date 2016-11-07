
<!DOCTYPE html>
<html>
<head>
	<title>Recuperar Password</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<?php  $incorrectos = $this->session->flashdata('incorrectos');
   if($incorrectos)
   { ?>
  <div class="alert alert-warning">
   <a href="<?php echo base_url() ?>Usuarios_autenticacion/recuperar_pass" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong><?= $incorrectos;?></strong> 
</div>
  <?php } ?>

  <?php  $datos = $this->session->flashdata('datos');
   if($datos)
   { ?>
  <div class="alert alert-warning">
   <a href="<?php echo base_url() ?>Usuarios_autenticacion/recuperar_pass" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong><?= $datos;?></strong> 
</div>
  <?php } ?>
  <?php  $enviado = $this->session->flashdata('enviado');
   if($enviado)
   { ?>
  <div class="alert alert-success">
   <a href="<?php echo base_url() ?>Usuarios_autenticacion/recuperar_pass" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong><?= $enviado;?></strong> 
</div>
  <?php } ?>
<div class="container">
<div class="col-md-12">
	<h4>Parece que no te acuerdas de tu contrase&ntilde;a</h4>
	<p>Bueno pues necesitamos que proporciones algo de informacion:</p>
	<form method="post" action="<?php base_url() ?>/Usuarios_autenticacion/recuperar" name="recuperar" id="recuperar">
		<label for="correo">Correo con el que te registraste:</label>
		<input type="email" name="email" class="form-control" id="email">   
		<br>
		<label  for="secreta">Palabra secreta:</label>
		<input type="text" name="secreta" class="form-control"  minlength="5" id="secreta">    <!-- PALABRA SECRETA PEDIRLA EN EL REGISTRO-->
		<br>
		<input type="submit" name="enviar" value="Enviar">
		<label>Se enviara un email a tu correo con tu contrase&ntilde;a</label>
	</form>
	<label>
 <?php echo anchor('Usuarios_autenticacion/mostrar_iniciar','Inicia Sesion aqui'); ?>
 </label>
</div>
</div>




<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
  <script src ="http://ajax.microsoft.com/ajax/jquery.validate/1.7/additional-methods.js"></script>
  <script src="<?php echo base_url() ?>assets/js/recuperar.js"></script>
</body>

</html>