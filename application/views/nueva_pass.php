

<!DOCTYPE html>
<html>
<head>
	<title>Nueva Password</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<?php  $incorrectos = $this->session->flashdata('incorrectos');
   if($incorrectos)
   { ?>
  <div class="alert alert-warning">
   <a href="<?php echo base_url() ?>Usuarios_autenticacion/nueva_pass" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong><?= $incorrectos;?></strong> 
</div>
  <?php } ?>



<div class="container">
<div class="col-md-12">
	<h4>Nueva Contrase&ntilde;a</h4>
	<p>Escribe tu nueva contrase&ntilde;a y porfavor no la olvides:</p>
	<form method="post" action="<?php base_url() ?>/Usuarios_autenticacion/nueva_contra"  id="nueva">
		
		<label  for="pass">Contrase&ntilde;a:</label>
		<input type="password"  class="form-control"  minlength="5" name="password" id="password"> 
		<br>
		<input type="hidden" name="correo" value='<?php echo "$email"; ?>'>
		<input type="hidden" name="secret" value='<?php echo "$secreta" ;?>'>
		<input type="submit" name="enviar" value="Enviar">
	
	</form>
</body>

<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
   <script src ="http://ajax.microsoft.com/ajax/jquery.validate/1.7/additional-methods.js"></script>
  <script src="<?php echo base_url() ?>assets/js/nuevapass.js"></script>
</html>