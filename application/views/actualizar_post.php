<?php
if (isset($this->session->userdata['logged_in'])) 
{
$usuario = ($this->session->userdata['logged_in']['usuario']);
} else {
header("location: iniciar_sesion");
 
}
$img = $fila->img;
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/css/bootstrap-flex.min.css">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/header.css">
 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>    
<script>tinymce.init({ selector:'textarea' });</script> 
	<title>Actualiza tu Post</title>
</head>
<body class="body-top">


  <?php  $error = $this->session->flashdata('error');
   if($error)
   { ?>
  <div class="alert alert-danger">
   <a href="<?php echo base_url() ?>FormularioControlador/mostrar_actualizar" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong><?= $error;?></strong> 
</div>
  <?php } ?>

    <div  style="position:absolute;top:100px;left:200px;">
   <form method="post" id="nuevoPost" action ="<?php echo base_url() ?>FormularioControlador/actualizar_post" enctype="multipart/form-data" >
  <label class="label">  <?php  echo form_fieldset('Actualiza tu Post');?> </label>
      <label class="label" for="titulo">Titulo:</label>
      <input class="form-control" type="text" required="required" value='<?php echo $fila->entry_name; ?>' name="titulo" id="titulo"  minlength="3">
      <br>
      <label class="label" for="Descripcion">Dinos de que tratara tu post</label>
      <input type="text" name="descripcion" required="required" value='<?php echo $fila->description; ?>' class="form-control"  id="descripcion" minlength="15">
      <br>
      <label class="label" for="comentario">Contenido:</label>
      <textarea name="textComentario"  required="required"  rows="15" cols="70" id="textComentario"  ><?php echo $fila->entry_body; ?> </textarea>
<br>  
     <label class="label" for="imagen">Subir Imagen</label>
     <input type="file" name="imagen" >
     
     <br>  
     <input  type="hidden" name="id" value="<?php echo $id;?>" >
     <input class="btn btn-success" type="submit" name="enviar" value="Actualizar">
      
 <?php echo form_fieldset_close();   ?> 
      
 </form>
 </div>
<?php echo strlen($fila->img) == 0 ? '' : "<div style='position:absolute;top:900px;left:600px;'><img alt='image' src='http://proyectoprueba.com/upload/".$fila->img."' width='15%' height='15%'></div>"; ?>
 


   <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
  <script src="<?php echo base_url() ?>assets/js/nuevopost.js"></script>
</body>
</html>   
