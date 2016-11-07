<?php
if (isset($this->session->userdata['logged_in'])) 
{
$usuario_log = ($this->session->userdata['logged_in']['usuario']);

} else {
	$usuario_log = '';
	$email = '';
}

  $id  = $this->uri->segment(3);

?>
<!DOCTYPE html>
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
            <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">
            <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/posts.css"">
	<title> <?php echo $post->entry_name; ?> </title>
</head>
<body>
      <?php  $comentar = $this->session->flashdata('comentar');
   if($comentar)
   { ?>
  <div class="alert alert-success">
   <a  class="close" data-dismiss="alert" aria-label="close" href="<?= base_url();?>FormularioControlador/post/<?= $id;?>">&times;</a>
  <strong><?= $comentar;?></strong> 
</div>
  <?php } ?>

    <?php  $nopermitido = $this->session->flashdata('nopermitido');
   if($nopermitido)
   { ?>
  <div class="alert alert-danger">
   <a id="nopermitido" href="<?= base_url();?>FormularioControlador/post/<?= $id;?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong><?= $nopermitido;?></strong> 
</div>
  <?php } ?>
        <div class="container col-lg-12 main">
        <div class="col-lg-12 post">
                <div class="container">
       
              <h2><?php echo $post->entry_name; ?></h2>
              <div style="position:absolute; left:1000px;top:10px;"><?php if (isset($this->session->userdata['logged_in'])) 
                    { ?>
                     <a href="<?php echo base_url() ?>Blog/principal"><img src="<?php base_url()?>/assets/imagenes/home.png"></a>
                  <?php  } 
                    else
                    { ?>  <a href="<?php echo base_url() ?>Blog/index"><img src="<?php base_url()?>/assets/imagenes/home.png"></a>
                     <?php } ?></div>
                    <div class="body-text">
                        
                        <p class='text-muted ubuntu'>Por: <?php echo $post->user; ?> | <?php echo $post->date; ?></p>
                        <br>
                          <p><?php echo $post->description;?></p>
                        <div class="row">
                            <div class="col-lg-6"><p><?php echo $post->entry_body; ?></p></div>
                            <div class="col-lg-6" id='img'><p class=""><?php echo strlen($post->img) == 0 ? '' : "<img alt='image' src='http://proyectoprueba.com/upload/".$post->img."' width='100%'>"; ?></p></div>
                        </div>

                        <br/>
                       
                    </div>
                        <br/>
                        <p>Gracias por visitar mi Post! <b>Para comentar tienes que iniciar sesion</b></p>
                        <hr>
                        <?php if($usuario_log == $post->user) { 
                           echo form_open('FormularioControlador/mostrar_actualizar');  ?>
                            <?=form_hidden('id',$this->uri->segment(3));?>
                          <button type="submit" class="btn btn-info">Actualizar</button>
                        <?php echo form_close(); } ?>
                 <h1> Comentarios </h1>
                 <hr>

          
         <div class="comments-list"> 
         <?php     
         foreach($comments as $row):  ?> 
        <div class="media-body">
         <h4 class="media-heading user_name"><?php   echo $row-> usuario;?></h4>
         <?php   echo $row-> comentario; ?>
         </div> 
          <p class="pull-right"><small><?php   echo $row-> fecha;?></small></p>  
          <br>
          <?php endforeach; ?> 
                               
         </div>
        <br><br> 
                   <div>     
                   <?php echo form_open('FormularioControlador/comentar');  ?>
                   <label for="comentario">Comentario:</label>
                   <input type="text" name="comentario" placeholder="opina algo ..." class="form-control">
                    <?= form_hidden('id',$this->uri->segment(3));?>
                   <br>
                   <input type="submit" name="comentar" value="Comentar" class="btn btn-info">

                   <?php echo form_close();?> 
                   </div>
                </div>
        </div>
        </div> 
    


</body> 
</html>