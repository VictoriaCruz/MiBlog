
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/assets/css/" type="text/css" />
	<title>Registrate</title>
</head>
<body>
<div id="main">
<div id="login">
<h2>Registrate</h2>
<hr/>
<?php
echo "<div class='error_msg'>";
echo validation_errors();
echo "</div>";
echo form_open('Usuarios_autenticacion/registrar_nuevo'); 
echo "<div>";
if (isset($message_display)) {
echo $message_display;
}
echo "</div>"; ?>


<label>Crea tu usuario:</label>
<input type="text" name="usuario" placeholder="nombre de usuario">
<br>
<label>Tu contrase&ntilde;a: </label>
<input type="password" name="password" placeholder="********">
<br>
<label>Email: </label>
<input type="email" name="email" placeholder="ejemplo@hotmail.com">
<br/>
<br/>
<input type="submit" name="submit" value="Registrarme">

<?php echo form_close();?>
<?php echo anchor('Usuarios_autenticacion/mostrar_iniciar','Inicia Sesion aqui'); ?>
</div>
</div>
</body>
</html>