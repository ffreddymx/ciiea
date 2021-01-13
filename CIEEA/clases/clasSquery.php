<?php 

// se declara una clase para poder ejecutar las consultas, esta clase llama a la clase anterior
class sQuery   // para la ejecucion de todo tipo de consutas
{

	var $coneccion;
	var $consulta;
	var $resultados;
	
	function sQuery()  // constructor, solo crea una conexion usando la clase "Conexion"
	{
		$this->coneccion= new Conexion();
	}

	function executeQuery($cons)  //cons es la consulta metodo que ejecuta una consulta y la guarda en el atributo $consulta
	{
		$this->consulta= mysqli_query($this->coneccion->getConexion(),$cons);
		//$this->consulta=mysqli_query($this->coneccion->getConexion());
		return $this->consulta;
	}

	function getResults()   // retorna la consulta en forma de result.
	{return $this->consulta;}	
	
	function Close()		// cierra la conexion
	{$this->coneccion->Close();}	
	
	function Clean() // libera la consulta
	{mysqli_free_result($this->consulta);}
	
	function getResultados() // debuelve la cantidad de registros encontrados
	{return mysqli_affected_rows($this->coneccion->getConexion()) ;}
	
	function getAffect() // devuelve las cantidad de filas afectadas
	{return mysqli_affected_rows($this->coneccion->getConexion()) ;}

    function fetchAll()
    {
        $rows=array();
		if ($this->consulta)
		{
			while($row = mysqli_fetch_array($this->consulta))
			{
				$rows[]=$row;
			}
		}
        return $rows;
    }
}


?>