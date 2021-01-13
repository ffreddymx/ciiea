<?php
$mysqli = new mysqli('localhost' , 'root' ,'' ,'ciiea');

if($_POST && !empty($_POST['Correo']) && !empty($_POST['Contraseña']) ) {
$resultado = $mysqli->query("SELECT * FROM maestro WHERE Correo = '{$_POST['Correo']}' AND Contraseña = '{$_POST['Contraseña']}' ");
$fila = $resultado->fetch_assoc();


     if(isset($fila)) {
           session_start();

      $_SESSION["user"]=$fila['Correo'];
      $_SESSION["nombre"]=$fila['Nombre'];
      $_SESSION["autentificado"] ="SI";
      fclose($file);

           //todo bien
         header("Location: inicio.php");
           exit;

      } else {
      	mysqli_free_result($resultado);
		mysqli_close($conexion);
           session_destroy();
           header("Location: index.php?error=si");
           echo "usuario incorrecto o password incorrecto";
      }
      mysqli_close($resultado);
      	mysqli_free_result($resultado);

}

?>
