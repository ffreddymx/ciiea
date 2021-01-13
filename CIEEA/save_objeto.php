<?php

include_once('clases/clasConexion.php');
include_once('clases/clasSquery.php');


/*******************  aqui defines  *****************************/


class Aprende
{

	public  $id,$usuario,$password,$nombre,$tipo,$grado;
	public $actividad,$modulo;
	public $texto1,$texto2,$correcta,$incorrecta;

	public $apellido,$tutor,$direccion,$profesor,$grupo;

 function __construct() {

 		//$this->marca="";
    }





	 public function getProfesor()
		{
		$obj_cliente=new sQuery();
		$obj_cliente->executeQuery("SELECT *  FROM  profesor  ");
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
		$obj_cliente->executeQuery("SELECT *  FROM  grupos  ");
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

	public function insertAlumno($nombre,$apellido,$tutor,$direccion,$matricula)
	{
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->tutor = $tutor;
			$this->direccion = $direccion;
			$this->matricual = $matricula;

			$obj_cliente=new sQuery();
			$query="INSERT into alumnos(Nombre,Apellido,Tutor,Direccion,Matricula)
			        values('$this->nombre','$this->apellido','$this->tutor','$this->direccion','$this->matricual')";
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

	public function insertProfesor($nombre,$apellido,$direccion,$movil,$profesion)
	{
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->direccion = $direccion;
			$this->movil = $movil;
			$this->profesion = $profesion;

			$obj_cliente=new sQuery();
			$query="INSERT into profesor(Nombre,Apellido,Direccion,Movil,Profesion)
			        values('$this->nombre','$this->apellido','$this->direccion','$this->movil','$this->profesion')";
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


	public function insertActividad($alumno,$tinota,$nota,$actividad,$idma)
	{
			$this->alumno = $alumno;
			$this->tinota = $tinota;
			$this->nota = $nota;
			$this->actividad = $actividad;
			$this->idma = $idma;

			$obj_cliente=new sQuery();
			$query="INSERT into actividades(idalumno,Tiponota,Nota,Actividad,idmateria)
			        values('$this->alumno','$this->tinota','$this->nota','$this->actividad','$this->idma')";
			$obj_cliente->executeQuery($query);
			return $obj_cliente->getAffect();
	}

	public function delEvento($id)	// elimina el embarque comlepleto con el folio
	{
		$obj_cliente=new sQuery();
		$query="DELETE FROM events WHERE id = '$id' ";
		$obj_cliente->executeQuery($query); // ejecuta la consulta para  borrar el cliente
		return $obj_cliente->getAffect(); // retorna todos los registros afectados
	}



	public function delResultado($iduser,$idtabla)	// elimina el embarque comlepleto con el folio
	{
		$obj_cliente=new sQuery();
		$query="DELETE from resultado where iduser ='$iduser' and idt2 ='$idtabla' ";
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
