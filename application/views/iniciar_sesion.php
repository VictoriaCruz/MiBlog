<?php
if (isset($this->session->userdata['logged_in'])) {

header("location: http://proyectoprueba.com/FormularioControlador/mostrar_principal");
}
?>

<!DOCTYPE html>
<html>
<head>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/iniciosesion.css"">
	<title>Iniciar Sesion</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
           
            <div class="wrap">
                <p class="form-title">
                    Inicia Sesion  </p>
         

 <form class="login" id="formIniciar" action="<?php base_url() ?>/Usuarios_autenticacion/proceso_registro" method="post">
 <label for="Usuario">Usuario:</label>
  <input type="text" placeholder="Usuario" name="usuario" id="usuario" minlength="3" />
  <label for="pass">Contrase&ntilde;a</label>
  <input type="password" placeholder="Contrase&ntilde;a" name="password" id="password" minlength="5" />
  <input type="submit" value="Log in" class="btn btn-info btn-sm" name="submit" />
  <div class="remember-forgot">
  <div class="row">
  <div class="col-md-6">
 <label>
 <?php echo anchor('Usuarios_autenticacion/mostrar_registrar','No estas registrado? Haz click aqui'); ?>
 </label>
 </div>
  <div class="col-md-6">
 <label>
 <?php echo anchor('Usuarios_autenticacion/recuperar_pass',' Olvide mi contrase&ntilde;a?'); ?>
 </label>
 </div>
                       
 </div>
  </div>
 </form>
</div>
</div>
    </div>
</div>


  <?php  $registrado = $this->session->flashdata('registrado');
   if($registrado)
   { ?>
  <div class="alert alert-success">
   <a href="<?php echo base_url() ?>Usuarios_autenticacion/mostrar_iniciar" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong><?= $registrado;?></strong> 
</div>
  <?php } ?>

   <?php  $incorrectos = $this->session->flashdata('incorrectos');
   if($incorrectos)
   { ?>
  <div class="alert alert-danger">
   <a href="<?php echo base_url() ?>Usuarios_autenticacion/mostrar_iniciar" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong><?= $incorrectos;?></strong> 
</div>
  <?php } ?>
   <?php  $cambiada= $this->session->flashdata('cambiada');
   if($cambiada)
   { ?>
  <div class="alert alert-success">
   <a href="<?php echo base_url() ?>Usuarios_autenticacion/mostrar_iniciar" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong><?= $cambiada;?></strong> 
</div>
  <?php } ?>



<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
  <script src="<?php echo base_url() ?>assets/js/login.js"></script>

</body>
</html>