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