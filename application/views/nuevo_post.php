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
 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>    <!-- https://www.tinymce.com/ -->
<script>tinymce.init({ selector:'textarea' });</script>
	<title>Nuevo Post</title>
</head>
<body>

 <!--<?php   //echo form_open_multipart('FormularioControlador/insertar_comentarios');?> -->
    <div  style="position:absolute;top:100px;left:200px;">
   <form method="post" action ="<?php echo base_url() ?>FormularioControlador/insertar_comentarios" enctype="multipart/form-data" >
    <?php echo form_fieldset('Nuevo Post');?>

      <label for="titulo">Titulo:</label>
      <input class="form-control" type="text" name="titulo">

      <label for="Descripcion">Dinos de que tratara tu post</label>
      <input type="text" name="descripcion" class="form-control" placeholder="Da una breve descripcion">

      <label for="comentario">Contenido:</label>
      <textarea name="textComentario" rows="15" cols="70"></textarea>

     <label for="imagen">Subir Imagen</label>
     <input type="file" name="imagen">
     <br>
     <input class="btn btn-success" type="submit" name="enviar" value="Postear">
      
 <?php echo form_fieldset_close();   ?> 
      <!-- <?php //echo form_close();?>-->
 </form>
 
 </div>

  <?php echo "<div>";
  if (isset($message_display)) {
   echo $message_display;
    }
   echo "</div>"; ?>
</body>
</html>
