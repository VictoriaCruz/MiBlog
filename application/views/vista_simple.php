<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/css/bootstrap-flex.min.css">
	<title>Mi Blog</title>
</head>
<body >

   <div style="position:absolute; top:500px;left:1200px;">
   	<p>Te gustaria hacer un post?<?php echo anchor('Usuarios_autenticacion/mostrar_iniciar','Inicia Sesion'); ?></p>
   </div>
<div style="position:absolute;left:1200px;top:350px">
   <p>Para ver los posts, crear nuevos <br>
     y comentar inicia sesion y se parte de <br>
      todo lo que hay! </p>
 </div>

 
 <div style="position:absolute;left:200px; top:450px">
 
 	<?php 
      $query  = $this->db->get('entry');
 	   foreach ($query -> result() as $row) :?> 
      <p><a href="<?php echo base_url() ?>FormularioControlador/post/<?= $row-> entry_id?>"><?php echo $row -> entry_name;?></a></p>
      <p>Posteado por: <?php echo $row -> user;?> -- <?php echo $row -> date;?></p>
      <br><hr>   
     
 <?php endforeach;?> 
  
 </div>  

</body>
</html>