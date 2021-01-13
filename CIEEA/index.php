<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="viewport" content="width=device-width, user-scalable= yes, initial-scale=1.0, maximun-scale=3.0, minimun-scale=1.0">
	<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" href="estilos.css">
</head>
<body>
	<form action="Validar.php" method="POST" class="formulario">
	<h1>Inicia Sesion</h1>
	<div class="contenedor">

	<div class="input-contenedor">
		<i class="fas fa-envelope icon"></i>
		<input type="text" placeholder="Correo electronico" name="Correo">

	</div>	


	<div class="input-contenedor">
		<i class="fas fa-key icon"></i>
		<input type="password" placeholder="Contraseña" name="Contraseña">

	</div>
	<input type="submit" value="Iniciar" class="button" href="index.php" name="iniciar">
	<p>Al registrarte, aceptas nuestras Condiciones de uso y Politica de privacidad.</p>
	<p>¿No tienes una cuenta?<a class="link" href="Registro.php">Registrate</a></p>	




	</div>
</form>
</body>
</html>

