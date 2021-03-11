<?php

include_once('clases/clasConexion.php');
include_once('clases/clasSquery.php');


/*******************  aqui defines  *****************************/


class Aprende
{

	public  $id,$usuario,$password,$nombre,$tipo,$grado;
	public $actividad,$modulo;
	public $texto1,$texto2,$correcta,$incorrecta;

	public $apellido,$tutor,$direccion,$profesor,$grupo,$materia;

 function __construct() {

 		//$this->marca="";
    }



	 public function getTareas()
		{
		$obj_cliente=new sQuery();
		$obj_cliente->executeQuery("SELECT *  FROM  tareas  ");
		return $obj_cliente->fetchAll();
		}	 


	 public function getProfesor()
		{
		$obj_cliente=new sQuery();
		$obj_cliente->executeQuery("SELECT *  FROM  maestro  ");
		return $obj_cliente->fetchAll();
		}	 

	 public function getAlumnos()
		{
		$obj_cliente=new sQuery();
		$obj_cliente->executeQuery("SELECT *  FROM  alumnos  ");
		return $obj_cliente->fetchAll();
		}	 

	public function getGrupos()
		{
		$obj_cliente=new sQuery();
		$obj_cliente->executeQuery("SELECT *  FROM  grupo  ");
		return $obj_cliente->fetchAll();
		}

	public function getCiclos()
		{
		$obj_cliente=new sQuery();
		$obj_cliente->executeQuery("SELECT *  FROM  ciclo  ");
		return $obj_cliente->fetchAll();
		}

	public function getMaterias()
		{
		$obj_cliente=new sQuery();
		$obj_cliente->executeQuery("SELECT *  FROM  materias  ");
		return $obj_cliente->fetchAll();
		}


	public function getPromedio($valor,$idma,$tiponota)
		{
		$obj_cliente=new sQuery();
		$obj_cliente->executeQuery("SELECT AVG(Nota) as prom  FROM  actividades where idalumno='$valor' and Tiponota='$tiponota' and idmateria = '$idma'  ");
		return $obj_cliente->fetchAll();
		}


	public function getelAlumno($valor)
		{
		$obj_cliente=new sQuery();
		$obj_cliente->executeQuery("SELECT Nombre_Alumno FROM  alumno where No_Alumno='$valor' ");
		return $obj_cliente->fetchAll();
		}

	public function insertAlumno($nombre,$grupo,$curp)
	{
			$this->nombre = $nombre;
			$this->grupo = $grupo;
			$this->curp = $curp;

			$obj_cliente=new sQuery();
			$query="INSERT into alumno(Nombre_Alumno,Id_Grupo,CURP)
			        values('$this->nombre','$this->grupo','$this->curp')";
			$obj_cliente->executeQuery($query);
			return $obj_cliente->getAffect();
	}


	public function insertEscuela($nombre,$domicilio,$cct,$zona,$municipio)
	{
			$this->nombre = $nombre;
			$this->domicilio = $domicilio;
			$this->cct = $cct;
			$this->zona = $zona;
			$this->municipio = $municipio;

			$obj_cliente=new sQuery();
			$query="INSERT into escuela(Nombre,Direccion,CCT,Zona,Municipio)
			        values('$this->nombre','$this->domicilio','$this->cct','$this->zona','$this->municipio')";
			$obj_cliente->executeQuery($query);
			return $obj_cliente->getAffect();
	}

	public function insertActividades($nombre)
	{
			$this->nombre = $nombre;

			$obj_cliente=new sQuery();
			$query="INSERT into tareas(Tarea)
			        values('$this->nombre')";
			$obj_cliente->executeQuery($query);
			return $obj_cliente->getAffect();
	}

	public function insertGrupo($grupo,$turno,$ciclo,$grado)
	{
			$this->grupo = $grupo;
			$this->turno = $turno;
			$this->ciclo = $ciclo;
			$this->grado = $grado;

			$obj_cliente=new sQuery();
			$query="INSERT into grupo(Nombre_Grupo,Turno,Ciclo,Grado)
			        values('$this->grupo','$this->turno','$this->ciclo','$this->grado')";
			$obj_cliente->executeQuery($query);
			return $obj_cliente->getAffect();
	}

	public function insertEvento($titulo,$inicio,$fin,$color)
	{
			$this->titulo = $titulo;
			$this->inicio = $inicio;
			$this->fin = $fin;
			$this->color = $color;

			$obj_cliente=new sQuery();
			$query="INSERT into events(title,color,start,end)
			        values('$this->titulo','$this->color','$this->inicio','$this->fin')";
			$obj_cliente->executeQuery($query);
			return $obj_cliente->getAffect();
	}

	public function insertUsuario($usuario,$password,$nombre,$tipo)
	{
			$this->usuario = $usuario;
			$this->password = $password;
			$this->nombre = $nombre;
			$this->tipo = $tipo;

			$obj_cliente=new sQuery();
			$query="INSERT into userxwz(usuario,password,Tipo,Nombre)
			        values('$this->usuario','$this->password','$this->tipo','$this->nombre')";
			$obj_cliente->executeQuery($query);
			return $obj_cliente->getAffect();
	}

	public function insertProfesor($nombre,$correo,$pass)
	{
			$this->nombre = $nombre;
			$this->correo = $correo;
			$this->pass = $pass;


			$obj_cliente=new sQuery();
			$query="INSERT into maestro(Nombre,Correo,Contraseña)
			        values('$this->nombre','$this->correo','$this->pass')";
			$obj_cliente->executeQuery($query);
			return $obj_cliente->getAffect();
	}
	public function insertMateria($materia,$alumno)
	{
			$this->materia = $materia;
			$this->alumno = $alumno;

			$obj_cliente=new sQuery();
			$query="INSERT into inscrito(idalumno,idmateria)
			        values('$this->alumno','$this->materia')";
			$obj_cliente->executeQuery($query);
			return $obj_cliente->getAffect();
	}


	public function insertAluToGrupo($grupo,$ciclo,$alumno)
	{
			$this->grupo = $grupo;
			$this->ciclo = $ciclo;			
			$this->alumno = $alumno;

			$obj_cliente=new sQuery();
			$query="INSERT into grupo_alu(idalumno,Grupo,Ciclo)
			        values('$this->alumno','$this->grupo','$this->ciclo')";
			$obj_cliente->executeQuery($query);
			return $obj_cliente->getAffect();
	}

	public function insertIncidencia($alumno,$materia,$incidencia)
	{
			$this->alumno = $alumno;
			$this->materia = $materia;			
			$this->incidencia = $incidencia;

			$obj_cliente=new sQuery();
			$query="INSERT into incidencia(idalumno,idmateria,Incidencia)
			        values('$this->alumno','$this->materia','$this->incidencia')";
			$obj_cliente->executeQuery($query);
			return $obj_cliente->getAffect();
	}


	public function insertGrupoProf($ciclo,$grupo,$idprof)
	{
			$this->ciclo = $ciclo;
			$this->grupo = $grupo;
			$this->idprof = $idprof;

			$obj_cliente=new sQuery();
			$query="INSERT into grupo_pro(idprofesor,idgrupo,Ciclo)
			        values('$this->idprof','$this->grupo','$this->ciclo')";
			$obj_cliente->executeQuery($query);
			return $obj_cliente->getAffect();
	}


	public function insertNMateria($materia)
	{
			$this->materia = $materia;

			$obj_cliente=new sQuery();
			$query="INSERT into materias(Materia) values('$this->materia')";
			$obj_cliente->executeQuery($query);
			return $obj_cliente->getAffect();
	}


	public function insertActividad($periodo,$alumno,$tinota,$nota,$actividad,$idma)
	{
			$this->alumno = $alumno;
			$this->tinota = $tinota;
			$this->nota = $nota;
			$this->actividad = $actividad;
			$this->idma = $idma;
			$this->periodo = $periodo;

			$obj_cliente=new sQuery();
			$query="INSERT into actividades(Periodo,idalumno,Nota,Actividad,idmateria)
			        values('$this->periodo','$this->alumno','$this->nota','$this->actividad','$this->idma')";
			$obj_cliente->executeQuery($query);
			return $obj_cliente->getAffect();
	}

	public function delEvento($id)	
	{
		$obj_cliente=new sQuery();
		$query="DELETE FROM events WHERE id = '$id' ";
		$obj_cliente->executeQuery($query); 
		return $obj_cliente->getAffect(); 
	}


	public function delAlumno($id)	
	{
		$obj_cliente=new sQuery();
		$query="DELETE FROM alumno WHERE No_Alumno = '$id' ";
		$obj_cliente->executeQuery($query); 
		return $obj_cliente->getAffect(); 
	}

	public function delEscuela($id)	
	{
		$obj_cliente=new sQuery();
		$query="DELETE FROM escuela WHERE id = '$id' ";
		$obj_cliente->executeQuery($query); 
		return $obj_cliente->getAffect(); 
	}

	public function delActividad($id)	
	{
		$obj_cliente=new sQuery();
		$query="DELETE FROM tareas WHERE id = '$id' ";
		$obj_cliente->executeQuery($query); 
		return $obj_cliente->getAffect(); 
	}

	public function delProfesor($id)	
	{
		$obj_cliente=new sQuery();
		$query="DELETE FROM maestro WHERE Id_Maestro = '$id' ";
		$obj_cliente->executeQuery($query); 
		return $obj_cliente->getAffect(); 
	}

	public function delAsistencia($id)	
	{
		$obj_cliente=new sQuery();
		$query="DELETE FROM asistencia WHERE id = '$id' ";
		$obj_cliente->executeQuery($query); 
		return $obj_cliente->getAffect(); 
	}


	public function delGrupo($id)	
	{
		$obj_cliente=new sQuery();
		$query="DELETE FROM grupo WHERE id = '$id' ";
		$obj_cliente->executeQuery($query); 
		return $obj_cliente->getAffect(); 
	}

	public function delResultado($iduser,$idtabla)	// elimina el embarque comlepleto con el folio
	{
		$obj_cliente=new sQuery();
		$query="DELETE from resultado where iduser ='$iduser' and idt2 ='$idtabla' ";
		$obj_cliente->executeQuery($query); // ejecuta la consulta para  borrar el cliente
		return $obj_cliente->getAffect(); // retorna todos los registros afectados
	}


	public function delActividades($id)	// elimina el embarque comlepleto con el folio
	{
		$obj_cliente=new sQuery();
		$query="DELETE from actividades where id ='$id' ";
		$obj_cliente->executeQuery($query); // ejecuta la consulta para  borrar el cliente
		return $obj_cliente->getAffect(); // retorna todos los registros afectados
	}


	public function insertAsistencia($alumno,$fecha,$asistio,$justifi)
	{
			$this->alumno = $alumno;
			$this->fecha = $fecha;
			$this->asistio = $asistio;
			$this->justifi = $justifi;

			$obj_cliente=new sQuery();
			$query="INSERT into asistencia(idalumno,Tipo,Justificacion,Fecha)
			        values('$this->alumno','$this->asistio','$this->justifi','$this->fecha')";
			$obj_cliente->executeQuery($query);
			return $obj_cliente->getAffect();
	}




}//fin
?>
