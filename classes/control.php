<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
	require_once('ConexionDB.php');
	//error_reporting(E_ALL);

	$conn = new ConexionDB;
	$conn->conectarDB();

	$user = $_POST["user"];
	$pass = $_POST["pass"];

	$sql = "SELECT cedula, nombres, apellidos, rol, aprobado FROM usuarios WHERE usuario = '$user' and clave = '$pass'";
	$retval = mysql_query( $sql, $conn->getConexionDB() );
	$row = mysql_fetch_assoc($retval);

	//Si el registro existe valida e ingresa.
	if (mysql_num_rows($retval) > 0 && $row["aprobado"] == 's'){
	    //usuario y contrase�a v�lidos
	    //defino una sesion y guardo datos
	    session_start();
	    $_SESSION["autentificado"]= "SI";
	    $_SESSION["cedula"] = $row["cedula"];
	    $_SESSION["nombres"] = $row["nombres"];
	    $_SESSION["apellidos"] = $row["apellidos"];
	    $_SESSION["rol"] = $row["rol"];
	    echo"<script language='javascript'>window.location='../cauac.php'</script>;";
	    // header ("Location: ../cauac.php");
	}else {
	    //si no existe le mando otra vez a la portada
	    echo"<script language='javascript'>window.location='../index.php?errorusuario=si'</script>;";
	    // header("Location: ../index.php?errorusuario=si");
	}
?>