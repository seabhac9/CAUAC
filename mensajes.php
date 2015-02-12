<h2 class="orange">Mensajes</h2>
<ul>
	<?php 
		include("classes/seguridad.php");
		require_once('classes/conexionDB.php');
		//error_reporting(E_ALL);

		$conn = new ConexionDB;
		$conn->conectarDB();

		$cedula = $_SESSION["cedula"];

		$sql = "SELECT * FROM mensajes WHERE receptor = $cedula";
		$retval = mysql_query( $sql, $conn->getConexionDB() );
		
		while($row = mysql_fetch_assoc($retval))
		{
			echo "<li><h3><a href='visorMensaje.php'>" . $row['titulo'] . "</a></h3></li>";
		}
	?>
</ul>