<?php

class ConexionDB
{
  	//Variables para configurar la conexion a la BD.
	var $host;
	var $username;
	var $password;
	var $db_name;
	var $conexion;

	//Constructor.
	function ConexionDB()
	{
		$this->host="68.178.143.143"; // Host name 
		$this->username="cauaclogin"; // Mysql username 
		$this->password="Cauac1234!"; // Mysql password 
		$this->db_name="cauaclogin"; // Database name 
	}

	//Funcion: Realiza la conexion con la base de datos y activa variable de conexion.
	function conectarDB()
	{
		if(!is_null($this->conexion))
			return true;

		// Connect to server and select databse.
		$this->conexion = mysql_connect($this->host, $this->username, $this->password)or die("cannot connect"); 
		mysql_select_db($this->db_name) or die("cannot select DB");

		return $this->conexion;
	}

	//Funcion: Obtener conexion.
    function getConexionDB(){
    	return $this->conexion; 
    }

    //Funcion: Ejecuta una consulta enviada por parametro.
    function ejecutarConsultaDB($cadenaSQL)
    {
    	//$result = odbc_exec($this->conn, $cadenaSQL);
    	//return $result;
    }

    //Funcion: Desconecta en enlace con la base de datos.
    function desconectarDB()
    {
		mysql_close($this->conexion);
    }
}
?>