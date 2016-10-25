<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/css/bootstrap-flex.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<title>Mi Blog</title>
</head>
<body >

   <!--<div style="position:absolute; top:500px;left:1200px;">
  
   	<p>Te gustaria hacer un post?<?php // echo anchor('Usuarios_autenticacion/mostrar_iniciar','Inicia Sesion'); ?></p>
   </div>
<div style="position:absolute;left:1200px;top:350px">
   <p>Para ver los posts, crear nuevos <br>
     y comentar inicia sesion y se parte de <br>
      todo lo que hay! </p>
 </div>
-->
 

 <div class="container">
<div class="col-md-12">
  <?php 
      $query  = $this->db->get('entry');
    foreach ($query -> result() as $row) :?> 
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
</body>
</html>