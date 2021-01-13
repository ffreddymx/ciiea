<?php
class Conexion  // se declara una clase para hacer la conexion con la base de datos
{
	var $con;
	function Conexion()
	{
		// se definen los datos del servidor de base de datos
		$conection['server']="localhost";  //host
		$conection['user']="root";         //  usuario
		$conection['pass']="";             //password
		$conection['base']="ciiea";           //base de datos

		// crea la conexion pasandole el servidor , usuario y clave
		//$conect= mysqli_connect($conection['server'],$conection['user'],$conection['pass']);
		$conect = new mysqli($conection['server'],$conection['user'],$conection['pass'],$conection['base']);
		//if ($conect) // si la conexion fue exitosa , selecciona la base
	    if ($result = $conect->query("SELECT DATABASE()"))
		{
		//mysqli_select_db($conect,$conection['base']);
		$row = $result->fetch_row();
		$this->con=$conect;
		}
	}

	function getConexion() // devuelve la conexion
	{
		return $this->con;
		//return $conect;
	}
	function Close()  // cierra la conexion
	{
		mysqli_close($this->con);
		//mysqli_close($conect);
	}

}

?>
