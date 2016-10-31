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
 <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/header.css">
 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>    <!-- https://www.tinymce.com/ -->
<script>tinymce.init({ selector:'textarea' });</script>
	<title>Nuevo Post</title>
</head>
<body class="body-top">
<div style="position:absolute;left:900px;top:50px">
  <a href="<?php echo base_url() ?>FormularioControlador/mostrar_principal"><img src="<?php base_url()?>/assets/imagenes/home.png"></a>
</div>
 <!--<?php   //echo form_open_multipart('FormularioControlador/insertar_comentarios');?> -->
    <div  style="position:absolute;top:100px;left:200px;">
   <form method="post" id="nuevoPost" action ="<?php echo base_url() ?>FormularioControlador/insertar_comentarios" enctype="multipart/form-data" >
  <label class="label">  <?php echo form_fieldset('Nuevo Post');?> </label>

      <label class="label" for="titulo">Titulo:</label>
      <input class="form-control" type="text" required="required" name="titulo" id="titulo" minlength="3">
      <br>
      <label class="label" for="Descripcion">Dinos de que tratara tu post</label>
      <input type="text" name="descripcion" required="required" class="form-control" placeholder="Da una breve descripcion" id="descripcion" minlength="15">
      <br>
      <label class="label" for="comentario">Contenido:</label>
      <textarea name="textComentario" required="required" rows="15" cols="70" id="textComentario" > </textarea>
<br>
     <label class="label" for="imagen">Subir Imagen</label>
     <input type="file" name="imagen">
     <br>
     <input class="btn btn-success" type="submit" name="enviar" value="Postear">
      
 <?php echo form_fieldset_close();   ?> 
      <!-- <?php //echo form_close();?>-->
 </form>
 
 </div>

 


   <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
  <script src="<?php echo base_url() ?>assets/js/nuevopost.js"></script>
</body>
</html>
