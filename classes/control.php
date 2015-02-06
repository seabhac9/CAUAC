<?php
	require_once('conexionDB.php');
	//error_reporting(E_ALL);

	$conn = new ConexionDB;
	$conn->conectarDB();

	$user = $_POST["user"];
	$pass = $_POST["pass"];
	
	$sql = "SELECT nombres, apellidos, rol FROM usuarios WHERE usuario = '$user' and clave = '$pass'";
	$retval = mysql_query( $sql, $conn->getConexionDB() );
	$row = mysql_fetch_assoc($retval);

	//Si el registro existe valida e ingresa.
	if (mysql_num_rows($retval) > 0){
	    //usuario y contraseña válidos
	    //defino una sesion y guardo datos
	    session_start();
	    $_SESSION["autentificado"]= "SI";
	    header ("Location: ../cauac.php");
	}else {
	    //si no existe le mando otra vez a la portada
	    header("Location: ../index.php?errorusuario=si");
	}
?> 