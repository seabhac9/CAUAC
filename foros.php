<h2 class="orange">Foros</h2>
<ul class="nav nav-pills ">
<li role="presentation"><a onclick="redirectCreaforo()">Crear Foro</a></li> 
</ul>

<ul>
<?php 
		include("classes/seguridad.php");
		require_once('classes/conexionDB.php');
		//error_reporting(E_ALL);

		$conn = new ConexionDB;
		$conn->conectarDB();

		$cedula = $_SESSION["cedula"];

		$sql = "SELECT * FROM foros;";
		$retval = mysql_query( $sql, $conn->getConexionDB() );
		
		while($row = mysql_fetch_assoc($retval))
		{
			echo "<li><h3><a onClick='redirectForoVer(" . $row['codigo'] .  ")'>" . $row['titulo'] . "</a><div class='right'><a onClick='redirectForoVer(" . $row['codigo'] .  ")'>Ver Mas&nbsp;&nbsp;</a><a class='orange'>Eliminar&nbsp;&nbsp;</a><a class='orange'>Editar&nbsp;&nbsp;</a></div></h3></li>";
		}
	?>
</ul>