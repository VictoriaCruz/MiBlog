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
	<title>Mi Blog</title>
</head>
<body background="<?php echo base_url();?>/assets/imagenes/">
  
   <div style="position:absolute; top:50px;left:1200px;">
   	<p>
       <a href="<?php echo base_url() ?>Usuarios_autenticacion/logout"> Cerrar sesi&oacute;n </a>
    </p>
   </div>


 <div style="position:relative;left:200px; top:250px">

 	  <?php 
      $query  = $this->db->get('entry');
     foreach ($query -> result() as $row) :?>  <!-- aqui trate de obtener el id del comentario -->
      <p><a href="<?php echo base_url() ?>FormularioControlador/post/<?= $row-> entry_id?>"><?php echo $row -> entry_name;?></a></p>
      <p>Posteado por: <?php echo $row -> user;?> -- <?php echo $row -> date;?></p>
      <br><hr>   
     
 <?php endforeach;?> 
 </div>



 <div style="position:absolute; top:90px;left:1200px;">
   	<?php echo anchor('FormularioControlador/mostrar_formulario','Crea un Nuevo Post!!'); ?>
   </div>


 <?php echo "<div>";
  if (isset($message_display)) {
   echo $message_display;
    }
   echo "</div>"; ?>

</body>

</html>