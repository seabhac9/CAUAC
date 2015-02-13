<h2 class="orange">Foros</h2>
<ul class="nav nav-pills ">
<li role="presentation"><a href="#">Crear Foro</a></li> 
</ul>

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
			echo "<li><h3><a onClick='redirectMensaje(" . $row['codigo'] .  ")'>" . $row['titulo'] . "</a><a class='navbar-right orange'>Editar</a><a class='navbar-right orange'>Eliminar&nbsp;&nbsp;</a><a class='navbar-right'>Ver Mas&nbsp;&nbsp;</a></h3></li>";
		}
	?>
</ul>