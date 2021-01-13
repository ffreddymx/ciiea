<?php
if(!isset($_SESSION)) 
    session_start(); 

if ($_SESSION["autentificado"] != "SI") {
    header("Location: index.php");
    exit();
}


if(!empty($_SESSION['user']))
 {
   $conexion =  mysqli_connect('localhost' , 'root' ,'' ,'ciiea');
                   mysqli_set_charset($conexion,'utf8');

   $_SESSION['user'] = mysqli_real_escape_string($conexion,$_SESSION['user']);

} else {
      session_destroy();
      header("Location:index.php");
        exit;
   }

 
?>
