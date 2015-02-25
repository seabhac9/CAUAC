<?php
	require_once('conexionDB.php');
	error_reporting(E_ALL);
	
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

$your_email = "horlock69@gmail.com";

$headers= "From: Cauac <cauac@cauac.com>\r\n";
$headers.='Content-type: text/html; charset=utf-8';
mail($your_email, 'Enlace de Verificación cuenta',  "
<html>
<head>
 <title>Mensaje de Contacto</title>
</head>
<body>
	Haz creado una cuenta en Cauac, por favor da click en el siguiente enlace para que tu cuenta sea activada y puedas ingresar<br><br>
	<a href='#'>http://www.cauac.co/codigodeverificacion...algo</a>
</body>
</html>" , $headers);
		//fin de envio del correo
		header("Location: ../index.php?userExist=no");
?>