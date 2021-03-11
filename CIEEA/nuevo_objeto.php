<?php
error_reporting(0);


if($_POST["opc"]==66){

	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$pass = $_POST['pass'];

	$conexionx = new  mysqli('localhost','root','','ciiea');
	$insertarDatos = "INSERT into maestro(Nombre,Correo,Contraseña) values('$nombre','$correo','$pass')  ";
	mysqli_query($conexionx,$insertarDatos);
	header("Location:index.php?opc=1");

}
 else {

include 'capa.php';
include("save_objeto.php");
 }



if($_POST["opcx"]==25){

    $valor = $_POST['alumno'];

$per = $_POST["periodo"];
$nota = $_POST["nota"];
$act = $_POST["actividad"];
$id = $_POST['IDac'];

 $result  = mysqli_query($conexion, "UPDATE actividades SET  Periodo ='$per',Nota='$nota',Actividad='$act' WHERE id = '$id'  ");
    mysqli_close($conexion);

   	header("Location:materias.php?gr=$valor");

} else



switch ($_POST["opc"]) {

	case '1': #insertar el alumno
	$salvarE = new Aprende();
	$salvarE->insertAlumno($_POST["nombre"],$_POST["grupo"],$_POST["curp"]);
	header("Location:alumnos.php");
	break;

	case '2': #modificar el alumno
    $id = $_POST["idalumno"];
    $nombre = $_POST["nombre"];
    $grupo = $_POST["grupo"];
    $curp = $_POST["curp"];

    $result  = mysqli_query($conexion, "UPDATE alumno SET Nombre_Alumno='$nombre',Id_Grupo='$grupo',CURP='$curp' WHERE No_Alumno='$id' ");
    if($result){ echo 'data updated'; }
    mysqli_close($conexion);
    header("Location:alumnos.php");
	break;

	case '3': #agregar materias al alumno
    $valor = $_POST['alumno'];
	$salvarE = new Aprende();
	$salvarE->insertMateria($_POST["materia"],$_POST["alumno"]);
	header("Location:materias.php?gr=$valor");
	break;

	case '5': #calificacion del alumno
    $valor = $_POST['alumno'];
    $idma = $_POST['IDma'];
    $tiponota = $_POST["tinota"];
	$salvarE = new Aprende();
	$salvarE->insertActividad($_POST["periodo"],$_POST["alumno"],$_POST["tinota"],$_POST["nota"],$_POST["actividad"],$_POST['IDma']);
    mysqli_close($conexion);

	header("Location:materias.php?gr=$valor");
	break;

	case '6': #agregar profesor
	$salvarE = new Aprende();
	$salvarE->insertProfesor($_POST["nombre"],$_POST["correo"],$_POST["pass"]);
	header("Location:maestro.php");
	break;

	case '7': #modificar profesor
    $id = $_POST["idprofesor"];
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $pass = $_POST["pass"];

    $result  = mysqli_query($conexion, "UPDATE maestro SET Nombre='$nombre',Correo='$correo',Contraseña='$pass' WHERE Id_Maestro='$id' ");
    mysqli_close($conexion);
    header("Location:maestro.php");
	break;

	case '8': 
	$salvarE = new Aprende();
    $idprof = $_POST["idprof"];//id del profe
	$salvarE->insertGrupoProf($_POST["ciclo"],$_POST["grupo"],$_POST["idprof"]);
	header("Location:grupos_prof.php?gr=$idprof");
	break;

	case '9': 
	$salvarE = new Aprende();
	$salvarE->insertAluToGrupo($_POST["grupo"],$_POST["ciclo"],$_POST["IDg"]);
	header("Location:agr_alumno.php");
	break;

	case '10': 
	$valor = $_POST["alumno"];
	$salvarE = new Aprende();
	$salvarE->insertIncidencia($_POST["alumno"],$_POST["IDmaa"],$_POST["incidencia"]);
	header("Location:materias.php?gr=$valor");
	break;

	case '11': #agregar los usuarios
	$salvarE = new Aprende();
	$salvarE->insertUsuario($_POST["usuario"],$_POST["password"],$_POST["nombre"],$_POST["tipo"]);
	header("Location:user.php");
	break;

	case '12': #modificar los usuarios
    $id = $_POST["ID"];
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    $nombre = $_POST["nombre"];
    $tipo = $_POST["tipo"];

    $result  = mysqli_query($conexion, "UPDATE userxwz SET usuario='$usuario',password='$password',Tipo='$tipo',Nombre='$nombre' WHERE Id='$id' ");
    mysqli_close($conexion);
    header("Location:user.php");
	break;


	case '13':
    $idalu = $_POST["alumno"];
	$salvarE = new Aprende();
	$salvarE->insertAsistencia($_POST["alumno"],$_POST["fecha"],$_POST["asistio"],$_POST["justifi"]);
	header("Location:lasasistencias.php?gr=$idalu");
	break;

	case '14':
		$salvarE = new Aprende();
	$salvarE->insertEvento($_POST["title"],$_POST["start"],$_POST["end"],$_POST["color"]);
	header("Location:calendario.php");
	break;

	case '15':#Elimina el evento
	if (isset($_POST['delete']) && isset($_POST['id'])){
		
	$id = $_POST['id'];
    $salvarE = new Aprende();
	$salvarE->delEvento($_POST['id']);
	
}elseif (isset($_POST['title']) && isset($_POST['color']) && isset($_POST['id'])){
	
	$id = $_POST['id'];
	$title = $_POST['title'];
	$color = $_POST['color'];
	$sql = "UPDATE events SET  title = '$title', color = '$color' WHERE id = $id ";
	$result  = mysqli_query($conexion, "UPDATE events SET  title = '$title', color = '$color' WHERE id = '$id'  ");
    mysqli_close($conexion);

}
header('Location: calendario.php');
	break;

	case '16':
	$salvarE = new Aprende();
	$salvarE->insertGrupo($_POST["grupo"],$_POST["turno"],$_POST["ciclo"],$_POST["grado"]);
	header("Location:Asistencias.php");

		break;

	case '17':#Eliminar el alumno
    $salvarE = new Aprende();
	$salvarE->delAlumno($_POST['ID']);
		header("Location:alumnos.php");
	break;

	case '18':#Eliminar el alumno
    $salvarE = new Aprende();
	$salvarE->delProfesor($_POST['ID']);
		header("Location:maestro.php");
	break;

	case '19':#Eliminar el alumno
	$alu = $_POST["IDalu"];
    $salvarE = new Aprende();
	$salvarE->delAsistencia($_POST['ID']);
		header("Location:lasasistencias.php?gr=$alu");
	break;

	case '20':#Eliminar el alumno
    $salvarE = new Aprende();
	$salvarE->delGrupo($_POST['ID']);
		header("Location:Asistencias.php");
	break;

	case '21':
	$id = $_POST["alumno"];
	$salvarE = new Aprende();
	$salvarE->insertNMateria($_POST["materia"]);
	header("Location:materias.php?gr=$id");
		break;

	case '22':
	$salvarE = new Aprende();
	$salvarE->insertActividades($_POST["actividad"]);
	header("Location:actividades.php");
		break;

	case '23':
		$actividad = $_POST["actividad"];
		$idac = $_POST["idac"];
    $result  = mysqli_query($conexion, "UPDATE tareas SET Tarea='$actividad' WHERE id='$idac' ");
    mysqli_close($conexion);
    header("Location:actividades.php");
		break;

	case '24':#Eliminar el alumno
    $salvarE = new Aprende();
	$salvarE->delActividad($_POST['ID']);
		header("Location:actividades.php");
	break;

	case '26':#Eliminar el alumno
	$id = $_POST["alumno"];

    $salvarE = new Aprende();
	$salvarE->delActividades($_POST['idx']);
	header("Location:materias.php?gr=$id");
	break;

	case '27':#Eliminar el alumno
	$id = $_POST["idgrupo"];
	$t = $_POST["t"];
	$c = $_POST["c"];
	$g = $_POST["g"];
	
	$idprof = $_POST['profesor'];

   $result  = mysqli_query($conexion, "UPDATE grupo SET Id_Maestro='$idprof' WHERE id='$id' ");
   mysqli_close($conexion);
   header("Location:agr_profesor.php?id=$id&g=$g&c=$c&t=$t");
	break;

	case '28':#

	$salvarE = new Aprende();
	$salvarE->insertEscuela($_POST["nombre"],$_POST["domicilio"],$_POST["cct"],$_POST["zona"],$_POST["municipio"]);
	header("Location:escuela.php");
	break;

	case '29':#Eliminar el alumno
    $salvarE = new Aprende();
	$salvarE->delEscuela($_POST['ID']);
		header("Location:escuela.php");
	break;


	default:
		# code...
	break;


}




?>
