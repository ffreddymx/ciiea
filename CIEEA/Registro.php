<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "ciiea";

$conexion = new  mysqli($server,$user,$pass,$db);

if($conexion->connect_errno){
die ("La conexión ha fallado" . $conexion->connect_errno);
}
else{ echo "Conectado";}
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
<form action="" method="POST" class="formulario">
	<h1>Registrate</h1>
	<div class="contenedor">

	<div class="input-contenedor">
		<i class="fas fa-user icon"></i>
		<input type="text" placeholder="Nombre completo" name="Nombre">

	</div>	


	<div class="input-contenedor">
		<i class="fas fa-envelope icon"></i>
		<input type="text" placeholder="Correo electronico" name="Correo"> 

	</div>	


	<div class="input-contenedor">
		<i class="fas fa-key icon"></i>
		<input type="password" placeholder="Contraseña" name="Contraseña">

	</div>
	<input type="submit" name="Registrar"value="Registrate" class="button">
	<p>Al registrarte, aceptas nuestras Condiciones de uso y Politica de privacidad.</p>
	<p>¿Ya tienes una cuenta?<a class="link" href="login.php">Iniciar Sesion</a></p>	




	</div>
</form>
</body>
</html>
<?php
                if(isset($_POST['Registrar']))
                {
			
			   $Nombre =$_POST["Nombre"];
               $Correo =$_POST["Correo"];
			   $Password =$_POST["Password"];
			   $Id_Maestro= rand(1,99);

               $insertarDatos = "INSERT INTO maestro VALUES('$Id_Maestro','$Nombre','$Correo','$Password')";

               $ejecutarInsertar = mysqli_query($conexion,$insertarDatos);
               if(!$ejecutarInsertar){
                   echo"Error";
               }
                }

              
                
                
                ?>