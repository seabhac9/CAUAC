<?php
session_start();
require_once('ConexionDB.php');
//error_reporting(E_ALL);

$funcion = $_GET["funcion"];
$result = null;
$conn = new ConexionDB;

if(!is_null($funcion))
{
	$conn->conectarDB();

	switch ($funcion) 
	{
		case 'EnviarRespuestaDB':
			$result = EnviarRespuestaDB($conn);
		break;
		case 'EliminarMensajeDB':
			$result = EliminarMensajeDB($conn);
		break;
		case 'EnviarMensajeDB':
			$result = EnviarMensajeDB($conn);
		break;
  	}
  	
  	$conn->desconectarDB();
	echo json_encode($result);
}

function EnviarRespuestaDB($conn)
{
	$result = array();
	$emisor = $_GET["emisor"];
	$receptor = $_GET["receptor"];
	$titulo = $_GET["titulo"];
	$respuesta = $_GET["respuesta"];
	$time = date("Y-m-d");

	$sql = "INSERT INTO mensajes VALUES(DEFAULT,'$titulo','$respuesta',$receptor,$emisor,'$time');";
	$retval = mysql_query( $sql, $conn->getConexionDB() );

	$result[] = array(
	"resp" => $retval
	);
}

function EliminarMensajeDB($conn)
{
	$result = array();
	$codigoMensaje = $_GET["codigoMensaje"];

	$sql = "DELETE FROM mensajes WHERE codigo=$codigoMensaje ;";
	$retval = mysql_query( $sql, $conn->getConexionDB() );

	$result[] = array(
	"resp" => $retval
	);
}

function EnviarMensajeDB($conn)
{
	$result = array();
	$emisor = $_GET["emisor"];
	$receptor = $_GET["receptor"];
	$titulo = $_GET["titulo"];
	$contenido = $_GET["contenido"];
	$time = date("Y-m-d");

	if($receptor == "all")
	{
		$sql = "SELECT cedula FROM usuarios";
		$retval = mysql_query( $sql, $conn->getConexionDB() );

		while($row = mysql_fetch_assoc($retval))
		{
			if($row['cedula'] != $emisor)
			{
				$sqlIn = "INSERT INTO mensajes VALUES(DEFAULT,'$titulo','$contenido',$emisor," . $row['cedula'] . ",'$time');";
				$retvalIn = mysql_query( $sqlIn, $conn->getConexionDB() );	
			}
		}
	}
	else
	{
		$sqlIn = "INSERT INTO mensajes VALUES(DEFAULT,'$titulo','$contenido',$emisor,$receptor,'$time');";
		$retvalIn = mysql_query( $sqlIn, $conn->getConexionDB() );
	}
	
	$result[] = array(
	"resp" => $retvalIn
	);
}

?>