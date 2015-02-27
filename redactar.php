<?php 
	include("classes/seguridad.php");
	require_once('classes/ConexionDB.php');
	//error_reporting(E_ALL);
	$varRol = $_SESSION["rol"];

	$conn = new ConexionDB;
	$conn->conectarDB();

	$cedula = $_SESSION["cedula"];

	if ($varRol == '1')
		$sql = "SELECT cedula, CONCAT(nombres ,' ',apellidos) as nombreCompleto FROM usuarios where cedula != $cedula";
	else
		$sql = "SELECT cedula, CONCAT(nombres ,' ',apellidos) as nombreCompleto FROM usuarios where rol = 1";
	
	$retval = mysql_query( $sql, $conn->getConexionDB() );
	
?>

<h2 class="orange">Redactar</h2>
<form id="redactForm">
<ul class="redactMenu nav nav-pills ">  
  <li role="presentation"><button type="submit" class="btn btn-primary" onClick="enviarMensaje();">Enviar</button></li>
  <li role="presentation"><a onClick="limpiarMensajeRedaccion();">Limpiar</a></li>
  <li role="presentation">
	  <label for="selectUser">Enviar a:</label>
	  <select class="form-control" id="selectUser" >
	  		<optgroup label="Usuarios Registrados">
	  		<?php
		  		while($row = mysql_fetch_assoc($retval))
				{
					echo "<option value='" . $row['cedula'] . "'>" . $row['nombreCompleto'] . "</option>";
				}
				if ($varRol == '1')
					echo "<option value='all'>Todos</option>";
		  	?>
		  
	  </select>
	</li>   
</ul>

	<input type="text" id="titleRedact" name="titleRedact" class="form-control" placeholder="Titulo" required><br/>
	<textarea class="form-control" id="messageRedact" name="messageRedact" rows="10" placeholder="Mensaje" required></textarea>
	<input type="file" name="fileElem" id="fileElem" style="display:none" onchange="handleFile(this.files)"/>
	<ul class="redactMenu nav nav-pills "> 
		<li role="presentation"><button type="button" class="btn-info" id="fileSelect">Adjuntar Archivo</button></li>
  	</ul>
	<div id="fileList">¡No se han seleccionado archivos!</div>
	<input type="hidden" name="emisor" id="emisor" value="<?php echo $cedula ?>">
	
</form>