<?php
if (isset($this->session->userdata['logged_in'])) 
{
$usuario = ($this->session->userdata['logged_in']['usuario']);
$email = ($this->session->userdata['logged_in']['email']);
} else {
	$usuario = '';
	$email = '';
}
?>

<!DOCTYPE html>
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
            <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">
            <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/posts.css"">
	<title> <?php echo "$titulo"; ?> </title>
</head>
<body>
  
        <div class="container col-lg-12 main">
        <div class="col-lg-12 post">
                <div class="container">

                    <h2><?php echo "$titulo"; ?></h2>
                    <div class="body-text">

                        <p class='text-muted ubuntu'>Por: <?php echo "$usuario"; ?> | <?php echo "$fecha"; ?></p>
                        <br>
                        <div class="row">
                            <div class="col-lg-6"><p><?php echo "$contenido"; ?></p></div>
                            <div class="col-lg-6"><p class=""><img alt="image" src="http://startupcentral.in/wp-content/uploads/2013/09/280x183xideabulb1.jpg.pagespeed.ic.gyJk5j8KnN.jpg" width="100%"></p></div>
                        </div>

                        <br/>
                        
                    </div>
                        <br/>
                        <p>Gracias por visitar mi Post!</p>
                        <hr>
               

                   <div>     
                   <?php echo form_open('FormularioControlador/comentar');  ?>
                   <label for="comentario">Comentario:</label>
                   <input type="text" name="comentario" placeholder="opina algo ...">
                    <?=form_hidden('id',$this->uri->segment(3));?>
                   <br>
                   <input type="submit" name="comentar" value="Comentar">
                   <?php echo form_close();?>
                   </div>

                     <?php echo "<div>";
  			if (isset($error)) {
 			  echo $error;
   				 }
   				echo "</div>"; ?>
                </div>
             
              
            

        </div>
        </div>


</body>
</html>