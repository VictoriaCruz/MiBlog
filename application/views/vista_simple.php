<!DOCTYPE html>
<html>
<head>

	<title>Mi Blog</title>
</head>
<body >
  <div  style="position:relative;left:500px; top:50px"> 
  <p>Hola Bienvenido a mi Blog!!<p>
  </div>

   <div style="position:absolute; top:50px;left:1200px;">
   	<?php echo anchor('Usuarios_autenticacion/mostrar_iniciar','Inicia Sesion'); ?>
   </div>

 <div  style="position:relative;left:500px; top:150px">
 	<p>
 	Hola me llamo Victoria, bienvenido a mi Blog de prueba, <br>
 	podras comentar y ver lo que demas gente comente

 	</p>
 </div>

 <div style="position:relative;left:200px; top:250px">

 	<?php 
      $query = $this->db->get('entry');
 	foreach ($query -> result() as $row) :?>   
 	<p>Titulo : <?php echo $row -> entry_name;?></p>
 	<p>Comentario : <?php echo $row -> entry_body;?></p>
    <br>
    <p>Posteado por: <?php echo $row -> user;?> -- <?php echo $row -> date;?></p>
    <br><hr>
 
    <?php endforeach;?>
 </div>

 <div style="position:relative; top:350px;left:200px;">
 <p>Te gustaria comentar?? Inicia Sesion porfavor</p>
 </div>

</body>
</html>