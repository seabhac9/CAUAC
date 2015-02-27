<?php 
	include("classes/seguridad.php");
	include("classes/ConexionDB.php");
	//error_reporting(E_ALL);
	$varRol = $_SESSION["rol"];
?>
<h2 class="orange">Foros</h2>
<ul class="nav nav-pills ">
<?php if ($varRol == '1') echo "<li role='presentation'><a onclick='redirectCreaforo()'>Crear Foro</a></li>"; ?>
</ul>

<ul>
<?php 
		$conn = new ConexionDB;
		$conn->conectarDB();

		$cedula = $_SESSION["cedula"];

		if ($varRol == '1')
			$sql = "SELECT * FROM foros;";
		else
			$sql = "SELECT f.codigo, f.titulo, f.contenido, f.archivo, f.videoURL FROM foros f, foro_usuarios fu where f.codigo = fu.codigoForo and fu.cedula='$cedula';";

		$retval = mysql_query( $sql, $conn->getConexionDB() );
		
		while($row = mysql_fetch_assoc($retval))
		{
			echo "<li><h3><a onClick='redirectForoVer(" . $row['codigo'] .  ")'>" . $row['titulo'] . "</a><div class='right'><a onClick='redirectForoVer(" . $row['codigo'] .  ")'>Ver Mas&nbsp;&nbsp;</a>"; 
			if ($varRol == '1') 
				echo "<a class='orange' onClick='eliminarForo(" . $row['codigo'] .  ");'>Eliminar&nbsp;&nbsp;</a> <a class='orange' onClick='redirectEditarforo(" . $row['codigo'] .  ");'>Editar</a> "; 
			echo "</div></h3></li>";
		}
	?>
</ul>