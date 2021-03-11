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
<form action="nuevo_objeto.php" method="POST" class="formulario">

    <input type="hidden" name="opc" value="66" id="opc">

	<h1>Registrate</h1>
	<div class="contenedor">

	<div class="input-contenedor">
		<i class="fas fa-user icon"></i>
		<input type="text" placeholder="Nombre completo" name="nombre" required>

	</div>	


	<div class="input-contenedor">
		<i class="fas fa-envelope icon"></i>
		<input type="text" placeholder="Correo electronico" name="correo" required> 

	</div>	


	<div class="input-contenedor">
		<i class="fas fa-key icon"></i>
		<input type="password" placeholder="Contraseña" name="pass" required>

	</div>
	<input type="submit" name="Registrar"value="Registrate" class="button">
	<p>Al registrarte, aceptas nuestras Condiciones de uso y Politica de privacidad.</p>
	<p>¿Ya tienes una cuenta?<a class="link" href="index.php">Iniciar Sesion</a></p>	




	</div>
</form>
</body>
</html>
