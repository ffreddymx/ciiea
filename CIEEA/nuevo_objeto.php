<?php
include 'capa.php';
include("save_objeto.php");



switch ($_POST["opc"]) {

	case '1': #insertar el alumno
	$salvarE = new Aprende();
    $valor = $_POST["idgrupo"];
	$salvarE->insertAlumno($_POST["nombre"],$_POST["apellido"],$_POST["tutor"],$_POST["direccion"],$_POST["matricula"]);
	header("Location:agr_alumno.php");
	break;

	case '2': #modificar el alumno
    $id = $_POST["ID"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $tutor = $_POST["tutor"];    
    $direccion = $_POST["direccion"];
    $profesor = $_POST["profesor"];
    $matricula = $_POST["matricula"];

    $result  = mysqli_query($conexion, "UPDATE alumnos SET Nombre='$nombre',Apellido='$apellido',Tutor='$tutor',Direccion='$direccion', Matricula='$matricula' WHERE id='$id' ");
    if($result){ echo 'data updated'; }
    mysqli_close($conexion);
    header("Location:agr_alumno.php");
	break;

	case '3': #agregar materias al alumno
    $valor = $_POST['alumno'];
	$salvarE = new Aprende();
	$salvarE->insertMateria($_POST["materia"],$_POST["alumno"]);
	header("Location:materias.php?gr=$valor");
	break;

	// case '4': 
	// $salvarE = new Aprende();
	// $salvarE->delResultado($_POST["iduser"],$_POST["tabla"]);
	// $salvarE->insertResultado($_POST["iduser"],$_POST["correctas"],$_POST["incorrectas"],$_POST["tabla"]);
	// break;

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
    $valor = $_POST["idgrupo"];
	$salvarE->insertProfesor($_POST["nombre"],$_POST["apellido"],$_POST["direccion"],$_POST["movil"],$_POST["profesion"]);
	header("Location:agr_profesor.php");
	break;

	case '7': #modificar profesor
    $id = $_POST["ID"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $direccion = $_POST["direccion"];
    $movil = $_POST["movil"];
    $profesion = $_POST["profesion"];

    $result  = mysqli_query($conexion, "UPDATE profesor SET Nombre='$nombre',Apellido='$apellido',Direccion='$direccion',Movil='$movil',Profesion='$profesion' WHERE id='$id' ");
    mysqli_close($conexion);
    header("Location:agr_profesor.php");
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


	case '15':
	
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

	default:
		# code...
	break;
}






?>
