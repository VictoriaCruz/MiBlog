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
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <link rel="shortcut icon" href="http://getbootstrap.com/assets/ico/favicon.ico">
    <title>Mi Blog</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/css/bootstrap-flex.min.css">
    <link href="<?php echo base_url() ?>assets/css/header.css"" rel="stylesheet">
    </head>
    <body class="body-top">
   
    <div class="container">
      <div class="jumbotron">
        <h1>Bienvenido a Blog!</h1>
        <p class="lead">Hola <?php $suario?>, mi nombre es Victoria y aqui podras postear sobre cualquier tema que te llame la atencion, cosas que te gustan, o lo que sea que quieras publicar! Empieza ya :)</p>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="./dist/js/bootstrap.min.js"></script>
  </body>
</html>

