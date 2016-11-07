
<!DOCTYPE html>
<html>
<head>	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/registrar.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


	<title>Registrate</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
           
            <div class="wrap">
                <p class="form-title">
                    Registrate! </p>
                
 <form class="login"  id="formularioRegistrar" action="<?php base_url() ?>/Usuarios_autenticacion/registrar_nuevo" method="post" >
  <input type="text" placeholder="Nombre de Usuario" name="usuario" id="usuario" minlength="3" />
  <input type="password" placeholder="Pon una Contrase&ntilde;a" name="password" id="password" minlength="5" />
  <input type="email" placeholder="Tu Email" name="email" id="email" />
  <br><br><br>
  <label class="secreta" >Por seguridad provee una palabra secreta para tu cuenta</label>
  <input type="password" name="secreta" id="secreta" minlength="5">
  <br>
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

 <?php  $ocupado = $this->session->flashdata('ocupado');
   if($ocupado)
   { ?>
  <div class="alert alert-warning">
   <a href="<?php echo base_url() ?>Usuarios_autenticacion/mostrar_registrar" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong><?= $ocupado;?></strong> 
</div>
  <?php } ?>

 <?php  $error = $this->session->flashdata('error');
   if($error)
   { ?>
  <div class="alert alert-danger">
   <a href="<?php echo base_url() ?>Usuarios_autenticacion/mostrar_registrar" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong><?= $error;?></strong> 
</div>
  <?php } ?>

<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
   <script src ="http://ajax.microsoft.com/ajax/jquery.validate/1.7/additional-methods.js"></script>
  <script src="<?php echo base_url() ?>assets/js/signup.js"></script>
</body>
</html>