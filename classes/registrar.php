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
		$sql = "INSERT INTO  usuarios (cedula, nombres, apellidos, usuario, clave, rol, empresa, aprobado)" .
					"VALUES ($cedula, '$nombres', '$apellidos', '$usuario', '$clave', 0, '$empresa','n');";
		
		$retval = mysql_query( $sql, $conn->getConexionDB() );

		header("Location: ../index.php?userExist=no");

	// if(enviar_correo('ancal_999@hotmail.com', 'contenido email', 'pruebas email'))
	// 	header("Location: ../index.php?userExist=no");
	// else
	// 	echo ":(";
    }

	$conn->desconectarDB();

	function enviar_correo($mailven, $cuerpoHTML, $titulo)
	{
		$mail = new PHPMailer();
		
		//Validación por SMTP:
		$mail->IsSMTP();
		//$mail->IsSendmail();
		//$mail->SMTPSecure = 'ssl';
		$mail->CharSet = 'UTF-8';
		$mail->SMTPAuth = false;
		$mail->Host = "10.60.61.156"; // SMTP a utilizar. Por ej. smtp.elserver.com
		$mail->Username = "soporte@okcar.com.co"; // Correo completo a utilizar
		$mail->Password = "soporte.8531"; // Contraseña
		$mail->Port = 25; // Puerto a utilizar

		$mail->From = "soporte@okcar.com.co"; // Desde donde enviamos (Para mostrar)
		$mail->FromName = "OkCar con el respaldo de Asousados";

		//multiple mails
		// $datoSplit = explode(',', $mailven);
		// for($k=0; $k<count($datoSplit) ;$k++)	 //Adding of rest minus Engineer/Sales
		// {
			$mail->AddAddress($mailven); // Esta es la dirección a donde enviamos
		// }
		
		//$mail->AddAddress($mailven); // Esta es la dirección a donde enviamos
		//$mail->AddCC("cuenta@dominio.com"); // Copia
		//$mail->AddBCC("cuenta@dominio.com"); // Copia oculta
		$mail->ContentType = 'text/plain'; 
		$mail->IsHTML(true); // El correo se envía como HTML
		$mail->Subject = $titulo; // Este es el titulo del email.

		$mail->Body = $cuerpoHTML; // Mensaje a enviar
		//$mail->AltBody = $cuerpo; // Texto alternativo sin html
		//$mail->AddAttachment("imagenes/imagen.jpg", "imagen.jpg"); //Adjuntar archivos

		$exito = $mail->Send(); // Envía el correo.

		//Verificaciones para saber si se envió:
		echo $exito;
		if($exito)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
?>   