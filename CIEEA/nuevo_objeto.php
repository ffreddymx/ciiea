<?php
include 'capa.php';
include("save_objeto.php");



switch ($_POST["opc"]) {

	case '1': #insertar el alumno
	$salvarE = new Aprende();
	$salvarE->insertAlumno($_POST["nombre"],$_POST["grupo"]);
	header("Location:alumnos.php");
	break;

	case '2': #modificar el alumno
    $id = $_POST["idalumno"];
    $nombre = $_POST["nombre"];
    $grupo = $_POST["grupo"];

    $result  = mysqli_query($conexion, "UPDATE alumno SET Nombre_Alumno='$nombre',Id_Grupo='$grupo' WHERE No_Alumno='$id' ");
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
	$salvarE->insertActividad($_POST["alumno"],$_POST["tinota"],$_POST["nota"],$_POST["actividad"],$_POST['IDma']);

	$view->promedio =Aprende::getPromedio($valor,$idma,$tiponota);
	 foreach ($view->promedio as $value) 
	 { 
	 	$promedio = $value['prom'];
	 }
    
    $inscrito = $_POST['IDxx'];
    if($tiponota=='C1')
    $result  = mysqli_query($conexion, "UPDATE inscrito SET Cal1='$promedio' WHERE id='$inscrito' ");
		else if($tiponota=='C2') 
	    $result  = mysqli_query($conexion, "UPDATE inscrito SET Cal2='$promedio' WHERE id='$inscrito' ");
		else
		    $result  = mysqli_query($conexion, "UPDATE inscrito SET Cal3='$promedio' WHERE id='$inscrito' ");


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
	$salvarE->insertGrupo($_POST["grupo"],$_POST["turno"]);
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

	default:
		# code...
	break;


}




?>
