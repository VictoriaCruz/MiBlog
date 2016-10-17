<!DOCTYPE html>
<html>
<head>
	<title>Inicia sesion</title>
</head>
<body>
<div style="position:absolute; top:300px; left:600px;">
	<form name="inicio_sesion" method="post" action="<?php echo base_url() ?>usuarios/iniciar_sesion_post">
		<label for="nombre">Nombre:</label>
		<br>
		<input type="text" name="nombre" placeholder="Tu nombre de usuario">
		<br>
		<label for="password">Password:</label>
		<br>
		<input type="password" name="password" placeholder="****">
		<input type="submit" name="enviar" value="Enviar">
	</form>
	<!-- <?php //if ($error): ?>
    <p> <?php //echo $error ?> </p>   
    <?php //endif; ?> -->
</div>
</body>
</html>