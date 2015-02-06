<?php
	require_once('conexionDB.php');
	//error_reporting(E_ALL);

	$conn = new ConexionDB;
	$conn->conectarDB();

	$cedula = $_POST["cedula"];
	$nombres = $_POST["name"];
	$apellidos = $_POST["lastName"];
	$usuario = $_POST["user"];
	$clave = $_POST["pass"];
	$empresa = $_POST["bussines"];

	$sql = "SELECT usuario FROM usuarios WHERE usuario = '$usuario'";
	$retval = mysql_query( $sql, $conn->getConexionDB() );
	$row = mysql_fetch_assoc($retval);

	//validacion que no se cree el mismo loggin de usuario.
	if(mysql_num_rows($retval) > 0)
	{
		header("Location: ../index.php?userExist=si");
	}
	else
	{
		$sql = "INSERT INTO  usuarios (cedula, nombres, apellidos, usuario, clave, rol, empresa)" .
					"VALUES ($cedula, '$nombres', '$apellidos', '$usuario', '$clave', 0, '$empresa');";
		$retval = mysql_query( $sql, $conn->getConexionDB() );
		
		header("Location: ../index.php?userExist=no");
	}

	$conn->desconectarDB();
?>   