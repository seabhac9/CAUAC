<?php
	require_once('conexionDB.php');
	require("PHPMailer/class.phpmailer.php");
	//error_reporting(E_ALL);
	
	$conn = new ConexionDB;
	$conn->conectarDB();

	$cedula = $_GET["cedula"];
	$nombres = $_GET["name"];
	$apellidos = $_GET["lastName"];
	$usuario = $_GET["user"];
	$clave = $_GET["pass"];
	$empresa = $_GET["bussines"];
	$cargo =$_GET['cargo'];
	$correo = $_GET['correo'];
	$telefono = $_GET['telefono'];

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
		$sql = "INSERT INTO  usuarios (cedula, nombres, apellidos, usuario, clave, rol, empresa, cargo, correo, telefono,  aprobado)".
					"VALUES ($cedula, '$nombres', '$apellidos', '$usuario', '$clave', 0, '$empresa','$cargo','$correo', $telefono,'n');";		
		$retval = mysql_query( $sql, $conn->getConexionDB() );


       //envio del correo
		$your_email = $_GET['correo'];

		$headers= "From: Cauac\r\n";
		$headers.='Content-type: text/html; charset=utf-8';
		if (mail($your_email, 'Validación cuenta',  'aqui va cualquier mensaje a ser enviado', $headers))
		header("Location: ../index.php?userExist=no");
		else 'error';
		//fin de envio del correo


		// header("Location: ../index.php?userExist=no");

	// if(enviar_correo('ancal_999@hotmail.com', 'contenido email', 'pruebas email'))
	// 	header("Location: ../index.php?userExist=no");
	// else
	// 	echo ":(";
    }

	$conn->desconectarDB();	
?>