<?php
if (isset($this->session->userdata['logged_in'])) {

header("location: http://miproyectoprueba.com/controllers/Usuarios_autenticacion/proceso_registro");
}
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/css/bootstrap-flex.min.css">
	<title>Inicia sesion</title>
</head>
<body> 
<?php
if (isset($message_display)) {
echo "<div class='message'>";
echo $message_display;
echo "</div>";
}
?> 

<div id="main">
<div id="login">
<h2>Inicia Sesion</h2>
<hr/>
<?php echo form_open('Usuarios_autenticacion/proceso_registro'); ?>
<?php
echo "<div class='error_msg'>";
if (isset($error_message)) {
echo $error_message;
}
echo validation_errors();
echo "</div>";
?>
<label>Usuario :</label>
<input type="text" name="usuario" id="name" placeholder="nombre de usuario"/><br /><br />
<label>Password :</label>
<input type="password" name="password" id="password" placeholder="**********"/><br/><br />
<input type="submit" value=" Login " name="submit"/><br />
<?php echo anchor('Usuarios_autenticacion/mostrar_registrar','No estas registrado? Haz click aqui'); ?>
<?php echo form_close(); ?>
</div>
</div>

</body>
</html>