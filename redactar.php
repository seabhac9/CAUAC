<?php 
	include("classes/seguridad.php");
	require_once('classes/conexionDB.php');
	//error_reporting(E_ALL);

	$conn = new ConexionDB;
	$conn->conectarDB();

	$cedula = $_SESSION["cedula"];

	$sql = "SELECT cedula, CONCAT(nombres ,' ',apellidos) as nombreCompleto FROM usuarios where cedula != $cedula";
	$retval = mysql_query( $sql, $conn->getConexionDB() );
	
?>

<h2 class="orange">Redactar</h2>
<ul class="redactMenu nav nav-pills ">  
  <li role="presentation"><a onClick="enviarMensaje(<?php echo $cedula ?>);">Enviar</a></li>
  <li role="presentation"><a onClick="limpiarMensajeRedaccion();">Limpiar</a></li>
  <li role="presentation">
  <label for="selectUser">Enviar a:</label>
  <select class="form-control" id="selectUser">
  		<optgroup label="Usuarios Registrados">
  		<?php
	  		while($row = mysql_fetch_assoc($retval))
			{
				echo "<option value='" . $row['cedula'] . "'>" . $row['nombreCompleto'] . "</option>";
			}
	  	?>
	  <option value="all">Todos</option>
  </select>
</li>   
</ul>

<form id="redactForm">
	<input type="text" id="titleRedact" name="titleRedact" class="form-control" placeholder="Titulo" required><br/>
	<textarea class="form-control" id="messageRedact" name="messageRedact" rows="15" placeholder="Mensaje" required></textarea>
</form>