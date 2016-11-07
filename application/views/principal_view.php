<?php
if (isset($this->session->userdata['logged_in'])) 
{
$usuario = ($this->session->userdata['logged_in']['usuario']);
$email = ($this->session->userdata['logged_in']['email']);
} else {
header("location: iniciar_sesion");
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/css/bootstrap-flex.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/header.css">
	<title>Mi Blog</title>
</head>
<body>
<div style="position:absolute;top:10px;">
  <?php  $post = $this->session->flashdata('post');
   if($post)
   { ?>
  <div class="alert alert-success">
   <a href="<?php echo base_url() ?>Blog/principal" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong><?= $post;?></strong> 
</div>
  <?php } ?>


  <?php  $actualizado = $this->session->flashdata('actualizado');
   if($actualizado)
   { ?>
  <div class="alert alert-success">
   <a href="<?php echo base_url() ?>Blog/principal" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong><?= $actualizado;?></strong> 
</div>
  <?php } ?>
</div>
 <div class="menu">
 <label class="label label-info">Salir? <a href="<?php echo base_url() ?>Usuarios_autenticacion/logout"> Cerrar sesi&oacute;n </a></label>
 <label class="label label-info">Crea un nuevo post! <a href="<?php echo base_url() ?>FormularioControlador/mostrar_formulario">Click aqui</a></label>
 
 </div>

 
 <div class="container">
<div class="col-md-12">
  <?php 
    foreach ($query->result() as $row) :?> 
      <h1><a href="<?php echo base_url() ?>FormularioControlador/post/<?= $row-> entry_id?>"><?php echo $row -> entry_name;?></a></h1>
      <br>       
    <p><?php echo $row -> description;?></p>
    <div>
<span class="badge">Por: <?php echo $row -> user;?> </span>
<div class="pull-right"><span class="label label-success"> <?php echo $row -> date;?></span> </div>         
     </div>
    <hr>
    <?php  endforeach;?>
</div>
</div>





 <?php echo "<div>";
  if ( isset($message_display)) {
   echo $message_display;
    }
  echo "</div>"; ?>

</body>

</html>