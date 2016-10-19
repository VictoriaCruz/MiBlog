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
<link rel="stylesheet" href="/assets/css/pag_principal.css" type="text/css" />
	<title>Mi Blog</title>
</head>
<body background="<?php echo base_url();?>/assets/imagenes/fondoBlog.jpg">
  <div class="divPrincipal"> 
  <p class="textoBienvenida">Hola Bienvenido a mi Blog!!<p>
  </div>
   <div style="position:absolute; top:50px;left:1200px;">
   	<p>
       <a href="<?php echo base_url() ?>Usuarios_autenticacion/logout"> Cerrar sesi&oacute;n </a>
    </p>
   </div>

 <div class="divBio">
 	<p class="textoNormal">
 	Hola <?php echo "$usuario"; ?>, me llamo Victoria, bienvenido a mi Blog de prueba, <br>
 	podras comentar y ver lo que demas gente comente

 	</p>
 </div>

 <div style="position:relative;left:200px; top:350px">

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

 
  <?php echo form_open('FormularioControlador/insertar_comentarios');?>
    <div id="formulario" style="position:relative;top:350px;left:200px;">
    <?php echo form_fieldset('Nuevo comentario');?>
 
 <table>
     <tr>
          <td><label for="titulo">Titulo:</label></td>
           <td><input type="text" name="titulo"></td>
     </tr>
     <tr>
          <td><label for="comentario">Comentario:</label></td>
          <td><input type="text" name="textComentario"></td>
     </tr>
   
      <tr>
           <td></td>
           <td><input type="submit" name="enviar" value="Enviar Comentario"></td>
      </tr> 
       <?php echo form_close();?>
 </table>
  <?php echo form_fieldset_close();?>
 </div>

 <?php echo "<div>";
  if (isset($message_display)) {
   echo $message_display;
    }
   echo "</div>"; ?>

</body>
</html>